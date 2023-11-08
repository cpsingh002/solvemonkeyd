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

class EditModelNumberComponent extends Component
{
    public $title;
    public $slug;
    public $category_id;
    public $brand_id;
    Public $scategory_id;
    public $status;
    public $mid;
    public $m_id;
    public function mount($mid)
    {
        //dd($scategory_slug);
        
        
            $this->m_id= $mid;
            $modelnumber =ModelNumber::where('id',$this->m_id)->first();
            $this->title = $modelnumber->name;
            $this->slug= $modelnumber->slug;
            $this->category_id = $modelnumber->category_id;
            $this->scategory_id = $modelnumber->subcategory_id;
            $this->brand_id = $modelnumber->brand_id;
            $this->status = $modelnumber->status;
            $this->m_id = $modelnumber->id;
    
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'slug'=>'required|unique:model_numbers,slug,'.$this->m_id            
        ]);
    }

    
    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateModelNumber()
    {
        
        $this->validate([
            'title'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'slug'=>'required|unique:model_numbers,slug,'.$this->m_id
        ]);
              
        $model = ModelNumber::find($this->m_id);
        $model->name = $this->title;
        $model->slug = $this->slug;
        $model->category_id  = $this->category_id;
        $model->subcategory_id  = $this->scategory_id;
        $model->brand_id  = $this->brand_id; 
        $model->status = $this->status;
        $model->save();
    
        session()->flash('message','Model Number has been upadted successfully !');
    }
    
  
    public function render()
    {
        $categories=Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        if($this->scategory_id){
        $brands = Brand::where('subcategory_id',$this->scategory_id)->get();
        }else{
            // dd($this->scategory_id);
        $brands = Brand::where('category_id',$this->category_id)->get();
        }
        return view('livewire.model-number.edit-model-number-component',['categories'=>$categories,'scategories'=>$scategories,'brands'=>$brands])->layout('layouts.admin1');
    }
}
