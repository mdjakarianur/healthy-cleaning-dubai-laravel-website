@extends('frontend.layouts.master')

@section('content')
    <!-- Navbar Start -->
    @include('frontend.layouts.navbar')
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header p-0">
        <div class="container-fluid page-header-inner p-3">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Our Gallery</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        /* Page Header Styles */
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('{{ asset('assets/img/banner.png') }}');
            background-size: cover;
            background-position: center;
            min-height: 300px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #07f5ff, transparent);
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 15px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            color: #07f5ff !important;
            content: "›" !important;
            font-size: 18px;
            line-height: 1;
        }

        .breadcrumb-item a:hover {
            color: #07f5ff !important;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .page-header {
                min-height: 250px;
            }

            .page-header h1 {
                font-size: 36px;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                min-height: 200px;
            }

            .page-header h1 {
                font-size: 28px;
            }

            .breadcrumb {
                font-size: 14px;
            }
        }

        /* Gallery Styles */
        .gallery {
            padding: 60px 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
            background: #fff;
            margin-bottom: 20px;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(7, 245, 255, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.6s ease;
            display: block;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            padding: 15px 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            font-size: 16px;
            font-weight: 600;
            transform: translateY(100%);
            transition: all 0.4s ease;
            z-index: 2;
        }

        .gallery-item:hover p {
            transform: translateY(0);
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(7, 245, 255, 0.2);
            opacity: 0;
            transition: all 0.4s ease;
            z-index: 1;
            pointer-events: none;
        }

        .gallery-item:hover::before {
            opacity: 1;
        }

        /* Lightbox Modal */
        .modal-content {
            background: transparent;
            border: none;
        }

        .modal-img {
            max-width: 90vw;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .btn-close {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #07f5ff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            opacity: 1;
            position: relative;
            z-index: 1060;
            backdrop-filter: blur(5px);
        }

        .btn-close::after {
            content: '×';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #07f5ff;
            font-size: 28px;
            font-weight: bold;
        }

        .btn-close:hover {
            background: #07f5ff;
            transform: rotate(90deg);
            transition: all 0.3s ease;
        }

        .btn-close:hover::after {
            color: #000;
        }

        /* Responsive Gallery */
        @media (max-width: 992px) {
            .gallery-item img {
                height: 220px;
            }

            .gallery-item p {
                padding: 12px 15px;
                font-size: 15px;
            }
        }

        @media (max-width: 768px) {
            .gallery {
                padding: 40px 0;
            }

            .gallery-item img {
                height: 200px;
            }

            .gallery-item p {
                padding: 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .gallery-item img {
                height: 180px;
            }

            .gallery-item p {
                padding: 8px;
                font-size: 13px;
                transform: translateY(0);
                background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.3));
            }
        }

        /* Animation Classes */
        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .slideInDown {
            animation-name: slideInDown;
        }

        @keyframes slideInDown {
            from {
                transform: translate3d(0, -100%, 0);
                visibility: visible;
            }
            to {
                transform: translate3d(0, 0, 0);
            }
        }

        /* Gallery Grid Animation */
        .gallery-item {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation for gallery items */
        .gallery-item:nth-child(1) { animation-delay: 0.1s; }
        .gallery-item:nth-child(2) { animation-delay: 0.2s; }
        .gallery-item:nth-child(3) { animation-delay: 0.3s; }
        .gallery-item:nth-child(4) { animation-delay: 0.4s; }
        .gallery-item:nth-child(5) { animation-delay: 0.5s; }
        .gallery-item:nth-child(6) { animation-delay: 0.6s; }

        /* Loading Skeleton Animation */
        .gallery-loading {
            position: relative;
            overflow: hidden;
        }

        .gallery-loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            100% {
                left: 100%;
            }
        }

        /* No Images Found Message */
        .no-images {
            text-align: center;
            padding: 60px 20px;
            background: #f8f9fa;
            border-radius: 10px;
            margin: 20px 0;
        }

        .no-images i {
            font-size: 60px;
            color: #07f5ff;
            margin-bottom: 20px;
        }

        .no-images h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .no-images p {
            color: #666;
        }
    </style>

    <!-- Our Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container gallery">
            @if($data && count($data) > 0)
                <div class="row g-4">
                    @foreach($data as $index => $d)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="gallery-item" onclick="openGalleryModal('{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}', '{{ $d->title }}')">
                            <img src="{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}"
                                 alt="{{ $d->title }}"
                                 loading="lazy">
                            <p>{{ $d->title }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="no-images">
                    <i class="bi bi-images"></i>
                    <h3>No Images Found</h3>
                    <p>Gallery images will be updated soon.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0">
                <div class="position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                    <!-- Image Container -->
                    <div class="text-center">
                        <img id="modalImage" class="modal-img mx-auto d-block" alt="Gallery Image">
                    </div>

                    <!-- Image Title -->
                    <div id="modalTitle" class="text-center text-white mt-3"></div>

                    <!-- Navigation Buttons -->
                    <button class="carousel-control-prev" type="button" onclick="changeImage(-1)">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" onclick="changeImage(1)">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Store gallery data
        const galleryImages = [
            @if($data)
                @foreach($data as $d)
                {
                    src: "{{ asset('backend/PhotoGallery/PhotoGalleryImage/' . $d->image) }}",
                    title: "{{ $d->title }}"
                },
                @endforeach
            @endif
        ];

        let currentImageIndex = 0;

        // Open modal with specific image
        function openGalleryModal(src, title) {
            // Find the index of the clicked image
            currentImageIndex = galleryImages.findIndex(img => img.src === src);

            // Update modal content
            updateModalContent();

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
            modal.show();
        }

        // Change image (next/previous)
        function changeImage(direction) {
            currentImageIndex += direction;

            // Loop around if at ends
            if (currentImageIndex < 0) {
                currentImageIndex = galleryImages.length - 1;
            } else if (currentImageIndex >= galleryImages.length) {
                currentImageIndex = 0;
            }

            updateModalContent();
        }

        // Update modal image and title
        function updateModalContent() {
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');

            if (galleryImages.length > 0) {
                modalImage.src = galleryImages[currentImageIndex].src;
                modalTitle.innerHTML = `<h5 class="bg-dark bg-opacity-50 d-inline-block px-4 py-2 rounded-pill">${galleryImages[currentImageIndex].title}</h5>`;
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (document.getElementById('galleryModal').classList.contains('show')) {
                if (e.key === 'ArrowLeft') {
                    changeImage(-1);
                } else if (e.key === 'ArrowRight') {
                    changeImage(1);
                } else if (e.key === 'Escape') {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('galleryModal'));
                    modal.hide();
                }
            }
        });

        // Lazy loading for images
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.gallery-item img');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute('src');
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        });
    </script>

    <!-- Add Bootstrap Icons if not already included -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
