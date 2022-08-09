<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;

class FilterController extends Controller
{
    public function filters(){
        $filters = ProductsFilter::get()->toArray();
        return view('admin.filters.filters')->with(compact('filters'));
    }
    public function filterValue(){
        $filtersValues = ProductsFiltersValue::get()->toArray();
        return view('admin.filters.filters_value')->with(compact('filtersValues'));
    }
}
