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
                <h1>Our Mission and Vision</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Mission and Vision</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Mission Vision Section -->
    <section class="services-section">
        <div class="auto-container">
            <div class="row">
                @if($mision_vision)
                @foreach($mision_vision as $mv)
                <!-- Service Block -->
                <div class="service-block col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <img src="{{ asset('backend/img/mission_vision/')}}/{{ $mv->image }}" alt=""><br><br>
                        <h5><a href="#">{{$mv->title}}</a></h5>
                        <div class="texts">{!! $mv->description !!}</div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--End Mission Vision Section -->


    <!-- Main Content End -->
@endsection