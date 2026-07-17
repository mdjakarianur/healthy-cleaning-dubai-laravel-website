@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->
    
    <!-- Main Content Start -->

    <!--Page Title-->
    <section class="page-title" style="background-image: url({{ asset('') }}frontend/assets/images/background/bannersingle.jpg);">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Our News & Events</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>News & Events</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- News Events Section -->
    <section class="services-section-two">
        <div class="auto-container">

            <div class="carousel-outer">
                <div class="row">
                    @if($data)
                    @foreach($data as $d)
                    <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{url('newsevents_details/'.$d->id)}}">
                                        <img src="{{ asset('backend/img/newsevents/')}}/{{ $d->image }}" alt="">
                                    </a>
                                </figure>
                                <p class="date" style="background: #1370b5;color: #fff;border-radius: 5px;padding: 2px;width: 87px;font-size: 15px;margin-top: 10px;">{{$d->date}}</p>
                            </div>
                            <div class="lower-content">
                                <div class="title-box">
                                    <span class="icon flaticon-heart-2"></span>
                                    <h4><a href="{{url('newsevents_details/'.$d->id)}}">{{$d->title}}</a></h4> 
                                </div>
                                <div class="text">{{Str::limit($d->description,100)}}</div>
                                <span class="icon-right flaticon-heart-2"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    NO DATA AVAILABLE
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End News Events Section -->

    <!-- Main Content End -->
@endsection