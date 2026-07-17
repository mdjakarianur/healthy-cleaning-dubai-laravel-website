@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Map Section -->
    <div class="container-fluid p-0">
        <div class="map-container">
            <iframe src="{{ $company->map }}" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="contact-container">
                <!-- Contact Information Section -->
                <div class="contact-info-section">
                    <div class="info-wrapper">
                        <span class="section-badge">GET IN TOUCH</span>
                        <h2 class="contact-title">Our Cleaning Company in Dubai</h2>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Office Address</h4>
                                <p>{{$company->address}}</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Phone Numbers</h4>
                                <p><a href="tel:{{$company->phone}}">{{$company->phone}}</a></p>
                                <p><a href="tel:{{$company->sales_phone}}">{{$company->sales_phone}} (Sales)</a></p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h4>Email Address</h4>
                                <p><a href="mailto:{{$company->email}}">{{$company->email}}</a></p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h4>Working Hours</h4>
                                <div class="working-hours">
                                    {!! $company->office_time !!}
                                </div>
                            </div>
                        </div>

                        <div class="booking-info mt-4">
                            <h3 class="mb-3">How to Book Our Services?</h3>
                            <div class="booking-methods">
                                <div class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="method-text">
                                        <h5>By Phone</h5>
                                        <p>Call our friendly customer service team for instant booking.</p>
                                    </div>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="method-text">
                                        <h5>By Email</h5>
                                        <p>Send your request with your preferred date and time.</p>
                                    </div>
                                </div>
                                <div class="method-item">
                                    <div class="method-icon">
                                        <i class="fas fa-globe"></i>
                                    </div>
                                    <div class="method-text">
                                        <h5>Via Website</h5>
                                        <p>Fill out our simple contact form for a quick response.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Section -->
                <div class="contact-form-section">
                    <div class="form-wrapper">
                        <span class="section-badge">SEND MESSAGE</span>
                        <h2 class="contact-title">Get In Touch</h2>
                        <p class="form-description">Have a question or need a quote? Fill out the form below and we'll get back to you within 24 hours.</p>

                        <form action="{{url('sendMessage')}}" method="POST" id="contactForm">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    Your Name <span class="required">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Your Email <span class="required">*</span>
                                </label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-phone"></i>
                                    Your Phone
                                </label>
                                <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number">
                            </div>

                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-comment"></i>
                                    Your Message <span class="required">*</span>
                                </label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Type your message here..." required></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="submit-btn">
                                    <span>Send Message</span>
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Why Us Start -->
    <div class="container-xxl py-5 why-us-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-badge">WHY CHOOSE US</span>
                <h2 class="display-5">Why Choose Healthy Cleaning Dubai?</h2>
                <p class="section-subtitle">Experience the difference with our professional cleaning services</p>
            </div>

            <div class="row g-4">
                @if($choose_us)
                @foreach($choose_us as $cu)
                <div class="col-lg-4 col-md-6">
                    <div class="why-us-card">
                        <div class="card-icon">
                            <i class="{{ $cu->icon }}"></i>
                        </div>
                        <h4>{{ $cu->title }}</h4>
                        <p>{!! $cu->details !!}</p>
                        <div class="card-shape"></div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Why Us End -->

    @push('footer_scripts')
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        // Form validation and submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic validation
            const name = this.querySelector('input[name="name"]').value;
            const email = this.querySelector('input[name="email"]').value;
            const message = this.querySelector('textarea[name="message"]').value;

            if (!name || !email || !message) {
                toastr.error('Please fill in all required fields');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                toastr.error('Please enter a valid email address');
                return;
            }

            // If validation passes, submit the form
            this.submit();
        });

        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };

        // Show success message if exists
        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif

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
    @endpush

    <!-- Add Font Awesome if not already included -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

<style>
    /* Main Color Variables */
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
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: var(--main-color) !important;
        content: "›" !important;
        font-size: 18px;
    }

    .breadcrumb-item a:hover {
        color: var(--main-color) !important;
    }

    /* Map Container */
    .map-container {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        filter: grayscale(0.2);
        transition: all 0.3s ease;
    }

    .map-container iframe:hover {
        filter: grayscale(0);
    }

    @media (max-width: 768px) {
        .map-container {
            height: 300px;
        }
    }

    /* Contact Container */
    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    @media (max-width: 992px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }

    /* Contact Info Section */
    .contact-info-section {
        background: linear-gradient(135deg, #f8f9fa, #fff);
        padding: 40px;
    }

    .info-wrapper {
        max-width: 500px;
        margin: 0 auto;
    }

    .section-badge {
        display: inline-block;
        padding: 6px 15px;
        background: var(--main-color-light);
        color: var(--main-color-dark);
        font-size: 14px;
        font-weight: 600;
        border-radius: 30px;
        margin-bottom: 15px;
        border: 1px solid var(--main-color);
    }

    .contact-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 30px;
        color: #333;
    }

    @media (max-width: 768px) {
        .contact-title {
            font-size: 28px;
        }
    }

    /* Info Cards */
    .info-card {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(7, 245, 255, 0.15);
        border-left: 4px solid var(--main-color);
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--main-color-dark);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .info-card:hover .info-icon {
        background: var(--main-color);
        color: #000;
        transform: scale(1.1);
    }

    .info-content h4 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .info-content p {
        margin: 0;
        color: #666;
    }

    .info-content a {
        color: #666;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .info-content a:hover {
        color: var(--main-color-dark);
    }

    /* Working Hours */
    .working-hours {
        background: #f8f9fa;
        padding: 10px 15px;
        border-radius: 10px;
    }

    .working-hours p {
        margin: 5px 0;
    }

    /* Booking Methods */
    .booking-methods {
        display: grid;
        gap: 15px;
    }

    .method-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .method-item:hover {
        background: var(--main-color-light);
    }

    .method-icon {
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--main-color-dark);
        font-size: 18px;
    }

    .method-text h5 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333;
    }

    .method-text p {
        margin: 0;
        font-size: 14px;
        color: #666;
    }

    /* Contact Form Section */
    .contact-form-section {
        padding: 40px;
        background: #fff;
    }

    .form-wrapper {
        max-width: 500px;
        margin: 0 auto;
    }

    .form-description {
        color: #666;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
        font-weight: 500;
        color: #333;
    }

    .form-label i {
        color: var(--main-color-dark);
        font-size: 16px;
    }

    .required {
        color: #ff4444;
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--main-color);
        box-shadow: 0 0 0 4px rgba(7, 245, 255, 0.1);
    }

    .form-control::placeholder {
        color: #999;
    }

    .submit-btn {
        width: 100%;
        padding: 16px 30px;
        background: var(--gradient);
        color: #000;
        border: none;
        border-radius: 12px;
        font-size: 18px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(7, 245, 255, 0.3);
    }

    .submit-btn i {
        transition: transform 0.3s ease;
    }

    .submit-btn:hover i {
        transform: translateX(5px);
    }

    /* Why Us Cards */
    .why-us-section {
        background: linear-gradient(135deg, #f8f9fa, #fff);
    }

    .why-us-card {
        position: relative;
        padding: 40px 30px;
        background: #fff;
        border-radius: 20px;
        text-align: center;
        transition: all 0.4s ease;
        overflow: hidden;
        z-index: 1;
    }

    .why-us-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(7, 245, 255, 0.15);
    }

    .card-icon {
        width: 80px;
        height: 80px;
        background: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 35px;
        color: var(--main-color-dark);
        transition: all 0.3s ease;
    }

    .why-us-card:hover .card-icon {
        background: var(--main-color);
        color: #000;
        transform: rotateY(180deg);
    }

    .why-us-card h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    .why-us-card p {
        color: #666;
        margin-bottom: 0;
        line-height: 1.6;
    }

    .card-shape {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 100px;
        height: 100px;
        background: var(--main-color-light);
        border-radius: 50%;
        z-index: -1;
        opacity: 0;
        transition: all 0.4s ease;
    }

    .why-us-card:hover .card-shape {
        opacity: 1;
        transform: scale(2);
    }

    /* Testimonial Cards */
    .testimonial-section {
        background: #fff;
    }

    .testimonial-card {
        padding: 30px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        margin: 10px;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(7, 245, 255, 0.15);
    }

    .testimonial-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .client-image {
        position: relative;
        width: 70px;
        height: 70px;
    }

    .client-image img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--main-color);
    }

    .quote-icon {
        position: absolute;
        bottom: 0;
        right: -5px;
        width: 25px;
        height: 25px;
        background: var(--main-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 12px;
    }

    .client-rating {
        color: #ffc107;
    }

    .testimonial-content {
        margin-bottom: 20px;
    }

    .description {
        color: #666;
        font-style: italic;
        line-height: 1.6;
    }

    .client-name {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 5px;
        color: #333;
    }

    .client-designation {
        color: #999;
        font-size: 14px;
        margin: 0;
    }

    /* Section Subtitle */
    .section-subtitle {
        color: #666;
        max-width: 600px;
        margin: 15px auto 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 576px) {
        .page-header h1 {
            font-size: 32px;
        }

        .contact-info-section,
        .contact-form-section {
            padding: 30px 20px;
        }

        .info-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .why-us-card {
            padding: 30px 20px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            font-size: 25px;
        }

        .testimonial-card {
            padding: 20px;
        }
    }
</style>
