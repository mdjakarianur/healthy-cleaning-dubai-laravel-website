@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

    @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <div class="service-container mt-5">
        @php
            $hasText = !empty($data->service_name) || !empty($data->short_details);
            $hasImage = !empty($data->banner);
        @endphp

        <div class="cleaning-service-section">
            <div class="row align-items-center justify-content-center">

                {{-- Text --}}
                @if ($hasText)
                    <div
                        class="
                col-md-5
                {{ !$hasImage ? 'text-center mx-auto' : '' }}
                order-2 order-md-1
            ">
                        <div class="cleaning-service-text">
                            <h2>{{ $data->service_name ?? '' }}</h2>
                            <h5>{{ $data->sub_title ?? '' }}</h5>
                            <span>{!! $data->short_details ?? '' !!}</span>

                            <div class="cleaning-button-group">
                                <a href="https://wa.me/{{ $company->sales_phone }}" class="btn btn-cleaning">
                                    <b><i class="bi bi-whatsapp"></i> BOOK NOW</b>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Image --}}
                @if ($hasImage)
                    <div
                        class="
                col-md-7
                {{ !$hasText ? 'text-center mx-auto' : '' }}
                order-1 order-md-2
            ">
                        <div class="cleaning-service-image">
                            <img src="{{ asset('backend/Service/Banner/' . $data->banner) }}"
                                class="img-fluid mx-auto d-block" alt="">
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <ul class="nav nav-tabs service-tabs d-flex justify-content-center" id="serviceTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link service-tab-link active" id="service1-tab" data-bs-toggle="tab"
                    data-bs-target="#service1" type="button" role="tab">Description</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link service-tab-link" id="service2-tab" data-bs-toggle="tab" data-bs-target="#service2"
                    type="button" role="tab">Reviews</button>
            </li> --}}
        </ul>
        <div class="tab-content service-content mt-3" id="serviceTabContent">
            <div class="tab-pane fade show active" id="service1" role="tabpanel">
                <!-- Service Details Start -->

                <div class="container-xxl service py-5">
                    <div class="row">
                        <div class="col-md-12 service-details" style="overflow: hidden;text-align: justify;">
                            <p>{!! $data->description !!}</p>
                        </div>
                        {{-- <div class="col-md-5">
                                <div class="booking-form">
                                    <h2 class="text-center mb-4">Booking Form</h2>
                                    <form action="{{url('BookService')}}/{{$data->id}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Booking Date</label>
                                            <input type="date" class="form-control" name="booking_date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="3" name="address" placeholder="Full address"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Any Notes</label>
                                            <textarea class="form-control" rows="3" name="notes" placeholder="Additional requests"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Book Now</button>
                                    </form>
                                </div>
                            </div> --}}
                    </div>
                </div>


                <!-- Service Details End -->
            </div>
            <div class="tab-pane fade" id="service2" role="tabpanel">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="review">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <h2 class="mb-1">View Reviews</h2>
                                        {{-- <p class="text-muted">8 reviews</p> --}}
                                    </div>
                                </div>

                                <!-- Reviews -->
                                @if ($review)
                                    @foreach ($review as $r)
                                        <div class="review-card d-flex align-items-start">
                                            <div class="profile-icon profile-K me-3">
                                                {{ strtoupper(substr($r->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6>{{ $r->name }}</h6>
                                                <p class="mb-1">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $r->rating)
                                                            <i class="fa-solid fa-star" style="color: #ffbc00;"></i>
                                                        @else
                                                            <i class="fa-regular fa-star" style="color: #ffbc00;"></i>
                                                        @endif
                                                    @endfor
                                                    <span
                                                        class="text-muted">{{ \Carbon\Carbon::parse($r->created_at)->diffForHumans() }}</span>
                                                </p>
                                                <p>{!! $r->review !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="review-container">
                                <h2 class="review-title">Write a Review</h2>

                                <form action="{{ url('sendReview') }}/{{ $data->id }}" method="POST" id="review-data">
                                    @csrf

                                    <div class="mt-3">
                                        <input class="form-control" name="name" id="name"
                                            placeholder="Write your name" type="text" required>
                                    </div>

                                    <div class="mt-3">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Enter your email" required>
                                    </div>

                                    <div class="mt-3">
                                        <input type="tel" class="form-control" name="phone"
                                            placeholder="Enter your phone number" required>
                                    </div>

                                    <div class="mt-3">
                                        <textarea class="form-control" rows="3" name="address" placeholder="Full address"></textarea>
                                    </div>

                                    <div class="mt-3">
                                        <textarea class="form-control review-textarea" name="review" placeholder="Write your review here..." required></textarea>
                                    </div>

                                    <!-- ⭐ Star Rating -->
                                    <div class="mt-3 text-center">
                                        <label class="form-label d-block mb-2">Give us a star rating!</label>
                                        <div class="star-rating" style="font-size: 28px; color: #ffbc00;">
                                            <i class="fa-regular fa-star star" data-value="1"></i>
                                            <i class="fa-regular fa-star star" data-value="2"></i>
                                            <i class="fa-regular fa-star star" data-value="3"></i>
                                            <i class="fa-regular fa-star star" data-value="4"></i>
                                            <i class="fa-regular fa-star star" data-value="5"></i>
                                        </div>
                                        <input type="hidden" name="rating" id="rating" value="" required>
                                    </div>

                                    <div class="form-group col-lg-12 text-center pt-3">
                                        <button type="submit" class="btn btn-success"
                                            style="border-radius: 50px; color: #fff; background: #00C853;">
                                            Send Review
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- How to Book Start -->
    <div class="container-xxl">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mb-5 mt-5" style="text-transform: uppercase;"> HOW TO BOOK OUR SERVICES?</h2>
        </div>
        <div>
            {!! clean_html($how_to_book->description) !!}
        </div>
    </div>
    <!-- How to Book Start End -->

    <!-- Faq Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-5 mt-5" style="text-transform: uppercase;"> FREQUENTLY ASKED QUESTIONS?</h2>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div id="FAQ">
                    <div class="accordian">
                        <div class="row">
                            @if ($queans)
                                @foreach ($queans as $qa)
                                    <div class="col-md-6 col-12">
                                        <div class="item">
                                            <div class="FAQ-title">
                                                <p class="faqQuestion">{{ $qa->questions }}</p>
                                                <span class="expandToggle">+</span>
                                            </div>
                                            <div class="FAQ-content">
                                                <p>{!! $qa->answer !!}</p>
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
    </div>
    <!-- Testimonial End -->

    <!-- Main Content End -->
    <!-- ✅ Font Awesome CDN (Place in <head> or before closing </body>) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- ✅ Star Rating Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating; // Set the rating value to the hidden input field

                    // Update the stars' classes to reflect the selected rating
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= rating) {
                            star.classList.add('fa-solid');
                            star.classList.remove('fa-regular');
                        } else {
                            star.classList.add('fa-regular');
                            star.classList.remove('fa-solid');
                        }
                    });
                });
            });

            // Optional: You can also add custom form validation if needed before submitting
            document.querySelector('form').addEventListener('submit', function(event) {
                if (!ratingInput.value) {
                    event.preventDefault(); // Prevent form submission
                    alert('Please give a star rating before submitting.');
                }
            });
        });
    </script>
@endsection
