@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Our Team</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Team</li>
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

        /* Team Section */
        .team-container {
            padding: 60px 0;
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

        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 28px;
            }
        }

        /* Team Grid */
        .team-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        /* Team Member Card */
        .team-member {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .team-member:nth-child(1) { animation-delay: 0.1s; }
        .team-member:nth-child(2) { animation-delay: 0.2s; }
        .team-member:nth-child(3) { animation-delay: 0.3s; }
        .team-member:nth-child(4) { animation-delay: 0.4s; }
        .team-member:nth-child(5) { animation-delay: 0.5s; }
        .team-member:nth-child(6) { animation-delay: 0.6s; }
        .team-member:nth-child(7) { animation-delay: 0.7s; }
        .team-member:nth-child(8) { animation-delay: 0.8s; }

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
            position: relative;
            cursor: pointer;
        }

        .team-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.2);
        }

        /* Image Container */
        .team-image-container {
            position: relative;
            overflow: hidden;
            height: 300px;
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

        /* Overlay with social links */
        .team-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(7, 245, 255, 0.9), transparent);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 30px;
            opacity: 0;
            transition: all 0.4s ease;
        }

        .team-card:hover .team-overlay {
            opacity: 1;
        }

        .team-social {
            display: flex;
            gap: 15px;
            transform: translateY(20px);
            transition: transform 0.4s ease 0.1s;
        }

        .team-card:hover .team-social {
            transform: translateY(0);
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--main-color-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .social-link:hover {
            background: var(--main-color);
            color: #000;
            transform: rotate(360deg);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Team Info */
        .team-info {
            padding: 25px 20px;
            text-align: center;
            background: #fff;
            position: relative;
        }

        .team-name {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .team-card:hover .team-name {
            color: var(--main-color-dark);
        }

        .team-role {
            color: #666;
            font-size: 15px;
            margin-bottom: 0;
            position: relative;
            display: inline-block;
            padding-bottom: 5px;
        }

        .team-role::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 2px;
            background: var(--main-color);
            transition: width 0.3s ease;
        }

        .team-card:hover .team-role::after {
            width: 50px;
        }

        /* No Team Members */
        .no-team {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            grid-column: 1 / -1;
        }

        .no-team i {
            font-size: 60px;
            color: var(--main-color);
            margin-bottom: 20px;
        }

        .no-team h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .no-team p {
            color: #666;
            margin-bottom: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .team-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .team-image-container {
                height: 280px;
            }
        }

        @media (max-width: 768px) {
            .team-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .team-image-container {
                height: 250px;
            }

            .team-name {
                font-size: 20px;
            }

            .team-role {
                font-size: 14px;
            }

            .team-info {
                padding: 20px 15px;
            }
        }

        @media (max-width: 576px) {
            .team-row {
                grid-template-columns: 1fr;
                max-width: 350px;
                margin: 0 auto;
            }

            .team-image-container {
                height: 300px;
            }

            .team-name {
                font-size: 22px;
            }

            .team-role {
                font-size: 15px;
            }
        }

        /* Loading Animation */
        .team-card.loading {
            position: relative;
            overflow: hidden;
        }

        .team-card.loading::after {
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

        /* Hover Effects */
        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 2px solid transparent;
            border-radius: 20px;
            transition: all 0.4s ease;
            pointer-events: none;
            z-index: 2;
        }

        .team-card:hover::before {
            border-color: var(--main-color);
            box-shadow: inset 0 0 30px rgba(7, 245, 255, 0.2);
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

        /* Team Stats */
        .team-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 40px 0 20px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: var(--main-color-dark);
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 576px) {
            .team-stats {
                gap: 20px;
            }

            .stat-number {
                font-size: 28px;
            }

            .stat-label {
                font-size: 12px;
            }
        }
    </style>

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container team-container">
            <div class="section-header">
                <h2 class="mb-3">Introduction Of Our Team</h2>
                <p>Meet the dedicated professionals behind our success</p>
            </div>

            <!-- Team Stats -->
            @if($data && count($data) > 0)
            <div class="team-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ count($data) }}+</div>
                    <div class="stat-label">Team Members</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Projects Done</div>
                </div>
            </div>
            @endif

            <!-- Team Grid -->
            @if($data && count($data) > 0)
                <div class="team-row">
                    @foreach($data as $index => $e)
                    <div class="team-member">
                        <div class="team-card">
                            <div class="team-image-container">
                                <img src="{{ asset('backend/Employee/EmployeeImage') }}/{{ $e->image }}"
                                     alt="{{ $e->name }}"
                                     class="team-image"
                                     loading="lazy">

                                <!-- Social Overlay -->
                                <div class="team-overlay">
                                    <div class="team-social">
                                        @if($e->facebook)
                                        <a href="{{ $e->facebook }}" class="social-link" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        @endif
                                        @if($e->twitter)
                                        <a href="{{ $e->twitter }}" class="social-link" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        @endif
                                        @if($e->linkedin)
                                        <a href="{{ $e->linkedin }}" class="social-link" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        @endif
                                        @if($e->instagram)
                                        <a href="{{ $e->instagram }}" class="social-link" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="team-info">
                                <h4 class="team-name">{{ $e->name }}</h4>
                                <p class="team-role">{{ $e->designation }}</p>

                                @if($e->experience)
                                <small class="d-block mt-2" style="color: #999;">
                                    <i class="fas fa-briefcase me-1" style="color: var(--main-color);"></i>
                                    {{ $e->experience }} experience
                                </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="no-team">
                    <i class="fas fa-users"></i>
                    <h3>No Team Members Found</h3>
                    <p>Our team information will be updated soon.</p>
                </div>
            @endif
        </div>
    </div>
    <!-- Team End -->

    <!-- Company Culture Section -->
    @if($data && count($data) > 0)
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #f8f9fa, #fff);">
        <div class="container">
            <div class="section-header">
                <h2 class="mb-3">Our Company Culture</h2>
                <p>What makes us unique</p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-handshake fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Collaborative Environment</h5>
                        <p class="text-muted">We believe in teamwork and mutual respect</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-lightbulb fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Innovation First</h5>
                        <p class="text-muted">Creative thinking and new ideas are always welcomed</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-heart fa-3x" style="color: var(--main-color);"></i>
                        </div>
                        <h5>Work-Life Balance</h5>
                        <p class="text-muted">We care about our team's wellbeing</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Optional: Add hover effect for team cards
        document.addEventListener('DOMContentLoaded', function() {
            const teamCards = document.querySelectorAll('.team-card');

            teamCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
@endsection
