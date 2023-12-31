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

class AddBrandComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $slug;
    public $category_id;
    public $icon;
    public $image;
    Public $scategory_id;
    public $status;

    public function generateslug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required',
            'slug'=>'required|unique:brands',
            'status'=>'required'
        ]);
    }
    public function addBrand()
    {
        $this->validate([
            'title'=>'required',
            'slug' => 'required|unique:brands',
            'status'=>'required'
        ]);
        
            $brand = new Brand();
            $brand->name = $this->title;
            $brand->slug = $this->slug;
            $brand->category_id  = $this->category_id;
            $brand->subcategory_id  = $this->scategory_id;
            if($this->image){
                $imageName= Carbon::now()->timestamp.'.'.$this->image->extension();
                $this->image->storeAs('brand',$imageName);
                $brand->image = $imageName;
                }
            $brand->status = $this->status;
            $brand->save();
    
        session()->flash('message','Brand has been created successfully!');
    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        
        return view('livewire.brand.add-brand-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
}
