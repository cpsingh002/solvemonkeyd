<?php

namespace App\Livewire\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\SubCategory;


class AddSubCategoryComponent extends Component
{
    use WithFileUPloads;
    public $name;
    public $slug;
    public $category_id;
    public $icon;
    public $categorythum;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'category_id'=>'required'
        ]);
    }
    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug' => 'required|unique:categories',
            'category_id'=>'required'
        ]);
        
        if($this->category_id){
            $scategory_id = new SubCategory();
            $scategory_id->name =$this->name;
            $scategory_id->slug = $this->slug;
            $scategory_id->category_id = $this->category_id;
            $scategory_id->icon = $this->icon;
            if($this->categorythum){
                $imageName= Carbon::now()->timestamp.'.'.$this->categorythum->extension();
                $this->categorythum->storeAs('category',$imageName);
                $scategory_id->categorythum = $imageName;
                }
            $scategory_id->save();
        }else{

            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->icon = $this->icon;
            if($this->categorythum){
                $imageName= Carbon::now()->timestamp.'.'.$this->categorythum->extension();
                $this->categorythum->storeAs('category',$imageName);
                $category->categorythum = $imageName;
                }
            $category->save();
        }
        session()->flash('message','Sub Category has been created successfully!');
    }
    public function render()
    {   $categories = Category::all();
        return view('livewire.category.add-sub-category-component',['categories'=>$categories])->layout('layouts.admin1');
    }
}
