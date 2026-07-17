<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - customer Panel</title>
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet"
        href="{{ asset('frontend/dashboard_files') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard_files') }}/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="{{ asset('/backend/')}}/{{$company->image}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row align-items-center d-flex flex-row">
                            <div class="col-lg-12 error-page-divider text-lg-left pl-lg-4">
                                <h1>SORRY!</h1>
                                <h2 class="font-weight-light">Your Are Registered, But Not Approved Yet.</h2>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <a class="btn btn-Success" href="{{route('customerlogout')}}"><i class="ti-home mr-2"></i>Back to home</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">Copyright &copy; 2021 All rights
                                    reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('frontend/dashboard_files') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('frontend/dashboard_files') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('frontend/dashboard_files') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('frontend/dashboard_files') }}/js/off-canvas.js"></script>
    <script src="{{ asset('frontend/dashboard_files') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('frontend/dashboard_files') }}/js/template.js"></script>
    <script src="{{ asset('frontend/dashboard_files') }}/js/settings.js"></script>
    <script src="{{ asset('frontend/dashboard_files') }}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('frontend/dashboard_files') }}/js/chart.js"></script>
    <!-- End custom js for this page-->
    </body>

    </html>
