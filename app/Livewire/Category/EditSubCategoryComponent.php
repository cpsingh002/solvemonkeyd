<?php

namespace App\Livewire\Category;


use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditSubCategoryComponent extends Component
{
    use WithFileUPloads;
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $scategory_id;
    public $scategory_slug;
    public $icon;
    public $categorythum;
    public $newimage;
    public $newicon;

    public function mount($scategory_slug)
    {
        //dd($scategory_slug);
       
            $this->scategory_slug = $scategory_slug;
            $scategory = SubCategory::where('slug',$scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id =  $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
            $this->icon = $scategory->icon;
            $this->categorythum = $scategory->categorythum;
            //dd($this->slug);
        
    }


    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    
    public function updated($fields)
    {
    //     if($this->scategory_id)
    //     {
    //     $this->validateOnly($fields,[
    //         'name'=>'required',
    //         'slug'=>'required|unique:sub_categories,slug,'.$this->scategory_id
    //     ]);
    // }
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->category_id)
        {
            $this->validateOnly($fields,[
                'name'=>'required',
                'slug'=>'required|unique:categories,slug,'.$this->category_id,
                'scategory_id'=>'required'
            ]);
        }
    }

    public function updateCategory()
    {
        $this->validate([
            'name'=>'required',
            'category_id'=>'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
      
            $scategory =  SubCategory::find($this->scategory_id);
            $scategory->name =$this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            if($this->newicon){
                //unlink('admin/category/icon'.'/'.$scategory->icon);
                $imageNamei= Carbon::now()->timestamp.'.'.$this->newicon->extension();
                $this->newicon->storeAs('category/icon',$imageNamei);
                $scategory->icon = $imageNamei;
            }
            if($this->newimage){
                unlink('admin/category'.'/'.$scategory_id->categorythum);
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('admin/category',$imageName);
                $scategory_id->categorythum = $imageName;
            }
            $scategory->save();
            
        
        session()->flash('message','Category has been upadted successfully !');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.edit-sub-category-component',['categories'=>$categories])->layout('layouts.admin1');
    }
}
