<style>
    /* ===== Main Color ===== */
    :root {
        --main-color: #07f5ff;
        --main-color-dark: #00d8e6;
        --main-color-light: rgba(7, 245, 255, 0.1);
        --secondary-color: #2fa84f;
    }

    /* ===== Topbar ===== */
    .topbar {
        background: linear-gradient(135deg, #0a5c75 0%, #0d7a9c 100%);
        color: #fff;
        font-size: 14px;
        padding: 10px 0;
    }

    .topbar small {
        color: #fff;
        opacity: 0.9;
        transition: all 0.3s ease;
    }

    .topbar small:hover {
        opacity: 1;
        color: var(--main-color);
    }

    .topbar small i,
    .topbar small .bi {
        color: var(--main-color);
        margin-right: 5px;
    }

    /* ===== Navbar ===== */
    .navbar {
        min-height: 78px;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
        font-weight: 600;
        padding: 30px 18px;
        color: #1f2937;
        transition: all 0.3s ease;
        position: relative;
    }

    .navbar-nav .nav-link:after {
        content: '';
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 30px;
        height: 3px;
        background: var(--main-color);
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .navbar-nav .nav-link:hover:after,
    .navbar-nav .nav-link.active:after {
        transform: translateX(-50%) scaleX(1);
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: var(--main-color-dark);
    }

    /* Mobile navbar */
    @media (max-width: 991px) {
        .navbar {
            min-height: 70px;
        }

        .navbar-nav .nav-link {
            padding: 15px 18px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar-nav .nav-link:after {
            bottom: 10px;
        }

        .navbar-collapse {
            background: white;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 0 0 20px 20px;
            padding: 10px 0;
        }
    }

    /* ===== Service Dropdown Menu (প্রতি ক্যাটাগরির জন্য) ===== */
    .service-drop-menu {
        width: 300px;
        /* ছোট রাখা হয়েছে */
        padding: 15px 20px;
        border: none;
        border-radius: 14px;
        box-shadow: 0 15px 40px rgba(7, 245, 255, 0.15);
        border: 1px solid rgba(7, 245, 255, 0.2);
    }

    @media (max-width: 992px) {
        .service-drop-menu {
            width: 100%;
            border-radius: 0;
            max-height: none !important;
            box-shadow: none;
            border: none;
            padding: 15px;
        }
    }

    /* Service links inside dropdown */
    .service-drop-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-drop-menu li {
        margin-bottom: 8px;
    }

    .service-drop-menu li a {
        color: #374151 !important;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.25s ease;
        display: inline-block;
        position: relative;
        padding-left: 5px;
    }

    .service-drop-menu li a:before {
        content: '→';
        position: absolute;
        left: -15px;
        opacity: 0;
        color: var(--main-color);
        transition: all 0.3s ease;
    }

    /* Social buttons */
    .btn-sm-square {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.2) !important;
        color: #fff !important;
        margin-left: 5px;
    }

    .btn-sm-square:hover {
        background: var(--main-color) !important;
        color: #000 !important;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(7, 245, 255, 0.4);
    }

    @media (max-width: 1200px) {
        .btn-sm-square {
            width: 30px;
            height: 30px;
        }
    }

    /* Logo */
    .navbar-brand img {
        height: 100px;
        transition: all 0.3s ease;
    }

    .navbar-brand img:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .navbar-brand img {
            height: 50px;
        }
    }

    /* Mobile toggler */
    .navbar-toggler {
        border: 2px solid var(--main-color);
        padding: 8px 12px;
        border-radius: 8px;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(7, 245, 255, 0.3);
        outline: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(7, 245, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Dropdown menu animation */
    .dropdown-menu {
        display: block;
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    @media (max-width: 991px) {
        .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            display: none;
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }
    }

    /* Scrollbar styling */
    .service-drop-menu::-webkit-scrollbar {
        width: 6px;
    }

    .service-drop-menu::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .service-drop-menu::-webkit-scrollbar-thumb {
        background: var(--main-color);
        border-radius: 10px;
    }

    .service-drop-menu::-webkit-scrollbar-thumb:hover {
        background: var(--main-color-dark);
    }

    /* ===============================
   MOBILE FLOATING MENU BOX ONLY
=================================*/
    @media (max-width: 991px) {

        .navbar-collapse {
            position: fixed;
            top: 20px;
            left: -320px;
            width: 350px;
            /* height: calc(100vh - 40px); */
            background: #f3f3f3;
            z-index: 1050;
            padding: 60px 20px 25px;
            /* top padding বাড়ানো হয়েছে */
            transition: 0.4s ease;
            overflow-y: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .navbar-collapse.show {
            left: 12px;
            top: 80px;
        }

        /* Close Button */
        .menu-close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background: #ffffff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .menu-close:hover {
            background: var(--main-color);
            color: #000;
            transform: rotate(90deg);
        }

        /* Overlay */
        .menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            opacity: 0;
            visibility: hidden;
            transition: 0.3s;
            z-index: 1040;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Menu Links */
        .navbar-nav .nav-link {
            padding: 14px 0;
            font-size: 16px;
            font-weight: 500;
            border-bottom: none;
            color: #333;
        }

        .dropdown-menu {
            background: transparent;
            border: none;
            box-shadow: none;
            padding-left: 10px;
        }

    }

    .call-wrappers {
        position: relative;
        display: inline-block;
        margin: 20px;
    }

    /* Green Badge */
    .call-badges {
        position: absolute;
        top: -17px;
        left: 38px;
        background: linear-gradient(145deg, #2ecc71, #27ae60);
        color: #fff;
        padding: 4px 16px;
        border-radius: 0px 20px 0px 20px;
        font-size: 13px;
        font-weight: 600;
        z-index: 3;
    }

    /* Main Number Button (short height) */
    .call-buttons {
        position: relative;
        display: flex;
        align-items: center;
        background: linear-gradient(145deg, #6fd3da, #4fbec6);
        color: #fff;
        padding: 12px 35px 12px 75px;
        border-radius: 40px;
        font-size: 18px;
        font-weight: 700;
        text-decoration: none;
        /* box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); */
        overflow: visible;
        /* IMPORTANT */
    }

    /* Bigger Key Head Icon */
    .call-icon {
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        background: linear-gradient(145deg, #2ecc71, #27ae60);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }

    .call-icon i {
        color: #fff;
        font-size: 30px;
    }

    .call-wrappers {
        animation: floatBtn 3s ease-in-out infinite;
    }


    /* =========================
   Animated Hamburger
========================= */

    .custom-toggler {
        border: none;
        background: transparent;
        padding: 5px;
    }

    .custom-toggler:focus {
        box-shadow: none;
    }

    .ham {
        cursor: pointer;
        transition: transform 400ms;
        user-select: none;
    }

    .line {
        fill: none;
        stroke: var(--main-color);
        stroke-width: 5.5;
        stroke-linecap: round;
        transition: stroke-dasharray 400ms, stroke-dashoffset 400ms;
    }

    .hamRotate.active {
        transform: rotate(45deg);
    }

    .ham4 .top {
        stroke-dasharray: 40 121;
    }

    .ham4 .bottom {
        stroke-dasharray: 40 121;
    }

    .ham4.active .top {
        stroke-dashoffset: -68px;
    }

    .ham4.active .bottom {
        stroke-dashoffset: -68px;
    }

    .ham.active .line {
        stroke: var(--main-color-dark);
    }

    /* =========================
   MOBILE: 5 services fixed + RIGHT scrollbar visible
========================= */
    @media (max-width: 991px) {

        /* Dropdown container */
        .service-drop-menu {
            padding-right: 4px;
            position: relative;
        }

        /* SCROLL ONLY INSIDE UL */
        .service-scroll {
            max-height: calc(10 * 38px);
            /* exactly 5 items */
            overflow-y: scroll;
            /* force scrollbar */
            padding-right: 8px;
            /* space for scrollbar */
            scrollbar-gutter: stable;

            background: #fff;
            border-radius: 10px;
        }

        /* Each service height */
        .service-scroll li {
            line-height: 28px;
            margin-bottom: 0px;
        }
        .service-scroll li a{
            font-size: 13px;
        }

        /* ===== Scrollbar visible (WebKit browsers) ===== */
        .service-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .service-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .service-scroll::-webkit-scrollbar-thumb {
            background: var(--main-color);
            border-radius: 10px;
        }

        .service-scroll::-webkit-scrollbar-thumb:hover {
            background: var(--main-color-dark);
        }

        /* Bottom fade hint (user understands more content) */
        .service-drop-menu::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 22px;
            pointer-events: none;
        }
    }
</style>

<!-- Topbar Start -->
{{-- <div class="container-fluid topbar p-0">
    <div class="row gx-0 align-items-center">
        <!-- Left side - Contact Info -->
        <div class="col-lg-7 col-md-12 px-3 px-lg-5 text-center text-lg-start">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <small class="me-4 py-2 d-inline-flex align-items-center">
                    <i class="fa fa-map-marker-alt me-2"></i>
                    <span class="d-none d-sm-inline">{{ $company->address }}</span>
                    <span class="d-sm-none">{{ $company->address }}</span>
                </small>
                <small class="me-4 py-2 d-inline-flex align-items-center">
                    <i class="bi bi-telephone-fill me-2"></i>
                    <span class="d-none d-sm-inline">{{ $company->phone }}</span>
                    <span class="d-sm-none">{{ $company->phone }}</span>
                </small>
                <small class="py-2 d-inline-flex align-items-center">
                    <i class="bi bi-whatsapp me-2"></i>
                    <span class="d-none d-sm-inline">{{ $company->sales_phone }}</span>
                    <span class="d-sm-none">{{ $company->sales_phone }}</span>
                </small>
            </div>
        </div>

        <!-- Right side - Payment & Social -->
        <div class="col-lg-5 col-md-12 px-3 px-lg-5 text-center text-lg-end">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
                <small class="me-3 d-none d-md-inline">Happily Accepted:</small>
                <div class="d-flex align-items-center">
                    <img src="https://neatandhealthycleaning.com/public/images/icon/visa.png" height="20"
                        class="me-1" alt="Visa">
                    <img src="https://neatandhealthycleaning.com/public/images/icon/card.png" height="20"
                        class="me-3" alt="Mastercard">

                    <a class="btn-sm-square bg-white text-primary ms-2" href="{{ $company->facebook }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn-sm-square bg-white text-primary" href="{{ $company->instagram }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Topbar End -->

<!-- Navbar Start -->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <div class="menu-overlay"></div>

    @php
        $pathlogo = public_path() . '/backend/CompanyProfile/CompanyProfileLogo/' . $company->logo;
    @endphp

    @if (file_exists($pathlogo))
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-3 px-lg-4">
            <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $company->logo }}" alt="Logo"
                class="img-fluid">
        </a>
    @endif

    <!-- ✅ Animated Hamburger -->
    <button type="button" class="navbar-toggler me-3 custom-toggler" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">

        <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="55">
            <path class="line top"
                d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>

    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">

        <!-- Close Button -->
        <button class="menu-close d-lg-none">&times;</button>

        <div class="navbar-nav ms-auto p-3 p-lg-0">
        <li><a class="nav-link dropdown-toggle" href="{{ url('/') }}">Home</a></li>

            @if ($categories)
                @foreach ($categories as $c)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{ $c->category_name }}
                            <i class="fas fa-caret-down"></i>
                        </a>

                        <div class="dropdown-menu fade-up m-0 service-drop-menu">
                            <ul class="service-scroll">
                                @foreach ($c->services as $t)
                                    <li>
                                        <a href="{{ url('service_detail') }}/{{ $t->id }}">
                                            <i class="fas fa-check-circle"></i>
                                            {{ $t->service_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Call Button -->
            <div class="call-wrappers">
                <div class="call-badges">Call Us Now!</div>
                <a href="tel:+{{ $company->sales_phone }}" class="call-buttons">
                    <span class="call-icon">
                        <i class="fab fa-whatsapp"></i>
                    </span>
                    {{ $company->sales_phone }}
                </a>
            </div>

        </div>
    </div>
</nav>
<!-- Navbar End -->
<!-- Navbar End -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        // Prevent dropdown from closing when clicking inside the service menu
        $(document).on('click', '.service-drop-menu', function(e) {
            e.stopPropagation();
        });
    });
</script>
<script>
    $(document).ready(function() {

        // Toggle overlay when menu open
        $('.navbar-toggler').on('click', function() {
            setTimeout(function() {
                $('.menu-overlay').toggleClass('active');
            }, 50);
        });

        // Close on overlay click
        $('.menu-overlay').on('click', function() {
            $('.navbar-collapse').collapse('hide');
            $(this).removeClass('active');
        });

        // Close on cross button click
        $('.menu-close').on('click', function() {
            $('.navbar-collapse').collapse('hide');
            $('.menu-overlay').removeClass('active');
        });

    });
</script>
<script>
    $(document).ready(function() {

        // Toggle hamburger animation
        $('.custom-toggler').on('click', function() {
            $(this).find('.ham').toggleClass('active');

            setTimeout(function() {
                $('.menu-overlay').toggleClass('active');
            }, 100);
        });

        // Close on overlay click
        $('.menu-overlay').on('click', function() {
            $('.navbar-collapse').collapse('hide');
            $('.ham').removeClass('active');
            $(this).removeClass('active');
        });

        // Close on cross button click
        $('.menu-close').on('click', function() {
            $('.navbar-collapse').collapse('hide');
            $('.ham').removeClass('active');
            $('.menu-overlay').removeClass('active');
        });

    });
</script>
