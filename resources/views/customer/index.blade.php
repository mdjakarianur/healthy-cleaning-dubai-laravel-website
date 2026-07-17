<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - customer Panel</title>
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('dashboard_files') }}/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="{{ asset('backend/CompanyProfile/CompanyProfileIcon') }}/{{ $company->icon }}" />
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3"style="color: #fff;">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{route('customer.dashboard')}}">
                        <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $company->logo }}" alt="logo" style="height: 80px;"/>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{route('customer.dashboard')}}">
                        <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $company->logo }}" alt="logo" style="height: 70px;"/>
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Hello, <span class="text-black fw-bold">{{ Auth::guard('customer')->user()->customer_name }}</span></h1>
                        <h3 class="welcome-sub-text">Welcome to Your Dashboard! Manage Your Profile, Update Details, and Stay Connected.</h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="search-form" action="#">
                        <i class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('/backend/')}}/{{ Auth::guard('customer')->user()->img }}" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle img-fluid" src="{{ asset('/backend/')}}/{{ Auth::guard('customer')->user()->img }}" alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::guard('customer')->user()->customer_name }}</p>
                            <p class="fw-light text-muted mb-0">{{ Auth::guard('customer')->user()->email }}</p>
                        </div>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                        <a class="dropdown-item" href="{{ url("customerlogout") }}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.dashboard')}}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Service</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Book a Service</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/viewservice/')}}">View Booked Service</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/servicebooking/')}}">Book a Service</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Your Profile</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Profile</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/customerprofile/'.Auth('customer')->user()->id) }}">My Profile</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Change Password</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/changepasswordcustomer')}}">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Change Password</span>
                        </a>
                    </li>
                </ul>
            </nav>

        @yield('content')
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Thank you for creating with <a href="sbit.com.bd" target="_blank">SBIT</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <script>document.write(new Date().getFullYear());</script>. All rights reserved.</span>
            </div>
        </footer>
    </div>
</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('dashboard_files') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('dashboard_files') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('dashboard_files') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('dashboard_files') }}/js/off-canvas.js"></script>
  <script src="{{ asset('dashboard_files') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('dashboard_files') }}/js/template.js"></script>
  <script src="{{ asset('dashboard_files') }}/js/companys.js"></script>
  <script src="{{ asset('dashboard_files') }}/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('dashboard_files') }}/js/chart.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
