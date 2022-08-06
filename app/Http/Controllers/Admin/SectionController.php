<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Session;
class SectionController extends Controller
{
    public function sections(){
        $sections = Section::get()->toarray();
        return view('admin.sections.sections')->with(compact('sections'));
    }
    public function deleteSection($id){
        Section::where('id',$id)->delete();
        $message = "Section has been deleted successfully!";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditSection(Request $request,$id=null){
        if($id==""){
            $title = "Add Section";
            $section = new Section;
            $message = "Section added successfully!";
        }else{
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section updeted successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $section->name = $data['section_name'];
            $section->status = $data['status'];;
            $section->save();

            return redirect('admin/sections')->with('success_message',$message);
        }
        return view('admin.sections.add_edit_section')->with(compact('title','section'));

    }
}
