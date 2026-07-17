@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0">
        <div class="container-fluid page-header-inner p-3">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Career Opportunities</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Careers</li>
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

        /* Career Section */
        .career-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-badge {
            display: inline-block;
            padding: 8px 20px;
            background: var(--main-color-light);
            color: var(--main-color-dark);
            font-size: 14px;
            font-weight: 600;
            border-radius: 30px;
            margin-bottom: 15px;
            border: 1px solid var(--main-color);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            color: #333;
            margin-bottom: 15px;
        }

        .section-subtitle {
            color: #666;
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 28px;
            }
        }

        /* Job Cards */
        .job-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .job-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .job-card:nth-child(1) { animation-delay: 0.1s; }
        .job-card:nth-child(2) { animation-delay: 0.2s; }
        .job-card:nth-child(3) { animation-delay: 0.3s; }
        .job-card:nth-child(4) { animation-delay: 0.4s; }
        .job-card:nth-child(5) { animation-delay: 0.5s; }
        .job-card:nth-child(6) { animation-delay: 0.6s; }

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

        .job-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.2);
        }

        .job-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .job-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .job-card:hover .job-image {
            transform: scale(1.1);
        }

        .job-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 50%, rgba(7, 245, 255, 0.2));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .job-card:hover .job-overlay {
            opacity: 1;
        }

        .job-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--main-color);
            color: #000;
            padding: 5px 15px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(7, 245, 255, 0.3);
            z-index: 2;
        }

        .job-content {
            padding: 25px 20px;
        }

        .job-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 12px;
            position: relative;
            padding-bottom: 12px;
        }

        .job-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--main-color);
            transition: width 0.3s ease;
        }

        .job-card:hover .job-title::after {
            width: 80px;
        }

        .job-details {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 20px;
            min-height: 60px;
        }

        .job-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            padding: 10px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .job-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #777;
        }

        .job-meta-item i {
            color: var(--main-color);
            font-size: 14px;
        }

        .apply-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(135deg, #f8f9fa, #fff);
            color: var(--main-color-dark);
            border: 2px solid var(--main-color);
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .apply-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .apply-btn:hover {
            color: #000;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(7, 245, 255, 0.3);
        }

        .apply-btn:hover::before {
            left: 0;
        }

        .apply-btn i {
            transition: transform 0.3s ease;
        }

        .apply-btn:hover i {
            transform: translateX(5px);
        }

        /* No Jobs Available */
        .no-jobs {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            grid-column: 1 / -1;
        }

        .no-jobs i {
            font-size: 60px;
            color: var(--main-color);
            margin-bottom: 20px;
        }

        .no-jobs h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .no-jobs p {
            color: #666;
            margin-bottom: 20px;
        }

        .no-jobs .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 30px;
            background: var(--main-color-light);
            color: var(--main-color-dark);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .no-jobs .contact-link:hover {
            background: var(--main-color);
            color: #000;
            transform: translateY(-3px);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .job-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .job-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .job-content {
                padding: 20px 15px;
            }

            .job-title {
                font-size: 18px;
            }

            .job-details {
                font-size: 13px;
                min-height: 50px;
            }
        }

        @media (max-width: 576px) {
            .job-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 0 auto;
            }

            .job-image-wrapper {
                height: 180px;
            }
        }

        /* Animation Keyframes */
        @keyframes slideInDown {
            from {
                transform: translate3d(0, -100%, 0);
                visibility: visible;
            }
            to {
                transform: translate3d(0, 0, 0);
            }
        }

        /* Loading Animation */
        .job-card.loading {
            position: relative;
            overflow: hidden;
        }

        .job-card.loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(7, 245, 255, 0.1), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            100% {
                left: 100%;
            }
        }
    </style>

    <!-- Career Start -->
    <div class="container-fluid career-section">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Join Our Team</span>
                <h2 class="section-title">Career Opportunities</h2>
                <p class="section-subtitle">Explore exciting career opportunities and grow with us</p>
            </div>

            @if($data && count($data) > 0)
                <div class="job-grid">
                    @foreach($data as $index => $d)
                    <div class="job-card">
                        <div class="job-image-wrapper">
                            <img src="{{ asset('backend/Career/CareerImage/') }}/{{ $d->image }}"
                                 class="job-image"
                                 alt="{{ $d->job_title }}"
                                 loading="lazy">
                            <div class="job-overlay"></div>
                            <span class="job-badge">Hiring</span>
                        </div>

                        <div class="job-content">
                            <h3 class="job-title">{{ $d->job_title }}</h3>

                            <div class="job-meta">
                                <span class="job-meta-item">
                                    <i class="fas fa-briefcase"></i>
                                    Full Time
                                </span>
                                <span class="job-meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Dubai
                                </span>
                            </div>

                            <div class="job-details">
                                {!! $d->short_details !!}
                            </div>

                            <a href="mailto:{{ $company->email }}?subject=Application for {{ $d->job_title }} position"
                               class="apply-btn">
                                <span>APPLY NOW</span>
                                <i class="fas fa-paper-plane"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="no-jobs">
                    <i class="fas fa-briefcase"></i>
                    <h3>No Open Positions</h3>
                    <p>We don't have any open positions at the moment, but we're always looking for talented individuals.</p>
                    <a href="{{ url('contact') }}" class="contact-link">
                        <i class="fas fa-envelope"></i>
                        Send us your resume
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- Career End -->

    <!-- Why Join Us Section -->
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #fff, #f8f9fa);">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Why Join Us</span>
                <h2 class="section-title">Benefits & Culture</h2>
                <p class="section-subtitle">Discover what makes us a great place to work</p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center p-4" style="background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-chart-line fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Growth Opportunities</h5>
                        <p style="color: #666; font-size: 14px;">Continuous learning and career advancement</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center p-4" style="background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-medal fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Competitive Salary</h5>
                        <p style="color: #666; font-size: 14px;">Attractive compensation packages</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center p-4" style="background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-clock fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Flexible Hours</h5>
                        <p style="color: #666; font-size: 14px;">Work-life balance prioritized</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card text-center p-4" style="background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); transition: all 0.3s ease;">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-users fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Great Team</h5>
                        <p style="color: #666; font-size: 14px;">Supportive and collaborative environment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
