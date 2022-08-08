<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static function sections(){
        $getSections = Section::with('catagories')->where('status',1)->get()->toArray();
        return $getSections;
    }
    public function catagories(){
        return $this->hasMany('App\Models\Catagory','section_id')->where(['parent_id'=>0,'status'=>1])->with('subcatagories');
    }
}
