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
                        <h3 style="text-align:center; padding-bottom: 20px; text-decoration: underline;" ><b>{{ $title }}</b> </h3>
                        @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> {{ session('status')}}</strong> 
                                    </div>
                            @endif    
                        <form class="forms-sample" @if(empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}"
                            @else action="{{ url('admin/add-edit-banner/'.$banner['id']) }}" @endif
                            method="post" enctype="multipart/form-data">@csrf
                            
                            <div class="form-group">
                                <label for="image" >Banner Image</label>
                                <!-- <input type="text" name="image" id="image" class="form-control" placeholder="Enter image"
                                @if(!empty($banner['image'])) value="{{ $banner['image'] }}" 
                                @else value="" @endif> -->
                                <input type="file" class="form-control" id="image"
                                name="image" @if(!empty($banner['image'])) value="{{ $banner['image'] }}"
                                 @else value=""  @endif>
                                 @if(!empty($banner['image']))
                                    <img style="height:50px; width:50px;" src="{{ asset('storage/front/images/banner-images/'.$banner['image'])}}">&nbsp; &nbsp;
                                    <a href="javascript:void(0)" class="confirmDelete" module="banner-image" 
                                    moduleid="{{$banner['id'] }}">Delete Image</a>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="catagory_image" >Image Link</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="Enter link"
                                @if(!empty($banner['link'])) value="{{ $banner['link'] }}" 
                                @else value="" @endif>
                                    
                            </div>
                            <div class="form-group">
                                <label for="catagory_discount" >Image Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter title"
                                name="title" @if(!empty($banner['title'])) value="{{ $banner['title'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="catagory_discount" >Alternative</label>
                                <input type="text" class="form-control" id="alt" placeholder="Enter alternative"
                                name="alt" @if(!empty($banner['alt'])) value="{{ $banner['alt'] }}" 
                                @else value="0.00" @endif>
                            </div>                         
                            <div class="form-group">
                                <label for="section_name" >Status</label>
                                <input type="number" class="form-control" id="status" placeholder="Enter status"
                                name="status" @if(!empty($banner['status'])) value="{{ $banner['status'] }}" 
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