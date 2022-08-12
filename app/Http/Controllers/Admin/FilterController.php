<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\Catagory;
use App\Models\Section;
use DB;

use App\Models\ProductsFiltersValue;

class FilterController extends Controller
{
    public function filters(){
        // $getCatagories = Catagory::get()->toArray();
        $filters = ProductsFilter::get()->toArray();
        // $id=count($filters['cat_ids']);

        return view('admin.filters.filters')->with(compact('filters'));
    }
    public function filterValue(){
        $filtersValues = ProductsFiltersValue::get()->toArray();
        return view('admin.filters.filters_value')->with(compact('filtersValues'));
    }
    public function addEditFilter(Request $request,$id=null){
        if($id==""){
            $title = "Add Catagory";
            $filter = new ProductsFilter;
            $message = "Filter added successfully!";
        }else{
            $title = "Edit Catagory";
            $filter = ProductsFilter::find($id);
            $message = "Filter updeted successfully!";
        }
        $catagories = Section::with('catagories')->get()->toArray();

        if($request->isMethod('post')){
            $data = $request->all();

            $cat_ids = implode(',',$data['cat_ids']);
            $filter->cat_ids = $cat_ids;

            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = $data['status'];
            
            $filter->save();

            DB::statement('Alter table products add '.$data['filter_column'].' varchar(255)after description');

            return redirect('admin/filters')->with('success_message',$message);
        }
        return view('admin.filters.add_edit_filter')->with(compact('title','filter','catagories'));

    }
}
