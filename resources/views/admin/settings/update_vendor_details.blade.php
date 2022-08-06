@extends('admin.layout.layouts')

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Personal Details</h3>
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
          @if($slug=="personal")
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Vendor Personal Details</h4>
                        
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form">@csrf
                        @if (session('status'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('status')}}</strong> 
                                  </div>
                        @endif    
                        <div class="form-group">
                                <label >Vendor Email</label>
                                <input type="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Vendor Type</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->type}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control " name="vendor_name" value="{{Auth::guard('admin')->user()->name}}" required="">
                                
                            </div>
                            <div class="form-group">
                                <label >Address</label>
                                <input type="text" class="form-control " name="vendor_address" value="{{$vendorDetails['address']}}" required="">
                                
                            </div>
                            <div class="form-group">
                                <label >City</label>
                                <input type="text" class="form-control " name="vendor_city" value="{{$vendorDetails['city']}}" required="">
                                
                            </div><div class="form-group">
                                <label >State</label>
                                <input type="text" class="form-control " name="vendor_state" value="{{$vendorDetails['state']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Country</label>
                                <input type="text" class="form-control " name="vendor_country" value="{{$vendorDetails['country']}}" required="">
                                <!-- <select class="form-control" id="vendor_country"  name="vendor_country">
                                    <option value="{{$vendorDetails['country']}}">Select Country</option>
                                    @foreach($countries as $country)
                                      <option value="{{$vendorDetails['country']}}" @if ($country->country_name == $vendorDetails['country']) selected @endif >{{ $country['country_name']}}</option>
                                    @endforeach
                                </select> -->
                                
                            </div><div class="form-group">
                                <label >Pincode</label>
                                <input type="text" class="form-control " name="vendor_pincode" value="{{$vendorDetails['pincode']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Phone</label>
                                <input type="text" class="form-control " name="vendor_phone" value="{{Auth::guard('admin')->user()->phone}}" required="">
                                
                            </div>
                            <!-- <div class="form-group">
                                <label >Image</label>
                                <input type="file" class="form-control " name="new_image"  required="">
                                
                            </div>
                             -->
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
          @elseif($slug=="bussiness")
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Vendor Bussiness Details</h4>
                        
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/bussiness') }}" method="post" enctype="multipart/form">@csrf
                        @if (session('status'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('status')}}</strong> 
                                  </div>
                        @endif    
                        <div class="form-group">
                                <label >Vendor Email</label>
                                <input type="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly="">
                            </div>
                            <!-- <div class="form-group">
                                <label >Type</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->type}}" readonly="">
                            </div> -->
                            <div class="form-group">
                                <label >Shop Name</label>
                                <input type="text" class="form-control " name="shop_name" value="{{$vendorDetails['shop_name']}}" required="">
                                
                            </div>
                            <div class="form-group">
                                <label >Shop Address</label>
                                <input type="text" class="form-control " name="shop_address" value="{{$vendorDetails['shop_address']}}" required="">
                                
                            </div>
                            <div class="form-group">
                                <label >Shop City</label>
                                <input type="text" class="form-control " name="shop_city" value="{{$vendorDetails['shop_city']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Shop State</label>
                                <input type="text" class="form-control " name="shop_state" value="{{$vendorDetails['shop_state']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Shop Country</label>
                                <input type="text" class="form-control " name="shop_country" value="{{$vendorDetails['shop_country']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Shop Pincode</label>
                                <input type="text" class="form-control " name="shop_pincode" value="{{$vendorDetails['shop_pincode']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Shop Phone</label>
                                <input type="text" class="form-control " name="shop_mobile" value="{{$vendorDetails['shop_mobile']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Address Type</label>
                                <select class="form-control " name="address_proof" required="">
                                    <option value="passport">Passport</option>
                                    <option value="Birth Certificate">Birth Certificate</option>
                                    <option value="National ID">National ID</option>
                                    <option value="Driving License">Driving License</option>
                                </select>
                            </div><div class="form-group">
                                <label >Address proof</label>
                                <input type="text" class="form-control " name="address_proof_image" value="{{$vendorDetails['address_proof_image']}}" required="">
                                <!-- <div class="form-group">
                                <label >Image</label>
                                <input type="file" class="form-control " name="new_image"  required="">
                                
                            </div>
                             -->
                            </div><div class="form-group">
                                <label >Bussiness License Number</label>
                                <input type="text" class="form-control " name="bussiness_license_number" value="{{$vendorDetails['bussiness_license_number']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Shop GST Number</label>
                                <input type="text" class="form-control " name="gst_number" value="{{$vendorDetails['gst_number']}}" required="">
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
          @elseif($slug=="bank")
          <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Vendor Bank Details</h4>
                        
                        <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form">@csrf
                        @if (session('status'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('status')}}</strong> 
                                  </div>
                        @endif    
                            <div class="form-group">
                                <label >Vendor Email</label>
                                <input type="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Account Holder Name</label>
                                <input type="text" class="form-control " name="vendor_name" value="{{Auth::guard('admin')->user()->name}}" readonly="">
                                
                            </div>
                            <div class="form-group">
                                <label >Bank Name</label>
                                <input type="text" class="form-control " name="bank_name" value="{{$vendorDetails['bank_name']}}" required="">
                                
                            </div>
                            <div class="form-group">
                                <label >Bank IFSC Code</label>
                                <input type="text" class="form-control " name="bank_ifsc_code" value="{{$vendorDetails['bank_ifsc_code']}}" required="">
                                
                            </div><div class="form-group">
                                <label >Account Number</label>
                                <input type="text" class="form-control " name="account_number" value="{{$vendorDetails['account_number']}}" required="">
                                
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
          @endif
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