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
    public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }
}
