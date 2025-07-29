<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyOffer;
use App\Models\Package;
use Illuminate\View\View;
use Easebuzz\PayWithEasebuzzLaravel\PayWithEasebuzzLib;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\ModelNumber;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    
    public function CompanyOffer(Request $request)
    {
        $companyoffers = CompanyOffer::where('status',1)->get();
        return view('company_offer',['companyoffers'=>$companyoffers]);
    }
    public function CompanyOfferDetails(Request $request)
    {
        $companyoffer = CompanyOffer::where('slug',$request->slug)->where('status',1)->first();
        $rcompanyoffers = CompanyOffer::where('id','!=', $companyoffer->id)->where('status',1)->get();
        return view('company_offer_detail',['companyoffer'=>$companyoffer,'rcompanyoffers'=>$rcompanyoffers]);
    }

    Public function PlanPurchase(Request $request, string $id)
    {
        // dd($request); 
        $packages = Package::where('pslug',$id)->where('status',1)->first();
        if (isset($packages))
        {

        }else{
            return redirect()->route('/');
        }


     return view('livewire.frontend.package-purchase-component',['packages'=>$packages]);
     
        
    }

    Public function PlanPurchaseadd(Request $request)
    {
        $packages = Package::where('pslug',$request->id)->where('status',1)->first();
        // $param = $request->post();
        $postData = array ( 
            "amount" => $packages->price, 
            "firstname" => Auth::user()->name, 
            "email" => Auth::user()->email, 
            "phone" => Auth::user()->phone, 
            "productinfo" => $packages->pname, 
            "surl" => route('easzy.pass'), 
            "furl" => route('user-packages'), 
        );
        $key = "YOUR_KEY_HERE";
        $salt = "YOUR_SALT_HERE";
        $env = "YOUR_ENV_HERE";
        $payebz = new PayWithEasebuzzLib($key, $salt, $env);
        $result = $payebz->initiatePaymentAPI($param, true);
        
        // var_dump($result);
        // die();

        return view('initiate_payment', ['result' => $result]);
    }

    public function ebz_response(Request $request): View
    {
        $param = $request->post();
        // $param will contain the response provided to you by Easebuzz. You can handle your success and failed scenarios based on the response.
        var_dump($param);
        die();
        return view('initiate_payment', ['result' => '']);
    }


     public function ProductImport(Request $request)
    {
        return view('product_import');
    }

    public function ProductImportstore(Request $request)
    {
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
                // dd($getData);              
                    $brand_name = $getData[0];
                    $model_name= $getData[1];
                    $varaint= $getData[2];
                    // $varaint = $getData[3];                          
                // Function to convert array into JSON
              

                $brand = Brand::where('name',$brand_name)->where('category_id','4')->where('subcategory_id','10')->first();
                if(isset($brand)){  

                } else{                 
                    $brand = new Brand();
                    $brand->name = $brand_name;
                    $brand->slug = Str::slug($brand_name);
                    $brand->category_id  = 4;
                    $brand->subcategory_id  = 10;
                    $brand->image = 'solve-logo.png';
                    $brand->status = 1;
                    $brand->save();
                }

                $modelnumber = ModelNumber::where('name',$model_name)->where('brand_id',$brand->id)->where('category_id','4')->where('subcategory_id','10')->first();
                if(isset($modelnumber))
                {
                }else{
                    $modelnumber = new ModelNumber();
                    $modelnumber->name = $model_name;
                    $modelnumber->slug = Str::slug($model_name);
                    $modelnumber->category_id  = 4;
                    $modelnumber->subcategory_id  = 10;
                    $modelnumber->brand_id = $brand->id;           
                    $modelnumber->status = 1;
                    $modelnumber->save();
                }
                $aoption = AttributeOption::where('option_details',$varaint)->where('attribute_id','15')->where('category_id','4')->where('subcategory_id','10')->first();
                if(isset($aoption))
                {

                }else{
                    $slider = new AttributeOption();
                    $slider->category_id = 4;
                    $slider->subcategory_id = 10;
                    $slider->attribute_id = 15;
                    $slider->option_details = $varaint;
                    $slider->status = 1;
                    $slider->save();
                }

               
            }

            // Close opened CSV file
            fclose($csvFile);
           
           
            return redirect()->back();
        }
    }
     public function ProductImportstoreBike(Request $request)
    {
        $fileMimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain'
        );

        // Validate whether selected file is a CSV file
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)) {

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE) {
                // dd($getData);              
                    $brand_name = $getData[0];
                    $model_name= $getData[1];
                    $varaint= $getData[2];
                    // $varaint = $getData[3];                          
                // Function to convert array into JSON
              

                $brand = Brand::where('name',$brand_name)->where('category_id','3')->where('subcategory_id','7')->first();
                if(isset($brand)){  

                } else{                 
                    $brand = new Brand();
                    $brand->name = $brand_name;
                    $brand->slug = Str::slug($brand_name);
                    $brand->category_id  = 3;
                    $brand->subcategory_id  = 7;
                    $brand->image = 'solve-logo.png';
                    $brand->status = 1;
                    $brand->save();
                }

                $modelnumber = ModelNumber::where('name',$model_name)->where('brand_id',$brand->id)->where('category_id','3')->where('subcategory_id','7')->first();
                if(isset($modelnumber))
                {
                }else{
                    $modelnumber = new ModelNumber();
                    $modelnumber->name = $model_name;
                    $modelnumber->slug = Str::slug($model_name);
                    $modelnumber->category_id  = 3;
                    $modelnumber->subcategory_id  = 7;
                    $modelnumber->brand_id = $brand->id;           
                    $modelnumber->status = 1;
                    $modelnumber->save();
                }
                // $aoption = AttributeOption::where('option_details',$varaint)->where('attribute_id','15')->where('category_id','4')->where('subcategory_id','10')->first();
                // if(isset($aoption))
                // {

                // }else{
                //     $slider = new AttributeOption();
                //     $slider->category_id = 4;
                //     $slider->subcategory_id = 10;
                //     $slider->attribute_id = 15;
                //     $slider->option_details = $varaint;
                //     $slider->status = 1;
                //     $slider->save();
                // }

               
            }

            // Close opened CSV file
            fclose($csvFile);
           
           
            return redirect()->back();
        }
    }

}
