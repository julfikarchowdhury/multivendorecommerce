<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Section;

class CatagoryController extends Controller
{
    public function catagories(){
        $catagories = Catagory::with(['section','parentcatagory'])->get()->toarray();
        return view('admin.catagories.catagories')->with(compact('catagories'));
    }
    public function addEditCatagory(Request $request,$id=null){
        if($id==""){
            $title = "Add Catagory";
            $catagory = new Catagory;
            $getCatagories = array();
            $message = "Catagory added successfully!";
        }else{
            $title = "Edit Catagory";
            $catagory = Catagory::find($id);
            // echo "<pre>"; print_r($catagory); die;
            $getCatagories = Catagory::with('subcatagories')->where(['parent_id'=>0,'section_id'=>$catagory['section_id']])->get();
            $message = "Catagory updeted successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $catagory->catagory_name = $data['catagory_name'];
            $catagory->section_id = $data['section_id'];
            $catagory->parent_id = $data['parent_id'];
            $catagory->catagory_discount = $data['catagory_discount'];
            $catagory->description = $data['description'];
            $catagory->url = $data['url'];
            $catagory->catagory_image = "";
            $catagory->meta_title = $data['meta_title'];
            $catagory->meta_description = $data['meta_description'];
            $catagory->meta_keywords = $data['meta_keywords'];
            $catagory->status = $data['status'];;

            $catagory->save();


            return redirect('admin/catagories')->with('success_message',$message);
        }
        $getSections = Section::get()->toArray();
        return view('admin.catagories.add_edit_catagory')->with(compact('title','catagory','getSections','getCatagories'));

    }
    public function appendCatagoryLevel(Request $request){
        if($request->ajax()){
            $data = $request->all();
            
            $getCatagories = Catagory::with('subcatagories')->where(['parent_id'=>0,'section_id'
                =>$data['section_id']])->get()->toArray();
            return view('admin.catagories.append_catagories_level')->with(compact('getCatagories'));

        }
    }
    public function deleteCatagory($id){
            Catagory::where('id',$id)->delete();
            $message = "Catagory has been deleted successfully!";
            return redirect()->back()->with('success_message',$message);
    
    }
    // public function(){
        
    // }
    // public function(){
        
    // }
}
