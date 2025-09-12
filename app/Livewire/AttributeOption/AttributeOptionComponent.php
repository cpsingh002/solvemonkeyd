<?php

namespace App\Livewire\AttributeOption;

use Livewire\Component;
use App\Models\AttributeOption;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
class AttributeOptionComponent extends Component
{
     use WithPagination;
    #[Url(history: true)]
    public string $search = '';
    public function deleteOption($id)
    {
        $slider = AttributeOption::find($id);
        $slider->status=3;
        $slider->save();
        session()->flash('message',"Attribute's Option has been deleted successfully!");
        // $this->js('window.location.reload()');

    }
    public function changeActive($id){
        $slider = AttributeOption::find($id);
        $slider->status=2;
        $slider->save();
        session()->flash('message',"Attribute's Option has been deactivited successfully!");
        // $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $slider = AttributeOption::find($id);
        $slider->status=1;
        $slider->save();
        session()->flash('message',"Attribute's Option has been activited successfully!");
        // $this->js('window.location.reload()');
    }
     public function updatingSearch()
    {
        $this->resetPage();
    }
    public function searchProduct()
    {
        // dd($this->search);
        // $this->dispatch('tableUpdated');
    }

    public function render()
    {
        // dd($this->search);
        // if (!empty($this->search)) {
            $attributeoptions = AttributeOption::where('status', '!=', 3)
            ->where(function($query) {
                $query->where('option_details', 'like', '%'.$this->search.'%')
                    ->orWhereHas('category', function($q) {
                        $q->where('name', 'like', '%'.$this->search.'%');
                    })
                    ->orWhereHas('subcategory', function($q) {
                        $q->where('name', 'like', '%'.$this->search.'%');
                    })
                    ->orWhereHas('attribute', function($q) {
                        $q->where('attribute', 'like', '%'.$this->search.'%');
                    });
            })
            ->with(['category', 'subcategory', 'attribute'])
            ->paginate(15);
        // }else{
        //    $attributeoptions=AttributeOption::where('status','!=',3)->paginate(15); 
        // }
        // $attributeoptions=AttributeOption::where('status','!=',3)->with(['category','subcategory','attribute'])
        // ->where('attribute_options.option_details', 'like', '%'.$this->search.'%')
        // ->orWhere('categories.name', 'like', '%'.$this->search.'%')
        // ->where('sub_categories.name', 'like', '%'.$this->search.'%')
        // ->orWhere('attributes.attribute', 'like', '%'.$this->search.'%')
        // ->paginate(15);
        //  $modelnumbers = ModelNumber::with(['brand', 'category', 'subcategory'])
        //     ->where('name', 'like', '%'.$this->search.'%')
        //     ->orWhere('slug', 'like', '%'.$this->search.'%')
        //     ->paginate(10);
        return view('livewire.attribute-option.attribute-option-component',['attributeoptions'=>$attributeoptions])->layout('layouts.admin1');
    }
}
