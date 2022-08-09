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
        $catagoryDetails = Catagory::select('id','parent_id','catagory_name','url','description')->with(['subcatagories'=>function($query){
            $query->select('id','parent_id','catagory_name','url','description');
        }])->where('url',$url)->first()->toArray();
        // dd($catagoryDetails);
        $catIds = array();
        $catIds[] = $catagoryDetails['id'];

        if($catagoryDetails['parent_id']==0){
            $breadcrumbs = '<li class="is-marked">
            <a href="'.url($catagoryDetails['url']).'">'.$catagoryDetails['catagory_name'].'</a></li>';
        }else{
            $parentCatagory = Catagory::select('catagory_name','url')->where('id',$catagoryDetails['parent_id'])->first()->toArray();
            $breadcrumbs='<li class="is-marked">
            <a href="'.url($parentCatagory['url']).'">'.$parentCatagory['catagory_name'].'</a></li>
            <li class="is-marked">
            <a href="'.url($catagoryDetails['url']).'">/ '.$catagoryDetails['catagory_name'].'</a>
            </li>';
        }
        foreach ($catagoryDetails['subcatagories'] as $key => $subcat){
            $catIds[] = $subcat['id'];
        }
        $resp = array('catIds'=>$catIds,'catagorydetails'=>$catagoryDetails,'breadcrumbs'=>$breadcrumbs);
        return $resp;
    }
}
