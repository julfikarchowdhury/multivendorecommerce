@extends('admin.layout.layouts')

@section('content')
    <div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Filters Value</h4>
                <div>
                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success_message')}}</strong> 
                        </div>
                    @endif
                </div>
                <a style="max-width: 150px; float: left; display: inline-block;" href="
                {{ url('admin/filters') }}" class="btn btn-block btn-primary">View Filters</a>

                <a style="max-width: 160px; float: right; display: inline-block;" href="
                {{ url('admin/add-edit-filtersvalue') }}" class="btn btn-block btn-primary">Add Filter Value</a>
                
                <div class="table-responsive pt-3">
                <table id="sections"  class="table table-bordered table-hover">
                    <thead>
                    <tr >
                        <th style="text-align:center">
                        ID
                        </th>
                        <th style="text-align:center">
                            Filter ID
                        </th>
                        <th style="text-align:center">
                            Filter Name
                        </th>
                        <th style="text-align:center">
                            Filter Value
                        </th>
                        
                        <th style="text-align:center">
                        Status
                        </th><th style="text-align:center">
                        Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($filtersValues as $filtersValue)
                        <tr>
                            <td style="padding:5px; text-align:center">
                            {{ $filtersValue['id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $filtersValue['filter_id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $filtersValue['filter_id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $filtersValue['filter_value']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                                <!-- //for approving i need json,ajax,jquery -->
                                @if( $filtersValue['status']==1)
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-check"></i>
                                @else
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-outline"></i>
                                @endif
                            </td>
                            <td style="padding:5px; text-align:center">
                                <a href="{{ url('admin/add-edit-filtersValue/'.$filtersValue['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-pencil-box"></i>
                                </a>
                                <?php /*<a title="section" class="confirmDelete" 
                                href="{{ url('admin/delete-section/'.$section['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-file-excel-box"></i>
                                </a>*/ ?>
                                <a href="javascript:void(0)" class="confirmDelete"
                                 module="filtersValue" moduleid="{{ $filtersValue['id'] }}">
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