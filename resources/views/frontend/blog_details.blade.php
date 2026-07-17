@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->

        @include('frontend.layouts.navbar')

    <!-- Navbar End -->
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('') }}assets/img/banner.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 mb-3 animated slideInDown">Blog Details</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .article-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 30px auto;
        }
        .article-container img {
            width: 100%;
            height: auto;
        }
        .article-title {
            font-weight: bold;
            font-size: 1.75rem;
        }
        .article-meta {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 15px;
        }
        .article-content p {
            line-height: 1.8;
        }
        blockquote {
            font-style: italic;
            border-left: 4px solid #007bff;
            padding-left: 15px;
            color: #555;
            margin: 20px 0;
        }
    </style>

    <!-- Blog Details Start -->
    <div class="container">
        <div class="article-container">
            <p class="blog-meta">
                by Super Admin | 
                @php
                $datetime = "$data->created_at";
                $date = date("Y-m-d", strtotime($datetime));
                echo $date;
                @endphp | Blogs | 0 comments
            </p>
            <h1 class="article-title mt-3">{{$data->title}}</h1>
            <img src="{{ asset('backend/Blogs/BlogsImage') }}/{{ $data->image }}" class="img-fluid rounded" alt="Article Image">
            <p>{!! $data->description !!}</p>
        </div>
    </div>
    <!-- Blog Details End -->

    <!-- Main Content End -->
@endsection