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
                        <form class="forms-sample" @if(empty($catagory['id'])) action="{{ url('admin/add-edit-catagory') }}"
                            @else action="{{ url('admin/add-edit-catagory/'.$catagory['id']) }}" @endif
                            method="post" enctype="multipart/form">@csrf
                            
                            <div class="form-group">
                                <label for="catagory_name" >Catagory Name</label>
                                <input type="text" class="form-control" id="catagory_name" placeholder="Enter catagory name"
                                name="catagory_name" @if(!empty($catagory['catagory_name'])) value="{{ $catagory['catagory_name'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="catagory_name" >Section ID</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($getSections as $section)
                                    <option value="{{ $section['id'] }}" 
                                    @if(!empty($catagory['section_id']) && $catagory['section_id']==$section['id']) selected=""  @endif >{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="appendCatagoriesLevel">
                              @include('admin.catagories.append_catagories_level')
                            </div>
                            <div class="form-group">
                                <label for="catagory_image" >Catagory Image</label>
                                <input type="file" name="catagory_image" id="catagory_image" class="form-control"
                                @if(!empty($catagory['catagory_image'])) value="{{ $catagory['catagory_image'] }}" 
                                @else value="" @endif>
                                    
                            </div>
                            <div class="form-group">
                                <label for="catagory_discount" >Catagory Discount</label>
                                <input type="text" class="form-control" id="catagory_discount" placeholder="Enter catagory discount"
                                name="catagory_discount" @if(!empty($catagory['catagory_discount'])) value="{{ $catagory['catagory_discount'] }}" 
                                @else value="0.00" @endif>
                            </div>
                            <div class="form-group">
                                <label for="description" >Catagory Description</label>
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Enter Description"
                                 rows="3">@if(!empty($catagory['description'])) {{ $catagory['description'] }}
                                @else  @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="url" >Catagory URL</label>
                                <input type="text" class="form-control" id="url" placeholder="Enter catagory url"
                                name="url" @if(!empty($catagory['url'])) value="{{ $catagory['url'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_title" >Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" placeholder="Enter Meta Title"
                                name="meta_title" @if(!empty($catagory['meta_title'])) value="{{ $catagory['meta_title'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_description" >Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" placeholder="Enter Meta Descriptiont"
                                name="meta_description" @if(!empty($catagory['meta_description'])) value="{{ $catagory['meta_description'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords" >Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" placeholder="Enter Meta Keyw0rds"
                                name="meta_keywords" @if(!empty($catagory['meta_keywords'])) value="{{ $catagory['meta_keywords'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="section_name" >Status</label>
                                <input type="number" class="form-control" id="status" placeholder="Enter section name"
                                name="status" @if(!empty($catagory['status'])) value="{{ $catagory['status'] }}" 
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