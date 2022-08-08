<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }
    public function parentcatagory(){
        return $this->belongsTo('App\Models\Catagory','parent_id')->select('id','catagory_name');
    }
    public function subcatagories(){
        return $this->hasMany('App\Models\Catagory','parent_id')->where('status',1);
    }
    public static function catagoryDetails($url){
        $catagoryDetails = Catagory::select('id','catagory_name','url')->with('subcatagories')->where('url',$url)->first()->toArray();

        $catIds = array();
        $catIds[] = $catagoryDetails['id'];
        foreach ($catagoryDetails['subcatagories'] as $key => $subcat){
            $catIds[] = $subcat['id'];
        }
        $resp = array('catIds'=>$catIds,'catagorydetails'=>$catagoryDetails);
        return $resp;
    }
}
