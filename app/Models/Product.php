<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id');
    }
    public function catagory(){
        return $this->belongsTo('App\Models\Catagory','catagory_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }
    public static function getDiscountPrice($product_id){
        $proDetails = Product::select('product_price','product_discount','catagory_id')->where('id',$product_id)->first();
        $proDetails = json_decode(json_encode($proDetails),true);

        $catDetails = Catagory::select('catagory_discount')->where('id',$proDetails['catagory_id'])->first();
        $catDetails = json_decode(json_encode($catDetails),true);

        if($proDetails['product_discount']>0){
            
            $discounted_price = round($proDetails['product_price'] - ($proDetails['product_price']*$proDetails['product_discount']/100));

        }else if($catDetails['catagory_discount']>0){

            $discounted_price = round($proDetails['product_price'] - ($proDetails['product_price']*$catDetails['catagory_discount']/100));

        }else{
            $discounted_price = 0;
        }
        return $discounted_price;
    }
    public static function isProductnew($product_id){
        $productIds = Product::select('id')->where('status',1)->orderby('id','Desc')->limit(4)->pluck('id');
        $productIds = json_decode(json_encode($productIds),true);
        if(in_array($product_id,$productIds)){
            $isProductnew = "Yes";
        }else{
            $isProductnew = "No";
        }
        return $isProductnew;
    }
}
