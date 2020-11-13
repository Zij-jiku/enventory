<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>@yield('page_title', 'Moltran | Dashboard')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Responsive bootstrap 4 admin template" name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Plugins css-->
  <link href="{{asset('backend_assets')}}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="{{asset('backend_assets')}}/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="{{asset('backend_assets')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('backend_assets')}}/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

  <!-- Begin page -->
  <div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown d-none d-lg-block">
          <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{asset('backend_assets')}}/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="{{asset('backend_assets')}}/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="{{asset('backend_assets')}}/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="{{asset('backend_assets')}}/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <img src="{{asset('backend_assets')}}/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
            </a>
          </div>
        </li>


        <li class="dropdown notification-list d-none d-md-inline-block">
          <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="mdi mdi-bell noti-icon"></i>
            <span class="badge badge-danger rounded-circle noti-icon-badge">3</span>
          </a>
        </li>

        <li class="dropdown notification-list d-none d-md-inline-block">
          <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
            <i class="mdi mdi-crop-free noti-icon"></i>
          </a>
        </li>

        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-2 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_image }}" alt="" class="rounded-circle mr-2">
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome {{ Auth::user()->name }} !</h6>
            </div>

            <!-- item-->
            <a href=" javascript:void(0);" class="dropdown-item notify-item">
              <a href="{{route('profile.index')}}" class="sl-menu-link dropdown-item">
                <div class="sl-menu-item">
                  <i class="mdi mdi-account-edit-outline"></i>
                  <span class="menu-item-label">Edit Profile</span>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
            </a>

            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }} javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item notify-item">
              <div class="sl-menu-item">
                <i class="mdi mdi-power"></i>
                <span class="menu-item-label">Logout</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </li>

      </ul>

      <!-- LOGO -->
      <div class="logo-box">
        <a href="{{ url('/home') }}" class="logo text-center logo-light">
          <span class="logo-lg">
            <img src="{{ asset('backend_assets') }}/images/logo-light.png" alt="" height="16">
          </span>
        </a>
      </div>
    <!-- LOGO -->

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

      <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">

          <div class="user-box">

            <div class="float-left">
              <a href="#">
                <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_image }}" alt="" class="avatar-md rounded-circle">
              </a>
            </div>

            <div class="user-info">
              <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i>
                </a>
                <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <li>
                     <a href="{{ url('profile/index') }}" class="sl-menu-link dropdown-item">
                         <i class="mdi mdi-account-edit-outline"></i>
                         <span class="menu-item-label">Edit Profile</span>
                     </a><!-- sl-menu-link -->
                   </li>

                  <li>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link dropdown-item">
                      <div class="sl-menu-item">
                        <i class="mdi mdi-power"></i>
                        <span class="menu-item-label">Logout</span>
                      </div><!-- menu-item -->
                    </a><!-- sl-menu-link -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>

                  </li>
                </ul>
              </div>
              <p class="font-13 text-muted m-0">Administrator</p>
            </div>
          </div>

          <ul class="metismenu" id="side-menu">
            <li>
              <a href="{{ url('home') }}" class="waves-effect">
                <i class="mdi mdi-home"></i>
                <span> Dashboard </span>
              </a>
            </li>

            <li>
              <a href="{{ route('pos') }}" class="waves-effect">
                <i class="mdi mdi-home"></i>
                <span> POS </span>
              </a>
            </li>


            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span> Employee </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('employee.index') }}">Add Employee</a></li>
                <li><a href="{{ route('employees.view') }}">All Employee</a></li>
                <li><a href="{{ route('employees.trash') }}">Trash Employee</a></li>
              </ul>
            </li>


            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span> Customer </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('customer.index') }}">Add Customer</a></li>
                <li><a href="{{ route('customers.view') }}">All Customer</a></li>
                {{-- <li><a href="{{ route('employees.trash') }}">Trash Employee</a></li> --}}
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span> Supplier </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('supplier.index') }}">Add Supplier</a></li>
                <li><a href="{{ route('suppliers.view') }}">All Supplier</a></li>
                {{-- <li><a href="{{ route('employees.trash') }}">Trash Employee</a></li> --}}
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Advance Salary (EMP) </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('salary.index') }}">Add Advance Salary</a></li>
                <li><a href="{{ route('salaris.view') }}">All Advance Salary</a></li>
                <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                <li><a href="{{ route('salaris.view') }}">Last Month Salary</a></li>
                {{-- <li><a href="{{ route('employees.trash') }}">Trash Employee</a></li> --}}
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Category</span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('category.index') }}">Add Category</a></li>
                <li><a href="{{ route('categoris.view') }}">All Category</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Product</span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('product.index') }}">Add Product</a></li>
                <li><a href="{{ route('products.view') }}">All Product</a></li>
                <li><a href="{{ route('import.product') }}">Import Product</a></li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Expense</span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('expense.index') }}">Add Expense</a></li>
                <li><a href="{{ route('expenses.view') }}">All Expense</a></li>
                <li><a href="{{ route('today.index') }}">Today Expense</a></li>
                <li><a href="{{ route('thismonth.index') }}">Monthly Expense</a></li>
                <li><a href="{{ route('year.index') }}">Yearly Expense</a></li>
              </ul>
            </li>


            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span>Sales Report</span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="#">First Sale</a></li>
                <li><a href="#">Seceond Sale</a></li>
               
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span> Attendence </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('attendence.index') }}">Take Attendence</a></li>
                <li><a href="{{ route('all.attendence') }}">All Attendence</a></li>
              </ul>
            </li>
            
            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="mdi mdi-email"></i>
                <span> Setting </span>
                <span class="menu-arrow"></span>
              </a>

              <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('setting.index') }}">Setting</a></li>
              </ul>
            </li>


            <li>
              <a href="{{ url('profile/index') }}" class="sl-menu-link @yield('profile')">
                  <i class="mdi mdi-account-edit-outline"></i>
                  <span class="menu-item-label">Edit Profile</span>
              </a><!-- sl-menu-link -->
            </li>

            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sl-menu-link">
                <div class="sl-menu-item">
                  <i class="mdi mdi-power"></i>
                  <span class="menu-item-label">Logout</span>
                </div><!-- menu-item -->
              </a><!-- sl-menu-link -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>

          </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    @yield('dashboard_content')

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    2020 &copy; Zij theme by <a href="#">Reserved</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->



  </div>
  <!-- END wrapper -->

  <!-- Vendor js -->
  <script src="{{asset('backend_assets')}}/js/vendor.min.js"></script>

  <script src="{{asset('backend_assets')}}/libs/moment/moment.min.js"></script>
  <script src="{{asset('backend_assets')}}/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
  <script src="{{asset('backend_assets')}}/libs/sweetalert2/sweetalert2.min.js"></script>

  <!-- Chat app -->
  <script src="{{asset('backend_assets')}}/js/pages/jquery.chat.js"></script>

  <!-- Todo app -->
  <script src="{{asset('backend_assets')}}/js/pages/jquery.todo.js"></script>

  <!-- flot chart -->
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.time.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.resize.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.pie.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.selection.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.stack.js"></script>
  <script src="{{asset('backend_assets')}}/libs/flot-charts/jquery.flot.crosshair.js"></script>

  <!-- Dashboard init JS -->
  <script src="{{asset('backend_assets')}}/js/pages/dashboard.init.js"></script>

  <!-- App js -->
  <script src="{{asset('backend_assets')}}/js/app.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  @yield('footer_scripts')

</body>


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:47:22 GMT -->
</html>
