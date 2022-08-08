<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\Product;

class ProductsController extends Controller
{
    public function listing(){
        $url = Route::getFacadeRoot()->current()->uri();
        $catagoryCount = Catagory::where(['url'=>$url,'status'=>1])->count();
        if($catagoryCount>0){

            $catagoryDetails = Catagory::catagoryDetails($url);

            $catagoryProducts = Product::whereIn('catagory_id',$catagoryDetails['catIds'])->where('status',1)->get()->toArray();
            // dd($catagoryProducts);

            return view('front.products.listing')->with(compact('catagoryDetails','catagoryProducts'));
        }else{
            abort(404);
        }
    }
}
