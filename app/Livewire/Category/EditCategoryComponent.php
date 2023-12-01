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
    public $newicon;

    public function mount($category_slug)
    {
        //dd($scategory_slug);
       
            $this->category_slug= $category_slug;
            $category =Category::where('slug',$this->category_slug)->first();
            $this->category_id = $category->id;
            $this->name= $category->name;
            $this->slug = $category->slug;
            $this->icon = $category->icon;
            $this->categorythum = $category->categorythum;
        
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
        if($this->newicon)
        {
            $this->validateOnly($fields,[
                'newicon'=>'required|mimes:svg,png',
            ]);
        }
        if($this->category_id)
        {
            $this->validateOnly($fields,[
                'name'=>'required',
                'slug'=>'required|unique:categories,slug,'.$this->category_id
            ]);
        }
    }

    public function updateCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug' => 'required|unique:categories,slug,'.$this->category_id
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage'=>'required|mimes:jpeg,jpg,png',
            ]);
        }
        if($this->newicon)
        {
            $this->validateOnly($fields,[
                'newicon'=>'required|mimes:svg,png',
            ]);
        }
        
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if($this->newicon){
                //unlink('admin/category/icon'.'/'.$scategory->icon);
                $imageNamei= Carbon::now()->timestamp.'.'.$this->newicon->extension();
                $this->newicon->storeAs('category/icon',$imageNamei);
                $category->icon = $imageNamei;
            }
            if($this->newimage){
               // unlink('admin/category'.'/'.$category->categorythum);
                $imageName= Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAs('admin/category',$imageName);
                $category->categorythum = $imageName;
            }
            $category->save();
        
        session()->flash('message','Category has been upadted successfully !');
    }
    public function render()
    {
        $categories = Category::all();
         return view('livewire.category.edit-category-component',['categories'=>$categories])->layout('layouts.admin1');


        //return view('livewire.admin1.category.edit-category-admin1',['categories'=>$categories])->layout('layouts.admin1');
    }
}
