<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-59QSZZ33');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- SEO Meta --}}
    <meta name="description" content="@yield('meta_description', $company->meta_description)">
    <meta name="keywords" content="@yield('meta_keywords', $company->meta_tag)">
    <meta name="author" content="https://dubaipureclean.com/">

    {{-- Open Graph Meta --}}
    <meta property="og:title" content="@yield('og_title', $company->meta_title)">
    <meta property="og:description" content="@yield('og_description', $company->meta_description)">
    <meta property="og:image" content="@yield('og_image', asset('backend/CompanyProfile/CompanyProfileIcon/'.$company->icon))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">

    {{-- Twitter Card Meta --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', $company->meta_title)">
    <meta name="twitter:description" content="@yield('og_description', $company->meta_description)">
    <meta name="twitter:image" content="@yield('og_image', asset('backend/CompanyProfile/CompanyProfileIcon/'.$company->icon))">

    {{-- Page Title --}}
    <title>{{$company->company_name}}</title>

    <!-- Favicon -->

    @php
    $pathicon = public_path().'/backend/CompanyProfile/CompanyProfileIcon/'.$company->icon;
    @endphp
    @if(file_exists($pathicon))
    <link href="{{ asset('backend/CompanyProfile/CompanyProfileIcon') }}/{{ $company->icon }}" rel="icon">
    @endif
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('') }}assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('') }}assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap.min.css">
</head>
