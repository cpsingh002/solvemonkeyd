<?php

namespace App\Livewire\BrandTest;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\BrandTest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;


class AddBrandTestComponent extends Component
{
    use WithFileUPloads;
    public $title;
    public $slug;
    public $category_id=[];
    public $icon;
    public $image;
    Public $scategory_id;
    public $status;
    public $textcategory_id =[];

    public function generateslug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function updated($fields)
    {
        //dd($fields);
        $this->validateOnly($fields,[
            'title'=>'required',
            'slug'=>'required|unique:brand_tests',
            'status'=>'required',
            'category_id'=>'required',
            'scategory_id'=>'required'
        ]);
    }
    public function addBrand()
    {
        $this->validate([
            'title'=>'required',
            'slug' => 'required|unique:brand_tests',
            'status'=>'required',
            'category_id'=>'required',
            'scategory_id'=>'required'
        ]);
       // dd($this->textcategory_id,$this->category_id);
            $brand = new BrandTest();
            $brand->name = $this->title;
            $brand->slug = $this->slug;
            $brand->category_idarray  = json_encode($this->category_id);
            $brand->subcategory_idarray  = json_encode($this->scategory_id);
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
        //dd($this->category_id);
    }
    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::whereIn('category_id',$this->category_id)->get();

        return view('livewire.brand-test.add-brand-test-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.admin1');
    }
    public function categoryname($cid)
    {
        return Category::where('id',$cid)->first();
    }
    public function subcategoryname($sid)
    {
        return SubCategory::where('id',$sid)->first();
    }
}
