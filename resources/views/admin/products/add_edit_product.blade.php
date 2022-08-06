@extends('admin.layout.layouts')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">product</h3>
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
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 style="text-align:center; padding-bottom: 20px; text-decoration: underline;" ><b>{{ $title }}</b> </h3>
                        @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> {{ session('status')}}</strong> 
                                    </div>
                            @endif    
                        <form class="forms-sample" @if(empty($catagory['id'])) action="{{ url('admin/add-edit-product') }}"
                            @else action="{{ url('admin/add-edit-product/'.$product['id']) }}" @endif
                            method="post" enctype="multipart/form">@csrf
                            
                            <div class="form-group">
                                <label for="catagory_id" >Select Catagory</label>
                                <select  class="form-control text-dark" id="catagory_id" name="catagory_id" >
                                  <option value="">Select</option>
                                  @foreach($catagories as $section)
                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                    @foreach($section['catagories'] as $catagory)
                                    <option @if(!empty($product['catagory_id']==$catagory['id'])) selected="" @endif value="{{ $catagory['id'] }}">&nbsp;&nbsp;---&nbsp;{{ $catagory['catagory_name'] }}</option>
                                      @foreach($catagory['subcatagories'] as $subcatagory)
                                      <option @if(!empty($product['catagory_id']==$subcatagory['id'])) selected="" @endif value="{{ $subcatagory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        ---&nbsp;{{ $subcatagory['catagory_name'] }}</option>
                                      @endforeach
                                    @endforeach
                                  @endforeach
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="brand_id" >Brand Name</label>
                                <select  class="form-control text-dark" id="brand_id" name="brand_id" >
                                  <option value="">Select</option>
                                  @foreach($brands as $brand)
                                   <option @if(!empty($product['brand_id']==$brand['id'])) selected="" @endif value="{{ $brand['id'] }}">{{$brand['name'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_name" >Product Name</label>
                                <input type="text" class="form-control" id="product_name" placeholder="Enter product name"
                                name="product_name" @if(!empty($product['product_name'])) value="{{ $product['product_name'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_code" >Product Code</label>
                                <input type="text" class="form-control" id="product_code" placeholder="Enter product code"
                                name="product_code" @if(!empty($product['product_code'])) value="{{ $product['product_code'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_color" >Product Color</label>
                                <input type="text" class="form-control" id="product_color" placeholder="Enter product color"
                                name="product_color" @if(!empty($product['product_color'])) value="{{ $product['product_color'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_price" >Product price</label>
                                <input type="text" class="form-control" id="product_price" placeholder="Enter product price"
                                name="product_price" @if(!empty($product['product_price'])) value="{{ $product['product_price'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_discount" >Product Discount</label>
                                <input type="text" class="form-control" id="product_discount" placeholder="Enter product discount"
                                name="product_discount" @if(!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_weight" >Product Weight</label>
                                <input type="text" class="form-control" id="product_weight" placeholder="Enter product weight"
                                name="product_weight" @if(!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_image" >Product Image</label>
                                <input type="file" name="product_image" id="product_image" class="form-control"
                                @if(!empty($product['product_image'])) value="{{ $product['product_image'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="product_video" >Product Video</label>
                                <input type="file" name="product_video" id="product_video" class="form-control"
                                @if(!empty($product['product_video'])) value="{{ $product['product_video'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="description" >Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Enter description"
                                name="description" @if(!empty($product['description'])) value="{{ $product['description'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_title" >Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title"
                                name="meta_title" @if(!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_description" >Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" placeholder="Enter Meta Description"
                                name="meta_description" @if(!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords" >Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" placeholder="Enter Meta keywords"
                                name="meta_keywords" @if(!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="is_featured" >Featured Item</label>
                                <input type="checkbox"  id="is_featured" value="yes" 
                                name="is_featured" @if(!empty($product['is_featured']) && $product['is_featured']=="Yes") checked=""  @endif>
                            </div>
                            <div class="form-group">
                                <label for="status" >Status</label>
                                <input type="number" class="form-control" id="status" placeholder="Enter status "
                                name="status" @if(!empty($product['status'])) value="{{ $product['status'] }}" 
                                @else value="0" @endif>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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