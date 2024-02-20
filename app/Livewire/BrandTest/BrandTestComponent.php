<?php

namespace App\Livewire\BrandTest;

use Livewire\Component;
use App\Models\BrandTest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class BrandTestComponent extends Component
{
    public function render()
    {
        $brands=BrandTest::all();
       // $brands=BrandTest::select('brand_tests.*')->ARRAY_CONTAINS('category_idarray', "4")->get();
//       $brands = DB::table('brand_tests')->select('brand_tests.*')->ARRAY_CONTAINS('category_idarray', "4")->get();
//$brands = DB::table('brand_tests')->select('brand_tests.*')->where('category_idarray','Like','%"22"%')->get();
// dd($brands);
        return view('livewire.brand-test.brand-test-component',['brands'=>$brands])->layout('layouts.admin1');
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
