@extends('admin.layout.layouts')

@section('content')
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold" >Vendor Information</h3>
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor Details</h4>
                  
                  <!-- <form class="forms-sample"> -->
                   @foreach($personals as $personal)
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Name</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" value="{{$personal['name']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Type</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['type']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Phone</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['phone']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Email</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['email']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Image</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['image']}}" readonly="">
                      </div>
                    </div>
                   @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor Bank Details</h4>
                  
                  <!-- <form class="forms-sample"> -->
                   @foreach($bank as $personal)
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Bank Name</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" type="text" class="form-control" value="{{$personal['bank_name']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Bank IFSC Code</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['bank_ifsc_code']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Account Number</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['account_number']}}" readonly="">
                      </div>
                    </div>
                   @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Vendor Bussiness Details</h4>
                  
                  <!-- <form class="forms-sample"> -->
                   @foreach($bussiness as $personal)
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label"> Shop Name</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" value="{{$personal['shop_name']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Address</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_address']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop City</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_city']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop State</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_state']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Country</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_country']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Pincode</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_pincode']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Phone</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_mobile']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Website</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_website']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Shop Email</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['shop_email']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Address Proof</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['address_proof']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Address Proof Image</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['address_proof_image']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">Bussiness License Number</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['bussiness_license_number']}}" readonly="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-5 col-form-label">GST Number</label>
                      <div class="col-sm-7">
                      <input type="text" class="form-control" value="{{$personal['gst_number']}}" readonly="">
                      </div>
                    </div>
                   @endforeach
                </div>
              </div>
            </div>

        </div>
     @include('admin.layout.footer')
    </div>
@endsection