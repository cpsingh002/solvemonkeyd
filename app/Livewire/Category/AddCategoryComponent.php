<?php

namespace App\Livewire\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\SubCategory;

class AddCategoryComponent extends Component
{
    use WithFileUPloads;
    public $name;
    public $slug;
    public $category_id;
    public $icon;
    public $categorythum;
    public $is_home;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'icon' =>'required|mimes:jpeg,jpg,png',
            'categorythum'=>'required|mimes:jpeg,jpg,png',
            'is_home'=>'required'
        ]);
    }
    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug' => 'required|unique:categories',
            'icon' =>'required|mimes:jpeg,jpg,png',
            'categorythum'=>'required|mimes:jpeg,jpg,png',
            'is_home'=>'required'
        ],[
            'icon.required'=>'The category icon field is required.',
            'categorythum.required'=>'The category thumbnail image field is required.'
            ]);
        
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            if($this->icon){
                $imageNamei= Carbon::now()->timestamp.'.'.$this->icon->extension();
                $this->icon->storeAs('category/icon',$imageNamei);
                $category->icon = $imageNamei;
            }
            if($this->categorythum){
                $imageName= Carbon::now()->timestamp.'.'.$this->categorythum->extension();
                $this->categorythum->storeAs('category',$imageName);
                $category->categorythum = $imageName;
                }
                $category->is_home=$this->is_home;
            $category->save();
        
        session()->flash('message','Category has been created successfully!');
    }

    public function render()
    {
        $categories = Category::where('status','!=',3)->get();
       // return view('livewire.admin1.category.add-category-admin1',['categories'=>$categories])->layout('layouts.admin1');

         return view('livewire.category.add-category-component',['categories'=>$categories])->layout('layouts.admin1');
    }
}
