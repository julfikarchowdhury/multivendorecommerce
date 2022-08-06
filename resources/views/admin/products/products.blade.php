@extends('admin.layout.layouts')

@section('content')
    <div class="main-panel">
     <div class="content-wrapper">
       <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products</h4>
                <div>
                    @if (session('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success_message')}}</strong> 
                        </div>
                    @endif
                </div>
                <a style="max-width: 150px; float: right; display: inline-block;" href="
                {{ url('admin/add-edit-product') }}" class="btn btn-block btn-primary">Add Products</a>
                
                <div class="table-responsive pt-3">
                <table id="sections"  class="table table-bordered table-hover">
                    <thead>
                    <tr >
                        <th style="text-align:center">
                        ID
                        </th>
                        <th style="text-align:center">
                            Product Name
                        </th>
                        <th style="text-align:center">
                            Product Code
                        </th>
                        <th style="text-align:center">
                            Product Colour
                        </th>
                        <th style="text-align:center">
                            Catagory
                        </th>
                        <th style="text-align:center">
                            Section
                        </th>
                        
                        <th style="text-align:center">
                            Creadted By
                        </th>
                        <th style="text-align:center">
                        Status
                        </th><th style="text-align:center">
                        Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                        
                        <tr>
                            <td style="padding:5px; text-align:center">
                            {{ $product['id']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $product['product_name']}}
                            </td>
                            
                            <td style="padding:5px; text-align:center">
                            {{ $product['product_code']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $product['product_color']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $product['catagory']['catagory_name']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                            {{ $product['section']['name']}}
                            </td>
                            <td style="padding:5px; text-align:center">
                              @if($product['admin_type']=="vendor")
                                  <a target="_blank" href="{{ url('admin/view-vendor-details/'.$product['vendor_id']) }}">{{ ucfirst($product['admin_type']) }}</a>
                              @else 
                                  {{ ucfirst($product['admin_type']) }}
                              @endif
                            </td>
                            <td style="padding:5px; text-align:center">
                                <!-- //for approving i need json,ajax,jquery -->
                                @if( $product['status']==1)
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-check"></i>
                                @else
                                 <i style="font-size:35px;" class="mdi mdi-bookmark-outline"></i>
                                @endif
                            </td>
                            <td style="padding:5px; text-align:center">
                                <a href="{{ url('admin/add-edit-product/'.$product['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-pencil-box"></i>
                                </a>
                                <a href="{{ url('admin/add-edit-attributes/'.$product['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-plus-box"></i>
                                </a>
                                <?php /*<a title="catagory" class="confirmDelete" 
                                href="{{ url('admin/delete-catagory/'.$catagory['id']) }}">
                                    <i style="font-size:35px;"  class="mdi mdi-file-excel-box"></i>
                                </a>*/ ?>
                                <a href="javascript:void(0)" class="confirmDelete"
                                 module="product" moduleid="{{ $product['id'] }}">
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