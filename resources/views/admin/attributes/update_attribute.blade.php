@extends('admin.layout.layouts')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">settings</h3>
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
                        <h3 style="text-align:center; padding-bottom: 20px; text-decoration: underline;" ><b>Update Attribute</b> </h3>
                        @if (session('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ session('success_message')}}</strong> 
                            </div>
                        @endif  
                        <form class="forms-sample" action="{{ url('admin/update-attributes/'.$productsatt['id']) }}" 
                            method="post" >@csrf
                            
                            <div class="form-group">
                                <label for="size" >Size</label>
                                <input type="text" class="form-control" id="size" 
                                name="size" value="{{ $productsatt['size'] }}">
                            </div>
                            <div class="form-group">
                                <label for="sku" >SKU</label>
                                <input type="text" class="form-control" id="sku" 
                                name="sku" value="{{ $productsatt['sku'] }}">
                            </div>
                            <div class="form-group">
                                <label for="price" >Price</label>
                                <input type="number" class="form-control" id="price" 
                                name="price" value="{{ $productsatt['price'] }}">
                            </div>
                            <div class="form-group">
                                <label for="stock" >Stock</label>
                                <input type="text" class="form-control" id="stock" 
                                name="stock" value="{{ $productsatt['stock'] }}">
                            </div>
                            <div class="form-group">
                                <label for="status" >Status</label>
                                <input type="text" class="form-control" id="status"name="status" value="{{ $productsatt['status'] }}">
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