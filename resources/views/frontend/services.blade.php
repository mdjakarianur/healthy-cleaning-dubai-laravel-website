@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <style>
        .card {
            border: none;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card img {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            height: 200px;
        }
        .card-body {
            padding: 20px;
        }
        .category {
            color: #D92352;
            font-weight: bold;
        }
        .read-more {
            color: #D92352;
            font-weight: bold;
            text-decoration: none;
        }
        .read-more:hover {
            text-decoration: underline;
        }
        span{
            font-size: 14px;
        }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('') }}frontend/img/carousel-bg-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 mb-3 animated slideInDown">Our Services</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    
    <!-- Service Start -->
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <h3 class="text-primary text-uppercase mb-5">// Services //</h3>
        <div class="row">
            @php
            use Illuminate\Support\Str;
            @endphp
            @if($data)
            @foreach($data as $d)
            <div class="col-md-3">
                <div class="card">
                    <div class="position-relative">
                        <img src="{{ asset('backend/Service/ServiceImage') }}/{{ $d->image }}" class="card-img-top" alt="{{$d->service_name}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$d->service_name}}</h5>
                        <p class="card-text">{!! Str::limit($d->description,200) !!}</p>
                        <a href="{{url('service_detail',$d->id)}}" class="read-more">Read More »</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <!-- Service End -->

    <!-- Main Content End -->
@endsection