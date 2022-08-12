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
                        @if (session('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> {{ session('success_message')}}</strong> 
                                    </div>
                            @endif    
                        <form class="forms-sample" @if(empty($catagory['id'])) action="{{ url('admin/add-edit-filter') }}"
                            @else action="{{ url('admin/add-edit-filter/'.$filter['id']) }}" @endif
                            method="post" enctype="multipart/form-data">@csrf
                            
                            <div class="form-group">
                                <label for="cat_ids" >Select Catagory</label>
                                <select  class="form-control text-dark" id="cat_ids" name="cat_ids[]" multiple="">
                                  <option value="">Select</option>
                                  @foreach($catagories as $section)
                                    <optgroup label="{{ $section['name'] }}"></optgroup>
                                    @foreach($section['catagories'] as $catagory)
                                    <option @if(!empty($filter['catagory_id']==$catagory['id'])) selected="" @endif value="{{ $catagory['id'] }}">&nbsp;&nbsp;---&nbsp;{{ $catagory['catagory_name'] }}</option>
                                      @foreach($catagory['subcatagories'] as $subcatagory)
                                      <option @if(!empty($filter['catagory_id']==$subcatagory['id'])) selected="" @endif value="{{ $subcatagory['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        ---&nbsp;{{ $subcatagory['catagory_name'] }}</option>
                                      @endforeach
                                    @endforeach
                                  @endforeach
                                </select><br>
                                <p><b>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</b></p>
                            </div>
                            <div class="form-group">
                                <label for="filter_name" >Filter Name</label>
                                <input type="text" class="form-control" id="filter_name" placeholder="Enter Filter Name"
                                name="filter_name" @if(!empty($filter['filter_name'])) value="{{ $filter['filter_name'] }}" 
                                @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="filter_column" >Filter Column</label>
                                <input type="text" class="form-control" id="filter_column" placeholder="Enter Filter column "
                                name="filter_column" @if(!empty($filter['filter_column'])) value="{{ $filter['filter_column'] }}" 
                                @else value="" @endif>
                            </div>
                            
                            <div class="form-group">
                                <label for="status" >Status</label>
                                <input type="number" class="form-control" id="status" placeholder="Enter status "
                                name="status" @if(!empty($filter['status'])) value="{{ $filter['status'] }}" 
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