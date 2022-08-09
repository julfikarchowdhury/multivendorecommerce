<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\Product;

class ProductsController extends Controller
{
    public function listing(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $url = $data['url'];
            $_GET['sort'] = $data['sort'];
            $catagoryCount = Catagory::where(['url'=>$url,'status'=>1])->count();
            if($catagoryCount>0){

                $catagoryDetails = Catagory::catagoryDetails($url);

                $catagoryProducts = Product::with('brand')->whereIn('catagory_id',$catagoryDetails['catIds'])
                ->where('status',1);

                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort']=="product_latest"){
                        $catagoryProducts->orderBy('products.id','Desc');
                    }else if($_GET['sort']=="product_lowest"){
                        $catagoryProducts->orderBy('products.product_price','Asc');
                    }else if($_GET['sort']=="product_highest"){
                        $catagoryProducts->orderBy('products.product_price','Desc');
                    }else if($_GET['sort']=="name_z_a"){
                        $catagoryProducts->orderBy('products.product_name','Desc');
                    }else if($_GET['sort']=="name_a_z"){
                        $catagoryProducts->orderBy('products.product_name','Asc');
                    }
                }
                $catagoryProducts = $catagoryProducts->Paginate(10);
                // dd($catagoryProducts);

                return view('front.products.ajax_filter_listing')->with(compact('catagoryDetails','catagoryProducts','url'));
            }else{
                abort(404);
        }
        }else{
            $url = Route::getFacadeRoot()->current()->uri();
            $catagoryCount = Catagory::where(['url'=>$url,'status'=>1])->count();
            if($catagoryCount>0){

                $catagoryDetails = Catagory::catagoryDetails($url);

                $catagoryProducts = Product::with('brand')->whereIn('catagory_id',$catagoryDetails['catIds'])
                ->where('status',1);

                if(isset($_GET['sort']) && !empty($_GET['sort'])){
                    if($_GET['sort']=="product_latest"){
                        $catagoryProducts->orderBy('products.id','Desc');
                    }else if($_GET['sort']=="product_lowest"){
                        $catagoryProducts->orderBy('products.product_price','Asc');
                    }else if($_GET['sort']=="product_highest"){
                        $catagoryProducts->orderBy('products.product_price','Desc');
                    }else if($_GET['sort']=="name_z_a"){
                        $catagoryProducts->orderBy('products.product_name','Desc');
                    }else if($_GET['sort']=="name_a_z"){
                        $catagoryProducts->orderBy('products.product_name','Asc');
                    }
                }
                $catagoryProducts = $catagoryProducts->Paginate(10);
                // dd($catagoryProducts);

                return view('front.products.listing')->with(compact('catagoryDetails','catagoryProducts','url'));
            }else{
                abort(404);
            }
        }
        
    }
}
