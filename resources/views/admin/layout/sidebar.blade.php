<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::guard('admin')->user()->type=="vendor")
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-vendor" aria-expanded="false" aria-controls="ui-vendor">
                <i class="mdi mdi-table-edit menu-icon"></i>
                <span class="menu-title">Update Vendor Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-vendor">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/personal')}}"> Personal Details</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/bussiness')}}">Bussiness Detail</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-vendor-details/bank')}}">Bank Detail</a></li>
                </ul>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-update" aria-expanded="false" aria-controls="ui-update">
                <i class="mdi mdi-table-edit menu-icon"></i>
                <span class="menu-title">Update Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-update">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-admin-password')}}">update password</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-admin-details')}}">update detail</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-manage" aria-expanded="false" aria-controls="ui-manage">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Admin Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-manage">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/superadmin')}}">Super Admins</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/subadmin')}}"> Sub Admins</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins/vendor')}}">Vendors</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/admins')}}">All</a></li>
                </ul>
              </div>
            </li>       
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-catalouge" aria-expanded="false" aria-controls="ui-catalouge">
                <i class="mdi mdi-vector-intersection menu-icon"></i>
                <span class="menu-title">Catalouge Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-catalouge">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/sections')}}">Sections</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/catagories')}}">Catagories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/brands')}}">Brands</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">Products</a></li>
                </ul>
              </div>
            </li>     
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-user">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-admin-#')}}">Users</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{url('admin/update-admin-#')}}">Subscribers</a></li>
                </ul>
              </div>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="icon-ban menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>