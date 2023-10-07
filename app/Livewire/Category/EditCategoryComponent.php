<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditCategoryComponent extends Component
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

    public function mount($category_slug,$scategory_slug=null)
    {
        //dd($scategory_slug);
        if($scategory_slug)
        {
            $this->scategory_slug = $scategory_slug;
            $scategory = SubCategory::where('slug',$scategory_slug)->first();
            $this->scategory_id = $scategory->id;
            $this->category_id =  $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
            $this->icon = $scategory_id->icon;
            $this->categorythum = $scategory_id->categorythum;
            //dd($this->slug);
        }else{
            $this->category_slug= $category_slug;
            $category =Category::where('slug',$this->category_slug)->first();
            $this->category_id = $category->id;
            $this->name= $category->name;
            $this->slug = $category->slug;
            $this->icon = $category->icon;
            $this->categorythum = $category->categorythum;
        }
    }


    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
    }

    public function updateCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug' => 'required|unique:categories'
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->scategory_id){
            $scategory =  SubCategory::find($this->scategory_id);
            $scategory->name =$this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory_id->icon = $this->icon;
            if($this->newimage){
                unlink('admin/category'.'/'.$scategory_id->categorythum);
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('category',$imageName);
                $scategory_id->categorythum = $imageName;
            }
            $scategory->save();
            
        }else{
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->icon = $this->icon;
            if($this->newimage){
                unlink('admin/category'.'/'.$category->categorythum);
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('category',$imageName);
                $category->categorythum = $imageName;
            }
            $category->save();
        }
        session()->flash('message','Category has been upadted successfully !');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category.edit-category-component',['categories'=>$categories])->layout('layouts.admin');
    }
}
