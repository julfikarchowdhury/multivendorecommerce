<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\BannerImage;
use App\Models\Product;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $sections = Section::with('catagories')->where(['status'=>1])->get()->toArray();
        $sliderbanner = BannerImage::where(['type'=>'Slider'])->where(['status'=>1])->get()->toArray();
        $fixbanner = BannerImage::where(['type'=>'Fix'])->where(['status'=>1])->get()->toArray();
        $newProducts = Product::orderBy('id','Desc')->where(['status'=>1])->get()->toArray();
        $bestSellerProducts = Product::where(['is_bestseller'=>'Yes'])->where(['status'=>1])->inRandomorder()->get()->toArray();
        $discountedProducts = Product::where('product_discount','>','0')->where(['status'=>1])->inRandomorder()->get()->toArray();
        $featuredProducts = Product::where(['is_featured'=>'Yes'])->where(['status'=>1])->inRandomorder()->get()->toArray();

        return view('front.index')->with(compact('sections','sliderbanner',
        'fixbanner','newProducts','bestSellerProducts','discountedProducts','featuredProducts'));
    }
   
}
