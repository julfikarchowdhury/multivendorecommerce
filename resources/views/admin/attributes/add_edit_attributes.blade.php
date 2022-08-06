@extends('admin.layout.layouts')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">products</h3>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
            <div class="responsive grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 style="text-align:center; padding-bottom: 20px; text-decoration: underline;font-size:35px;" ><b>Add Attributes</b> </h3>
                        @if (session('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session('success_message')}}</strong> 
                            </div>
                        @endif  
                        <div>
                            @if (session('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> {{ session('error_message')}}</strong> 
                                </div>
                            @endif
                        </div>
                        <form class="forms-sample" action="{{ url('admin/add-edit-attributes/'.$product['id']) }}" 
                            method="post" >@csrf
                            
                            <div class="form-group">
                                <label for="product_name" >Product Name : </label>
                                &nbsp;<b> {{ $product['product_name']}}</b>
                            </div>
                            <div class="form-group">
                                <label for="product_code" >Product Code : </label>
                                &nbsp; <b>{{ $product['product_code']}}</b>
                            </div>
                            <div class="form-group">
                                <label for="product_color" >Product Color : </label>
                                &nbsp; <b>{{ $product['product_color']}}</b>
                            </div>
                            <div class="form-group">
                                <label for="product_price" >Product Price : </label>
                                &nbsp; <b>{{ $product['product_price']}}</b>
                            </div>
                            <!-- <div class="form-group">
                                @if(!empty($product['product_image']))
                                    <img style="width: 120px;" src="{{ url('') }}">
                                @else 
                                    <img style="width: 120px;" src="{{ url('') }}">
                                @endif
                            </div> -->
                            <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="size[]" placeholder="Size" style="width: 100px" required=""/>
                                        <input type="text" name="sku[]" placeholder="SKU" style="width: 100px" required=""/>
                                        <input type="text" name="price[]" placeholder="Price" style="width: 100px" required=""/>
                                        <input type="text" name="stock[]" placeholder="Stock" style="width: 100px" required=""/>
                                        <a href="javascript:void(0);" class="add_button" title="Add Attributes">
                                            Add</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                        <br>
                        <h4 style="text-align:center; padding-bottom: 20px; text-decoration: underline;font-size:35px;"  class="card-title">Products Attributes</h4>
                        
                        
                        
                        <div class="table-responsive pt-3">
                        <table id="sections"  class="table table-bordered table-hover">
                            <thead>
                            <tr >
                                <th style="text-align:center">
                                ID
                                </th>
                                <th style="text-align:center">
                                    Size
                                </th>
                                <th style="text-align:center">
                                    SKU
                                </th>
                                <th style="text-align:center">
                                    Price
                                </th>
                                <th style="text-align:center">
                                    Stock
                                </th>
                                <th style="text-align:center">
                                    Status
                                </th>
                                <th style="text-align:center">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($product['attributes'] as $attribute)
                                
                                <tr>
                                    <td style="padding:5px; text-align:center">
                                    {{ $attribute['id']}}
                                    </td>
                                    <td style="padding:5px; text-align:center">
                                    {{ $attribute['size']}}
                                    </td>
                                    
                                    <td style="padding:5px; text-align:center">
                                    {{ $attribute['sku']}}
                                    </td>
                                    <td style="padding:5px; text-align:center">
                                    {{ $attribute['price']}}
                                    </td>
                                    <td style="padding:5px; text-align:center">
                                    {{ $attribute['stock']}}
                                    </td>
                                    <td>
                                        @if( $attribute['status']==1)
                                        <i style="font-size:35px;" class="mdi mdi-bookmark-check"></i>
                                        @else
                                        <i style="font-size:35px;" class="mdi mdi-bookmark-outline"></i>
                                        @endif
                                    </td>
                                    <td style="padding:5px; text-align:center">
                                      <a href="{{ url('admin/update-attributes/'.$attribute['id']) }}">
                                          <i style="font-size:35px;"  class="mdi mdi-pencil-box"></i>
                                      </a>
                                      
                                      <a href="javascript:void(0)" class="confirmDelete"
                                      module="attribute" moduleid="{{ $attribute['id'] }}">
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
      </div>
@endsection 
                                <!-- @if (session('error'))
                                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> {{ session('error')}}</strong> 
                                  </div>
                                @endif -->