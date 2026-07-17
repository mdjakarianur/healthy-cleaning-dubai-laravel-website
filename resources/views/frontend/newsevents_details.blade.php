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
                <h1>News & Events</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>News & Events Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- News Events Details Section -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side / Our Blog-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="service-detail">
                        <div class="images-box">
                            <figure class="image wow fadeIn">
                                <a href="{{ asset('backend/img/newsevents/')}}/{{ $data->image }}" class="lightbox-image" data-fancybox="services">
                                    <img src="{{ asset('backend/img/newsevents/')}}/{{ $data->image }}" alt="" style="height:300px">
                                </a>
                            </figure>
                        </div>

                        <div class="content-box">
                            <div class="title-box">
                                <h3>{{$data->title}}</h3>
                            </div>
                            <p>{{$data->description}}</p>
                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar services-sidebar">
                        @php
                        use App\Models\newsevents;
                        $newsevent = newsevents::where('id','!=',$id)->limit(4)->get();
                        @endphp
                        <!--Brochures Box-->
                        @if($newsevent)
                        @foreach($newsevent as $n)
                        <div class="brochures-box">
                            <div class="inner">
                                <h4><a href="{{url('newsevents_details/'.$n->id)}}">{{$n->title}}</a></h4>
                                <div>
                                    <img src="{{ asset('backend/img/newsevents/')}}/{{ $n->image }}" alt="" style="width: 200px;">
                                </div><br>
                                <div class="text">{{Str::limit($n->description,100)}}</div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End News Events Details Container -->

    <!-- Main Content End -->
@endsection