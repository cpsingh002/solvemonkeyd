<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVisit;
use App\Models\PackagePurchase;
use App\Models\Package;
use App\Models\UserProductVisit;
use App\Models\ProductAttribute;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Chatuser;
use App\Models\ProductChat;
use Illuminate\Support\Str;

class ProductDetailsComponent extends Component
{
    public $slug;
    public $haveCouponCode;
    public $productid;
    public $userid; 
    public $message;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->haveCouponCode = '';
    }
    public function productCount($id)
    {
        $visited= ProductVisit::where('product_id',$id)->first();
        if(isset($visited))
        {
            $visited->visit_count=$visited->visit_count+1;
            $visited->save();
        }
        else
        {
            $count=new ProductVisit;
            $count->product_id=$id;
            $count->visit_count=1;
            $count->save();
        }
        return;
    }
    public function detailCount($id)
    {
        $product= Product::where('slug',$this->slug)->first();
        $visited= UserProductVisit::where('product_id',$product->id)->where('user_id',$id)->first();

        if(isset($visited))
        {
            $visited->information_visit=$visited->information_visit+1;
            $visited->save();
        }
        else
        {
            $count=new UserProductVisit;
            $count->user_id=$id;
            $count->product_id=$product->id;
            $count->information_visit=1;
            $count->save();
        }
        return;
    }
    public function checkplan()
    {

        if(Auth::check()){
            $user_id=Auth::user()->id;
            if(Auth::user()->planpurchadeactive)
            {        
                if(Auth::user()->planpurchade){
                    $product= Product::where('slug',$this->slug)->first();
                    $visited= UserProductVisit::where('user_id',$user_id)->where('status',1)->count();
                    $package=Auth::user()->planpurchade;
                    $validityCount=$package->validitycount->count;
                    $validityUpto=$package->created_at->addDays($package->validitycount->validity);
                    if($validityUpto->gt(now()))
                    {
                        if($validityCount>$visited)
                        {
                            $this->detailCount(Auth::user()->id);
                            $this->haveCouponCode = 1;
                        }else{
                            UserProductVisit::where('user_id',$user_id)->update(['status' => 0]);
                            $package->status=0;
                            $package->save();
                            session()->flash('message','your plan limit is over!');
                        }
                    }else{
                        session()->flash('message','your plan is expired!');
                    }
                }else{
                    session()->flash('message','your plan limit is over!');
                }
            }else{
                    session()->flash('message','For sell information first buy a plan!');
                    return redirect()->route('package');
            }
        
        }else{
            session()->flash('message','For Sell Information Login first!');
            return;
        }
            
        // $this->js('window.location.reload()');
        
    }
    public function hideContact()
    {
        
        $this->haveCouponCode = "";
        return;
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        if(Auth::check())
        {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
         //$this->dispatch('wishlist-count-component','refreshComponent');
         $this->dispatch('wishlist-count-component','refreshComponent');
          session()->flash('info','Item added to your wishlist for contact details click on Reveal Contact button ');
        //  return;
        }else{
            // session()->flash('message','Login First');
            $this->dispatch('show-edit-post-modal');
        }
    }
    
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatch('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        $product= Product::where('slug',$this->slug)->first();
        if($product->id)
        {
            $this->productid = $product->id;
            $this->userid = $product->user_id;
            $this->productCount($product->id);
        }
        $dis1="";
        $dis2="";
        if($product->price_range == 1)
        {
            $dis1=($product->prices*90/100);
            $dis2=($product->prices*110/100);
        }
        elseif($product->price_range == 2)
        {
            $dis1=($product->prices*85/100);
            $dis2=($product->prices*115/100);
        }
        elseif($product->price_range == 3)
        {
            // dd($pp);
            $dis1=($product->prices*80/100);
            $dis2=($product->prices*120/100);
        }
        elseif($product->price_range == 4)
        {
            $dis1=($product->prices*75/100);
            $dis2=($product->prices*125/100);
        }
        $pattributes = ProductAttribute::where('product_id',$product->id)->get();
        //dd($pattributes);
        $related_products = Product::where('category_id',$product->category_id)->where('status',1)->inRandomOrder()->limit(4)->get();
        if(Auth::check())
        {
           Cart::instance('wishlist')->restore(auth::user()->email);
        }
        return view('livewire.frontend.product-details-component',['product'=>$product,
        'related_products'=>$related_products,'pattributes'=>$pattributes,'dis1'=>$dis1,'dis2'=>$dis2])->layout('layouts.base');
    }
    
    public function ProductChat($id)
    {

        if(Auth::check()){
            
            if($this->userid != Auth::id()){
                $user_id=Auth::user()->id;
                if(Auth::user()->planpurchadeactive)
                {        
                    if(Auth::user()->planpurchade){
                        //  $product= Product::where('slug',$this->slug)->first();
                        $visited= UserProductVisit::where('user_id',$user_id)->where('status',1)->count();
                        $package=Auth::user()->planpurchade;
                        $validityCount=$package->validitycount->count;
                        $validityUpto=$package->created_at->addDays($package->validitycount->validity);
                        if($validityUpto->gt(now()))
                        {
                            if($validityCount>$visited)
                            {
                                //$this->detailCount(Auth::user()->id);
                                //$this->haveCouponCode = 1;
                               $chat = Chatuser::where(['user_id'=>auth()->id(), 'friend_id' =>$this->userid])->first();
                               if(isset($chat))
                               {
                                    return redirect()->route('message',['chatid'=>$chat->chat_id]);
                               }else{                        
                                    $this->dispatch('show-chat');
                               }
                                
                            }else{
                                UserProductVisit::where('user_id',$user_id)->update(['status' => 0]);
                                $package->status=0;
                                $package->save();
                                session()->flash('message','your plan limit is over!');
                            }
                        }else{
                            session()->flash('message','your plan is expired!');
                        }
                    }else{
                        session()->flash('message','your plan limit is over!');
                    }
                }else{
                        session()->flash('message','For sell information first buy a plan!');
                        return redirect()->route('package');
                }
            }else{
                session()->flash('message','This listing Is added by you!');
                return;
            }
        }else{
            session()->flash('message','For Sell Information Login first!');
            return;
        }
            
        // $this->js('window.location.reload()');
        
    }


    public function send_message()
    {
        $this->validate(['message' => "required"]);

        if (Chatuser::where(['user_id' => Auth::id(), 'friend_id' => $this->userid,'product_id' => $this->productid])->count() === 0 || Chatuser::where(['user_id' => $this->userid, 'friend_id' => Auth::id(),'product_id' => $this->productid])->count() === 0) {
                $uuid = Str::uuid();
                Chatuser::create([
                    'user_id' => Auth::id(),
                    'chat_id' => $uuid,
                    'friend_id' => $this->userid,
                    'product_id' => $this->productid
                ]);

                Chatuser::create([
                    'user_id' => $this->userid,
                    'chat_id' => $uuid,
                    'friend_id' => Auth::id(),
                    'product_id' => $this->productid
                ]);
            }
        ProductChat::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
            'chat_id' => Chatuser::where(['user_id'=>auth()->id(), 'friend_id' =>$this->userid])->first()->chat_id,
            'friend_id' => $this->userid
        ]);

        $this->message='';
        session()->flash('message','Your Message sent to the owner');
        $this->dispatch('show-chat-close');
        // $this->render();
            
    }
    
}
