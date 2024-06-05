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
        $model = ModelNumber::find($id);
        $model->status=3;
        $model->save();
        session()->flash('message','Model has been deleted successfully!');
        $this->js('window.location.reload()');
    }
    public function changeActive($id){
        $model = ModelNumber::find($id);
        $model->status=2;
        $model->save();
        session()->flash('message','Model has been deactivited successfully!');
        $this->js('window.location.reload()');
    }
    public function changeDeactive($id){
        $model = ModelNumber::find($id);
        $model->status=1;
        $model->save();
        session()->flash('message','Model has been activited successfully!');
        $this->js('window.location.reload()');
    }
    public function render()
    {
        $modelnumbers=ModelNumber::where('status','!=',3)->get();
        return view('livewire.model-number.model-number-component',['modelnumbers'=>$modelnumbers])->layout('layouts.admin1');
    }
}
