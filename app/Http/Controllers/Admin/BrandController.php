<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{
    public function brands(){
        $brands = Brand::get()->toarray();
        return view('admin.brands.brands')->with(compact('brands'));
    }
    public function deleteBrand($id){
        Brand::where('id',$id)->delete();
        $message = "Brand has been deleted successfully!";
        return redirect()->back()->with('success_message',$message);

    }
    public function addEditBrand(Request $request,$id=null){
        if($id==""){
            $title = "Add brand";
            $brand = new Brand;
            $message = "Brand added successfully!";
        }else{
            $title = "Edit brand";
            $brand = Brand::find($id);
            $message = "Brand updeted successfully!";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $brand->name = $data['name'];
            $brand->status = $data['status'];;
            $brand->save();

            return redirect('admin/brands')->with('success_message',$message);
        }
        return view('admin.brands.add_edit_brand')->with(compact('title','brand'));

    }
}
