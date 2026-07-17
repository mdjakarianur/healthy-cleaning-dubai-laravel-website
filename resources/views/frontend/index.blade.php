@extends('frontend.layouts.master')

@section('content')

    <!-- Navbar Start -->

    @include('frontend.layouts.navbar')

    <!-- Main Content Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <!-- Carousel Start -->
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @php $i = 0; @endphp
            @if (isset($slider))
                @foreach ($slider as $s)
                    @php $i++; @endphp

                    <div class="carousel-item @if ($i == 1) active @endif">
                        <img class="w-100 slider-img"
                            src="{{ asset('/backend/PhotoGallery/PhotoGalleryImage/' . $s->image) }}" alt="Image">

                        <!-- Overlay for darkening image slightly -->
                        <div class="slider-overlay"></div>

                        <!-- Caption -->
                        <div class="carousel-caption custom-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-8 col-sm-10 col-12 text-start position-relative">

                                        <div class="slider-caption-content">
                                            <h1 class="slider-title">
                                                {{ $s->title }}
                                            </h1>

                                            <p class="slider-text">
                                                {{ $s->sub_title }}
                                            </p>

                                            <div class="slider-buttons" style="margin-left: 30px;">
                                                <a href="{{ $s->url }}" class="btn btn-primary me-3">View Details</a>
                                                <a href="https://wa.me/{{ $company->sales_phone }}"
                                                    class="btn btn-outline-light">Book Now</a>
                                            </div>

                                            <!-- bottom blue bar -->
                                            <span class="slider-bottom-bar"></span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach
            @endif

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <!-- Indicators (mobile only) -->
        <div class="carousel-indicators d-flex d-md-none">
            @php $j = 0; @endphp
            @if (isset($slider))
                @foreach ($slider as $s)
                    <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="{{ $j }}"
                        class="@if ($j == 0) active @endif"
                        aria-current="@if ($j == 0) true @endif"></button>
                    @php $j++; @endphp
                @endforeach
            @endif
        </div>
    </div>
    <!-- Carousel End -->
    
    <div class="feature-sections">
        <div class="container">
    
            <a href="tel:+{{ $company->phone }}" class="book-service-btn">
                <i class="fa fa-phone"></i> Book A Service
            </a>
    
            <!-- Row 1 -->
            <div class="services-slider">
                <div class="services-row">
                    @foreach ($services as $service)
                        <div class="service-item">
                            <a href="{{ url('service_detail/' . $service->id) }}">
                                <img src="{{ asset('/backend/Service/Favicon/' . $service->favicon) }}">
                                <h6>{{ $service->service_name }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    
        </div>
    </div>

    <!-- Features Start -->
    <div class="feature-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-6 mb-4 mb-lg-0 reveal-left">

                    <span class="text-secondary fw-semibold text-uppercase">
                        @lang('about_us.about_us')
                    </span>

                    <h2 class="fw-bold mt-2 mb-4" style="font-size: 36px; color:#1f9d55;">
                        {{ $about->title ?? '' }}
                    </h2>

                    <p class="fw-semibold mb-3">
                        {{ $about->sub_title ?? '' }}
                    </p>

                    {{-- DESCRIPTION AS HTML --}}
                    @php
                        $features = preg_split("/\r\n|\n|\r/", trim(strip_tags($about->description)));
                    @endphp

                    @if (!empty($features))
                        <ul class="list-unstyled feature-list">
                            @foreach ($features as $feature)
                                @if (trim($feature) !== '')
                                    <li>
                                        <i class="fa fa-check-circle"></i>
                                        {{ $feature }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif

                    <!-- Emergency Box -->
                    <div class="emergency-box mt-4">
                        <i class="fa fa-phone"></i>
                        <div>
                            <small>Emergency 24/7</small>
                            <strong>+{{ $company->phone ?? '' }}</strong>
                        </div>
                    </div>

                </div>

                <!-- RIGHT IMAGES -->
                <div class="col-lg-6">
                    <div class="feature-images">

                        {{-- IMAGE UP --}}
                        @if (!empty($about->image_up) && file_exists(public_path('backend/Images/AboutImage/' . $about->image_up)))
                            <img src="{{ asset('backend/Images/AboutImage/' . $about->image_up) }}" class="img-main"
                                alt="About Image">
                        @endif

                        {{-- IMAGE BOTTOM --}}
                        @if (!empty($about->image_bottom) && file_exists(public_path('backend/Images/AboutImage/' . $about->image_bottom)))
                            <img src="{{ asset('backend/Images/AboutImage/' . $about->image_bottom) }}" class="img-float"
                                alt="About Image">
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Service Start -->
    <div class="container-xxl py-5 mt-3">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-secondary section-title">
                Our Services
            </h2>
        </div>

        <div class="service-section mb-5">

            <div class="row g-4">
                @foreach ($servicebottom as $t)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                        <div class="service-card-clean w-100">

                            <!-- Image -->
                            <div class="service-img-clean">
                                <img src="{{ asset('/backend/Service/ServiceImage/' . $t->image) }}"
                                    alt="{{ $t->service_name }}">
                            </div>

                            <!-- Content -->
                            <div class="service-body-clean text-center">
                                <span class="service-category">
                                    {{ $t->category->category_name }}
                                </span>

                                <h6 class="service-title">
                                    {{ $t->service_name }}
                                </h6>

                                {{-- <p class="service-text">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($t->short_details ?? ''), 80) }}
                                        </p> --}}

                                <a href="{{ url('service_detail/' . $t->id) }}" class="btn btn-service-clean"
                                    style="color: #fff;">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Service End -->

    <!-- How to Book Start -->
    <div class="container-xxl py-5">
        <div class="text-center mb-5">
            <span class="section-tag">Process</span>
            <h2 class="section-title">How To Book Our Services?</h2>
        </div>

        <div class="how-book-box">
            {!! clean_html($how_to_book->description) !!}
        </div>
    </div>
    <!-- How to Book Start End -->

    <!-- Faq Start -->
    <div class="container-xxl py-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mb-5 mt-5" style="text-transform: uppercase;"> FREQUENTLY ASKED QUESTIONS?</h2>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
            <div id="FAQ">
                <div class="accordian">
                    <div class="row">
                        @if ($home_faq)
                            @foreach ($home_faq as $hf)
                                <div class="col-md-6 col-12">
                                    <div class="item">
                                        <div class="FAQ-title">
                                            <p class="faqQuestion">{{ $hf->questions }}</p>
                                            <span class="expandToggle">+</span>
                                        </div>
                                        <div class="FAQ-content">
                                            <p>{!! $hf->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="FAQ-ShowMore">
                        <button id="showMoreBtn">Show More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->



    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="blog-main-title">Latest Cleaning Tips & News</h2>
            </div>

            @if ($blog && count($blog) > 0)
                <!-- Featured Blog -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-6">
                        <div class="featured-blog-img">
                            <img src="{{ asset('backend/Blogs/BlogsImage/' . $blog[0]->image) }}"
                                alt="{{ $blog[0]->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="featured-blog-content">
                            <h3>{{ $blog[0]->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog[0]->description ?? ''), 120) }}</p>
                            <a href="{{ url('/blog_details/' . $blog[0]->id) }}" class="btn-read">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Small Blogs -->
                <div class="row g-4">
                    @foreach ($blog->skip(1)->take(3) as $d)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-card-v3">
                                <img src="{{ asset('backend/Blogs/BlogsImage/' . $d->image) }}"
                                    alt="{{ $d->title }}">
                                <div class="blog-body">
                                    <h5>{{ $d->title }}</h5>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($d->description ?? ''), 80) }}</p>
                                    <a href="{{ url('/blog_details/' . $d->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">No blog posts found.</p>
                </div>
            @endif
        </div>
    </div>
    <!-- Blog End -->

    <!-- Main Content End -->
   <script>
document.querySelectorAll(".services-row").forEach(row => {

    let speed = 1;
    let autoSlide = null;

    /* duplicate items */
    const items = row.innerHTML;
    row.innerHTML += items;

    function startSlide(){
        if(autoSlide) return; // already running

        autoSlide = setInterval(()=>{
            row.scrollLeft += speed;

            if(row.scrollLeft >= row.scrollWidth / 2){
                row.scrollLeft = 0;
            }

        },20);
    }

    function stopSlide(){
        clearInterval(autoSlide);
        autoSlide = null;
    }

    startSlide();

    /* hover pause */
    row.addEventListener("mouseenter", stopSlide);
    row.addEventListener("mouseleave", startSlide);


    /* mouse drag */
    let isDown = false;
    let startX;
    let scrollLeft;

    row.addEventListener("mousedown", e => {
        isDown = true;
        startX = e.pageX - row.offsetLeft;
        scrollLeft = row.scrollLeft;
        stopSlide();
    });

    row.addEventListener("mousemove", e => {
        if(!isDown) return;
        e.preventDefault();

        const x = e.pageX - row.offsetLeft;
        const walk = (x - startX) * 1.5;

        row.scrollLeft = scrollLeft - walk;
    });

    row.addEventListener("mouseup", ()=>{
        isDown = false;
        startSlide();
    });

    row.addEventListener("mouseleave", ()=>{
        if(isDown){
            isDown = false;
            startSlide();
        }
    });

});
</script>
    <script>
        document.querySelectorAll('.FAQ-title').forEach(item => {
            item.addEventListener('click', () => {
                const parent = item.closest('.item');
                parent.classList.toggle('active');

                const content = parent.querySelector('.FAQ-content');
                content.style.display =
                    content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const reveals = document.querySelectorAll(".reveal-left, .reveal-right");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("reveal-active");
                        observer.unobserve(entry.target); // একবারই animation হবে
                    }
                });
            }, {
                threshold: 0.2
            });

            reveals.forEach(el => observer.observe(el));
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const cards = document.querySelectorAll(".service-card-clean");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {

                        const index = Array.from(cards).indexOf(entry.target);

                        setTimeout(() => {
                            entry.target.classList.add("show");
                        }, index * 120); // delay gap

                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15
            });

            cards.forEach(card => observer.observe(card));

        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const carousel = document.querySelector("#header-carousel");

            function animateSlide(slide) {
                const content = slide.querySelector(".slider-caption-content");
                if (!content) return;

                content.classList.remove("animate"); // reset
                void content.offsetWidth; // reflow trick
                content.classList.add("animate"); // trigger animation
            }

            // animate first slide on load
            const firstActive = carousel.querySelector(".carousel-item.active");
            if (firstActive) animateSlide(firstActive);

            // animate on slide change
            carousel.addEventListener("slid.bs.carousel", function(e) {
                animateSlide(e.relatedTarget);
            });

        });
    </script>
@endsection
