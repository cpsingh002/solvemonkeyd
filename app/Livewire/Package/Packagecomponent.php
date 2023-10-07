<?php

namespace App\Livewire\Package;

use App\Models\Package;
use Livewire\WithPagination;
use Livewire\Component;

class Packagecomponent extends Component
{
    use withPagination;
    public function deletePackage($id)
    {
        $category = Package::find($id);
        $category->delete();
        session()->flash('message','Package has been deleted successfully!');
    }
    public function DeactivePackage($id)
    {
        $category = Package::find($id);
        $category->delete();
        session()->flash('message','Sub-Category has been deleted successfully!');
    }

    public function render()
    {
        $packages=Package::paginate(5);
        return view('livewire.package.packagecomponent',['packages'=>$packages])->layout('layouts.admin');
    }
}
