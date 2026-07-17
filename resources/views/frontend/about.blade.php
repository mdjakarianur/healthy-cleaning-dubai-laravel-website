@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0">
        <div class="container-fluid page-header-inner p-3">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        :root {
            --main-color: #07f5ff;
            --main-color-dark: #00d8e6;
            --main-color-light: rgba(7, 245, 255, 0.1);
            --gradient: linear-gradient(135deg, #07f5ff, #00d8e6);
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('{{ asset('assets/img/banner.png') }}');
            background-size: cover;
            background-position: center;
            min-height: 300px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: slideInDown 1s ease;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: var(--main-color) !important;
            content: "›" !important;
            font-size: 18px;
        }

        .breadcrumb-item a:hover {
            color: var(--main-color) !important;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .page-header {
                min-height: 250px;
            }
            .page-header h1 {
                font-size: 36px;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                min-height: 200px;
            }
            .page-header h1 {
                font-size: 28px;
            }
        }

        /* About Content */
        .about-content {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            padding: 50px !important;
            position: relative;
            overflow: hidden;
        }

        .about-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--gradient);
        }

        .about-content h1,
        .about-content h2,
        .about-content h3 {
            color: #333;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .about-content h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--main-color);
        }

        .about-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .about-content {
                padding: 30px !important;
            }

            .about-content p {
                font-size: 15px;
            }
        }

        @media (max-width: 576px) {
            .about-content {
                padding: 20px !important;
                border-radius: 20px;
            }
        }

        /* Why Us Cards */
        .why-us-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
        }

        .why-us-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 0;
            background: var(--gradient);
            transition: height 0.4s ease;
            opacity: 0.1;
        }

        .why-us-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.15);
            border-color: var(--main-color);
        }

        .why-us-card:hover::before {
            height: 100%;
        }

        .why-us-card i {
            font-size: 50px;
            color: var(--main-color);
            margin-bottom: 25px;
            transition: all 0.4s ease;
        }

        .why-us-card:hover i {
            transform: scale(1.1) rotate(360deg);
            color: var(--main-color-dark);
        }

        .why-us-card h5 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #333;
        }

        .why-us-card p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 0;
            font-size: 15px;
        }

        /* Team Section */
        .team-container {
            padding: 20px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 36px;
            font-weight: 800;
            color: #333;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--main-color);
        }

        .section-header p {
            color: #666;
            font-size: 16px;
            max-width: 600px;
            margin: 20px auto 0;
        }

        .team-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .team-member {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .team-member:nth-child(1) { animation-delay: 0.1s; }
        .team-member:nth-child(2) { animation-delay: 0.2s; }
        .team-member:nth-child(3) { animation-delay: 0.3s; }
        .team-member:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .team-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-align: center;
            padding-bottom: 25px;
        }

        .team-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.2);
        }

        .team-image-container {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
        }

        .team-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .team-card:hover .team-image {
            transform: scale(1.1);
        }

        .team-name {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin: 20px 0 5px;
            transition: color 0.3s ease;
        }

        .team-card:hover .team-name {
            color: var(--main-color-dark);
        }

        .team-role {
            color: #666;
            font-size: 14px;
            margin: 0;
            padding: 0 15px;
        }

        /* Testimonial Section */
        .testimonial-slider {
            padding: 30px 0;
        }

        .testimonial {
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin: 15px;
            transition: all 0.4s ease;
            position: relative;
            border: 1px solid transparent;
        }

        .testimonial:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.15);
            border-color: var(--main-color);
        }

        .testimonial img {
            width: 100px !important;
            height: 100px !important;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 4px solid var(--main-color);
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .testimonial:hover img {
            transform: scale(1.1);
            border-color: var(--main-color-dark);
        }

        .testimonial .description {
            color: #666;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 20px;
            font-style: italic;
        }

        .testimonial .title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .testimonial .post {
            color: var(--main-color);
            font-size: 14px;
            font-weight: 500;
        }

        /* Quote Icon */
        .testimonial::before {
            content: '\201C';
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 60px;
            color: var(--main-color);
            opacity: 0.2;
            font-family: serif;
        }

        /* Company Stats */
        .company-stats {
            background: var(--gradient);
            padding: 60px 0;
            margin: 40px 0;
            border-radius: 30px;
            color: #000;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 768px) {
            .stat-number {
                font-size: 36px;
            }
            .stat-label {
                font-size: 14px;
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .team-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .team-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .team-image-container {
                height: 250px;
            }

            .section-header h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 576px) {
            .team-row {
                grid-template-columns: 1fr;
                max-width: 350px;
                margin: 0 auto;
            }

            .testimonial {
                padding: 20px;
            }

            .why-us-card {
                padding: 30px 20px;
            }
        }

        /* Animation */
        @keyframes slideInDown {
            from {
                transform: translate3d(0, -100%, 0);
                visibility: visible;
            }
            to {
                transform: translate3d(0, 0, 0);
            }
        }

        .wow {
            visibility: visible !important;
        }

        .fadeInUp {
            animation-name: fadeInUp;
        }
    </style>

    <!-- About Us Start -->
    <div class="container-xxl">
        <div class="container p-5 mt-5 mb-5">
            <div class="about-content bg-light">
                {!! clean_html($data->description) !!}
            </div>
        </div>
    </div>
    <!-- About Us End -->

    <!-- Company Stats Start -->
    <div class="container-xxl">
        <div class="container">
            <div class="company-stats">
                <div class="row g-4">
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Projects Done</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Team Members</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <div class="stat-number">10+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Company Stats End -->

    <!-- Why Us Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">Why Choose Healthy Cleaning Dubai?</h2>
                <p>Experience the difference with our professional cleaning services</p>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="why-us-card">
                        <i class="fa fa-users-cog"></i>
                        <h5 class="mb-3">Experienced & Professional Staff</h5>
                        <p>Our team is well-trained, background-checked, and dedicated to providing top-notch service.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="why-us-card">
                        <i class="fa fa-tools"></i>
                        <h5 class="mb-3">Advanced Equipment & Techniques</h5>
                        <p>We leverage the latest technology to deliver efficient and thorough cleaning.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="why-us-card">
                        <i class="fa fa-certificate"></i>
                        <h5 class="mb-3">Customer Satisfaction Guaranteed</h5>
                        <p>We prioritize quality and excellence, striving to exceed customer expectations in every job.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Us End -->

    <!-- Team Start -->
    @if($employee && count($employee) > 0)
    <div class="container-xxl py-5 bg-light">
        <div class="container team-container">
            <div class="section-header text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">Introduction Of Our Team</h2>
                <p>Meet the dedicated professionals behind our success</p>
            </div>
            <div class="team-row">
                @foreach($employee as $e)
                <div class="team-member wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-card">
                        <div class="team-image-container">
                            <img src="{{ asset('backend/Employee/EmployeeImage') }}/{{ $e->image }}"
                                 alt="{{ $e->name }}"
                                 class="team-image"
                                 loading="lazy">
                        </div>
                        <h4 class="team-name">{{ $e->name }}</h4>
                        <p class="team-role">{{ $e->designation }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!-- Team End -->

    <!-- Testimonial Start -->
    @if($client && count($client) > 0)
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-3">What Our Clients Say About Us</h2>
                <p>Don't just take our word for it - hear from our satisfied customers</p>
            </div>
            <div class="col-md-12">
                <div class="testimonial-slider">
                    <div id="testimonial-slider" class="owl-carousel">
                        @foreach($client as $c)
                        <div class="testimonial">
                            <img src="{{ asset('backend/Client/ClientImage') }}/{{ $c->image }}" alt="{{$c->name}}">
                            <div class="testimonial-content">
                                <p class="description">
                                    {!! $c->description !!}
                                </p>
                            </div>
                            <h3 class="title">{{$c->name}}</h3>
                            <span class="post">{{$c->designation}} - {{$c->company_name}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Testimonial End -->

    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Initialize Wow.js
        new WOW().init();

        // Owl Carousel initialization
        $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
                items: 3,
                margin: 30,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                dots: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>

    <!-- Main Content End -->
@endsection
