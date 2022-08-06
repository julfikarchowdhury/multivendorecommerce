<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Section;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $sections = Section::with('catagories')->where(['status'=>1])->get()->toArray();

        return view('front.index')->with(compact('sections'));
    }
}
