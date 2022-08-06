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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Password</h4>
                        
                        <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post">@csrf
                        @if (session('status'))
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('status')}}</strong> 
                                  </div>
                        @endif    
                        <div class="form-group">
                                <label >Admin Email</label>
                                <input type="email" class="form-control" value="{{$adminDetails['email']}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Admin Type</label>
                                <input type="text" class="form-control" value="{{$adminDetails['type']}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label >Old Password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="old password">
                                @error('current_password')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if (session('error'))
                                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong> {{ session('error')}}</strong> 
                                  </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label >New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="new password">
                                @error('new_password')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Confirm Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" placeholder="confirm password">
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