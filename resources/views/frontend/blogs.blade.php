@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0" style="background-image: url(assets/img/banner.png);">
        <div class="container-fluid page-header-inner p-3">
            <div class="container text-center">
                <h1 class="display-3 text-dark mb-3 animated slideInDown">Tips & News</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @if($data)
                        @foreach($data as $d)
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card blog-card">
                                <img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $d->image }}" alt="Blog Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{$d->title}}</h5>
                                    <p class="card-text text-muted">
                                        @php
                                        $datetime = "$d->created_at";
                                        $date = date("Y-m-d", strtotime($datetime));

                                        echo $date;
                                        @endphp
                                    </p>
                                    <a href="{{url('/blog_details')}}/{{$d->id}}" class="btn btn-primary mt-auto">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Main Content End -->
@endsection
