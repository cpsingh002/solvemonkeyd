<?php

namespace App\Livewire\ModelNumber;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\ModelNumber;


class ModelNumberComponent extends Component
{
    use withPagination;
    public function deleteModel($id)
    {
        $category = ModelNumber::find($id);
        $category->delete();
        session()->flash('message','Brand has been deleted successfully!');
    }
    public function render()
    {
        $modelnumbers=ModelNumber::paginate(5);
        return view('livewire.model-number.model-number-component',['modelnumbers'=>$modelnumbers])->layout('layouts.admin1');
    }
}
