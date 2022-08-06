@extends('admin.layout.layouts')

@section('content')
<div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$title}}</h4>
                
                <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="padding:10px;">
                        ID
                        </th>
                        <th style="padding:10px;">
                            Name
                        </th>
                        <th style="padding:10px;">
                        Type
                        </th>
                        <th style="padding:10px;">
                        Phone
                        </th>
                        <th style="padding:10px;">
                        Email
                        </th>
                        <th style="padding:10px;">
                        Image
                        </th><th style="padding:10px;">
                        Status
                        </th><th style="padding:10px;">
                        Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($admins) === 0)
                        <tr>
                            <td colspan="8" style="text-align: center; color:red;"><strong>SORRY!! </strong>No {{$title}} are available.</b></td></tr>
                    @else
                      @foreach($admins as $admin)
                        <tr>
                            <td style="padding:10px;">
                            {{ $admin['id']}}
                            </td>
                            <td style="padding:10px;">
                            {{ $admin['name']}}
                            </td>
                            <td style="padding:10px;">
                            {{ $admin['type']}}
                            </td>
                            <td style="padding:10px;">
                            {{ $admin['email']}}
                            </td>
                            <td style="padding:10px;">
                            {{ $admin['phone']}}
                            </td>
                            <td style="padding:10px;">
                            {{ $admin['image']}}
                            </td>
                            <td style="padding:10px;">
                                @if( $admin['status']==1)
                                 <i style="font-size:30px;" class="mdi mdi-bookmark-check"></i>
                                @else
                                 <i style="font-size:30px;" class="mdi mdi-bookmark-outline"></i>
                                @endif
                            </td>
                            <td style="padding:10px;">
                                @if($admin['type']=="vendor")
                                <a href="{{ url('admin/view-vendor-details/'.$admin['vendor_id']) }}">
                            <i style="font-size:30px;"  class="mdi mdi-file-document"></i></a>@endif
                            </td>
                        </tr>
                      @endforeach
                    @endif
                      
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