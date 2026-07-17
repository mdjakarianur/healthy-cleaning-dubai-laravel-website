<style>
    /* Service list smooth animation */
    .service-list {
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transform: translateY(-6px);
        transition: max-height 0.45s ease,
            opacity 0.35s ease,
            transform 0.35s ease;
    }

    /* Open state */
    .service-list.open {
        max-height: 500px;
        /* enough for services */
        opacity: 1;
        transform: translateY(0);
    }

    /* Arrow animation */
    .category-toggle i {
        transition: transform 0.35s ease;
    }

    .category-toggle.active i {
        transform: rotate(180deg);
    }

    /* subtle hover (no bg) */
    .category-toggle:hover {
        opacity: 0.9;
    }
</style>
<!-- WhatsApp Button -->
<a href="https://wa.me/{{ $company->sales_phone }}" target="_blank" class="whatsapp-btn">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Call Button -->
<div class="call-wrapper">
    <div class="call-badge">Call Us Now!</div>
    <a href="tel:+{{ $company->phone }}" class="call-button">
        {{ $company->phone }}
    </a>
</div>

<footer class="footer pt-5 pb-3 text-light" style="background:#0f1a24;">
    <div class="container">
        <div class="row gy-4">

            <!-- LEFT INFO -->
            <div class="col-lg-4 col-md-6">

                <!-- Logo -->
                <div class="mb-3">
                    @php
                        $pathlogo = public_path() . '/backend/CompanyProfile/CompanyProfileLogo/' . $company->logo;
                    @endphp
                    @if (file_exists($pathlogo))
                        <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo/' . $company->logo) }}"
                            style="max-width:140px">
                    @endif
                </div>

                <!-- Address -->
                <p class="small mb-2">
                    <i class="bi bi-geo-alt me-2"></i>{{ $company->address }}
                </p>

                <!-- Phone -->
                <p class="mb-2">
                    <span class="badge bg-primary p-2">
                        <i class="bi bi-telephone me-1"></i> {{ $company->phone }}
                    </span>
                </p>

                <!-- Email -->
                <p class="small mb-3">
                    <i class="bi bi-envelope me-2"></i>{{ $company->email }}
                </p>

                <a href="{{ url('privacypolicy') }}" class="small text-light text-decoration-none">
                    <i class="bi bi-shield-lock me-1"></i> Privacy Policy
                </a>

                <!-- Working Hours -->
                <div class="mt-4">
                    <h6 class="fw-bold" style="color: #53c2dd !important;">Working Hours</h6>
                    <small>Saturday - Friday:</small><br>
                    <small>8:00 AM to 10:00 PM</small>
                </div>

                <!-- Social -->
                <div class="mt-3 d-flex gap-2">
                    <a href="{{ $company->facebook }}" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $company->youtube }}" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="{{ $company->instagram }}" class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- SERVICES COLUMN -->
            @if ($categories && $categories->count())
                @foreach ($categories->take(4) as $c)
                    <div class="col-lg-2 col-md-6 footer-category" style="background: transparent;">

                        <!-- Category Title (Clickable) -->
                        <h6 class="fw-bold mb-3 category-toggle" style="color:#53c2dd !important; cursor:pointer;">
                            {{ $c->category_name }}
                            <i class="bi bi-chevron-down float-end"></i>
                        </h6>

                        <ul class="list-unstyled small footer-links service-list" style="background: transparent;">
                            @forelse ($c->services as $service)
                                <li>
                                    <a href="{{ url('service_detail/' . $service->id) }}" style="font-size: 14px;">
                                        › {{ $service->service_name }}
                                    </a>
                                </li>
                            @empty
                                <li class="text-muted">No Services</li>
                            @endforelse
                        </ul>

                    </div>
                @endforeach
            @endif

        </div>

        <!-- bottom bar -->
        <hr class="border-secondary mt-4">

        <div class="d-flex flex-column flex-md-row justify-content-between small">
            <div>
                © {{ date('Y') }} Healthy Cleaning Dubai, All Right Reserved
            </div>
            <div>
                Designed & Developed by <a href="#">ASTHA</a>
            </div>
        </div>
    </div>


    <!-- client caroursel -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 500,
                responsive: {
                    0: {
                        items: 1
                    },
                    /* 1 item for mobile */
                    600: {
                        items: 2
                    },
                    /* 2 items for tablets */
                    1000: {
                        items: 3
                    } /* 3 items for desktops */
                }
            });
        });

        // Testimonial Progress Indicator
        document.addEventListener('DOMContentLoaded', function() {
            var testimonialSlider = $("#testimonial-slider");
            var progressSegments = $(".progress-segment");

            // Initialize the Owl Carousel with additional options
            testimonialSlider.on('initialized.owl.carousel', function(event) {
                var currentIndex = event.item.index - event.relatedTarget._clones.length / 2;
                updateProgressSegments(currentIndex);
            });

            testimonialSlider.on('translated.owl.carousel', function(event) {
                var currentIndex = event.item.index - event.relatedTarget._clones.length / 2;
                updateProgressSegments(currentIndex);
            });

            function updateProgressSegments(currentIndex) {
                // Reset all segments
                progressSegments.removeClass('active');

                // Set the current segment as active
                $(progressSegments[currentIndex]).addClass('active');
            }
        });
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/lib/wow/wow.min.js"></script>
    <script src="{{ asset('') }}assets/lib/easing/easing.min.js"></script>
    <script src="{{ asset('') }}assets/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('') }}assets/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('') }}assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('') }}assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('') }}assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('') }}assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('') }}assets/js/main.js"></script>

    <script>
        $(window).on('load', function() {
            $('#exampleModalCenter').modal('show');

            $(".close").click(function() {
                $('#exampleModalCenter').modal('hide');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.category-toggle').on('click', function() {

                let list = $(this).next('.service-list');

                // close others (optional but clean)
                $('.service-list').not(list).removeClass('open');
                $('.category-toggle').not(this).removeClass('active');

                // toggle current
                $(this).toggleClass('active');
                list.toggleClass('open');
            });
        });
    </script>
</footer>
