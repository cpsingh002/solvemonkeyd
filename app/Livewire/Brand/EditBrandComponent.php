<?php

namespace App\Livewire\Brand;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;


class EditBrandComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $slug;
    public $category_id;
    public $image;
    Public $scategory_id;
    public $status;
    public $bid;
    public $b_id;
    public $newimage;

    public function mount($bid)
    {
        //dd($scategory_slug);
        
        
            $this->b_id= $bid;
            $brand =Brand::where('id',$this->b_id)->first();
            $this->title = $brand->name;
            $this->slug= $brand->slug;
            $this->category_id = $brand->category_id;
            $this->scategory_id = $brand->subcategory_id;
            
            $this->image = $brand->image;
            $this->status = $brand->status;
            $this->b_id = $brand->id;
    
    }
    public function updated($fields)
    {
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        $this->validateOnly($fields,[
            'title'=>'required',
            'status'=>'required',
            'slug'=>'required|unique:brands,slug,'.$this->b_id
        ]);
    }

    
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateBrand()
    {
        
        $this->validate([
            'title'=>'required',
            'status'=>'required',
            'slug'=>'required|unique:brands,slug,'.$this->b_id
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
       
        $brand = Brand::find($this->b_id);
        $brand->name = $this->title;
        $brand->slug = $this->slug;
        $brand->category_id  = $this->category_id;
        $brand->subcategory_id  = $this->scategory_id;
            if($this->newimage){
                unlink('admin/brand'.'/'.$brand->image);
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('admin/brand',$imageName);
                $brand->image = $imageName;
            }
            $brand->status = $this->status;
            $brand->save();
    
        session()->flash('message','Category has been upadted successfully !');
    }
    


    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
    
        return view('livewire.brand.edit-brand-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
