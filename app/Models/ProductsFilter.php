<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsFilter extends Model
{
    use HasFactory;
    public static function getFilterName($catagory_id){
        $getCatagoryName = ProductsFilter::select('filter_name')->where('id',$catagory_id)->first();
        return $getCatagoryName->filter_name;
    }
}
