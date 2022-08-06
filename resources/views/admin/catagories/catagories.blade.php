@extends('admin.layout.layouts')

@section('content')
    <div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Catagories</h4>
                <div>
                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success_message')}}</strong> 
                        </div>
                    @endif
                </div>
                <a style="max-width: 150px; float: right; display: inline-block;" href="
                {{ url('admin/add-edit-catagory') }}" class="btn btn-block btn-primary">Add Catagories</a>
                
                <div class="table-responsive pt-3">
                <table id="sections"  class="table table-bordered table-hover">
                    <thead>
                    <tr >
                        <th style="text-align:center">
                        ID
                        </th>
                        <th style="text-align:center">
                            Category
                        </th>
                        <th style="text-align:center">
                            Parent Category
                        </th>
                        <th style="text-align:center">
                            Section
                        </th>
                        <th style="text-align:center">
                            URL
                        </th>
                        <th style="text-align:center">
                        Status
                        </th><th style="text-align:center">
                        Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($catagories as $catagory)
                        @if(isset($catagory['parentcatagory']['catagory_name'])&&!empty($catagory['parentcatagory']['catagory_name']))
                            <?php $parent_catagory = $catagory['parentcatagory']['catagory_name']; ?>
                        @else
                            <?php $parent_catagory = "None"; ?>
                        @endif
                        <tr>
                            <td style="padding:5px; text-align:center">
                            {{ $catagory['id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $catagory['catagory_name']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $parent_catagory }}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $catagory['section']['name']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $catagory['url']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                                <!-- //for approving i need json,ajax,jquery -->
                                @if( $catagory['status']==1)
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-check"></i>
                                @else
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-outline"></i>
                                @endif
                            </td>
                            <td style="padding:5px; text-align:center">
                                <a href="{{ url('admin/add-edit-catagory/'.$catagory['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-pencil-box"></i>
                                </a>
                                <?php /*<a title="catagory" class="confirmDelete" 
                                href="{{ url('admin/delete-catagory/'.$catagory['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-file-excel-box"></i>
                                </a>*/ ?>
                                <a href="javascript:void(0)" class="confirmDelete"
                                 module="catagory" moduleid="{{ $catagory['id'] }}">
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