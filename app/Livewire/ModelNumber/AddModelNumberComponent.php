<?php

namespace App\Livewire\ModelNumber;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\ModelNumber;


class AddModelNumberComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $slug;
    public $category_id;
    public $brand_id;
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
            'slug'=>'required|unique:model_numbers',
            'scategory_id'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required'
        ]);
    }
    public function addModelNumber()
    {
        $this->validate([
            'title'=>'required',
            'slug' => 'required|unique:model_numbers',
            'scategory_id'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required'
        ],[
            'brand_id.required'=>'The brand field is required.',
            'category_id.required'=>'The parent category field is required.',
            'scategory_id.required'=>'The sub-category field is required.'
            ]);
        
            $brand = new ModelNumber();
            $brand->name = $this->title;
            $brand->slug = $this->slug;
            $brand->category_id  = $this->category_id;
            $brand->subcategory_id  = $this->scategory_id;
            $brand->brand_id = $this->brand_id;           
            $brand->status = $this->status;
            $brand->save();
    
        session()->flash('message','Model Number has been created successfully!');
    }
    public function changeSubcategory()
    {
        $this->scategory_id = '';
    }
    public function render()
    {
        $categories=Category::where('status','!=',3)->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->where('status','!=',3)->get();
        if($this->scategory_id){
        $brands = Brand::where('subcategory_id',$this->scategory_id)->where('status','!=',3)->get();
        }else{
            // dd($this->scategory_id);
        $brands = Brand::where('category_id',$this->category_id)->where('status','!=',3)->get();
        }
        return view('livewire.model-number.add-model-number-component',['categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands])->layout('layouts.admin1');
    }
}
