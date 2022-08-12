<?php use App\Models\Catagory;
?>
@extends('admin.layout.layouts')

@section('content')
    <div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filters</h4>
                <div>
                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success_message')}}</strong> 
                        </div>
                    @endif
                </div>
                <a style="max-width: 163px; float: left; display: inline-block;" href="
                {{ url('admin/filter-value') }}" class="btn btn-block btn-primary">View Filter Value</a>

                <a style="max-width: 150px; float: right; display: inline-block;" href="
                {{ url('admin/add-edit-filter') }}" class="btn btn-block btn-primary">Add Filter</a>
                
                <div class="table-responsive pt-3">
                <table id="sections"  class="table table-bordered table-hover">
                    <thead>
                    <tr >
                        <th style="text-align:center">
                        ID
                        </th>
                        <th style="text-align:center">
                            Filter Name
                        </th>
                        <th style="text-align:center">
                            Filter column
                        </th>
                        <th style="text-align:center">
                            Catagories
                        </th>
                        <th style="text-align:center">
                        Status
                        </th><th style="text-align:center">
                        Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($filters as $filter)
                        <tr>
                            <td style="padding:5px; text-align:center">
                            {{ $filter['id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $filter['filter_name']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $filter['filter_column']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            <?php
                            $catIds = explode(",",$filter['cat_ids']);
                            foreach ($catIds as $key => $catId ){
                                $catagory_name = Catagory::getCatagoryName($catId);
                                echo $catagory_name. ",";
                            }
                            
                            ?>
                            </td>
                            <td style="padding:5px; text-align:center">
                                <!-- //for approving i need json,ajax,jquery -->
                                @if( $filter['status']==1)
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-check"></i>
                                @else
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-outline"></i>
                                @endif
                            </td>
                            <td style="padding:5px; text-align:center">
                                <a href="{{ url('admin/add-edit-filter/'.$filter['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-pencil-box"></i>
                                </a>
                                <?php /*<a title="section" class="confirmDelete" 
                                href="{{ url('admin/delete-section/'.$section['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-file-excel-box"></i>
                                </a>*/ ?>
                                <a href="javascript:void(0)" class="confirmDelete"
                                 module="filter" moduleid="{{ $filter['id'] }}">
                                    <i style="font-size:35px;"  class="mdi mdi-file-excel-box"></i>
                                </a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
       </div>
     </div>
     @include('admin.layout.footer')
    </div>
@endsection