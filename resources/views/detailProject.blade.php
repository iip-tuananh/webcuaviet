@extends('layouts.main.master')
@section('title')
    {{ $detail->name }}
@endsection
@section('description')
    {{ $detail->description }}
@endsection
@section('image')
    @php
        $img = json_decode($detail->images);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('js')
<script>
$(document).ready(function() {
    var images = @json($img);
    var currentIndex = 0;
    
    // Create lightbox HTML
    if ($('#lightbox').length === 0) {
        $('body').append(`
            <div id="lightbox" class="lightbox">
                <span class="lightbox-close">&times;</span>
                <span class="lightbox-nav lightbox-prev">&#10094;</span>
                <span class="lightbox-nav lightbox-next">&#10095;</span>
                <div class="lightbox-content">
                    <img id="lightbox-img" src="" alt="">
                </div>
                <div class="lightbox-counter">
                    <span id="current-image">1</span> / <span id="total-images">${images.length}</span>
                </div>
            </div>
        `);
    }
    
    // Open lightbox when image is clicked
    $('.project-details .imge').click(function() {
        currentIndex = $(this).closest('.pd-2').index();
        showLightbox(currentIndex);
    });
    
    // Close lightbox
    $('.lightbox-close, .lightbox').click(function(e) {
        if (e.target === this) {
            $('#lightbox').fadeOut(300);
            $('body').removeClass('no-scroll');
        }
    });
    
    // Navigation
    $('.lightbox-prev').click(function(e) {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showLightbox(currentIndex);
    });
    
    $('.lightbox-next').click(function(e) {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % images.length;
        showLightbox(currentIndex);
    });
    
    // Keyboard navigation
    $(document).keydown(function(e) {
        if ($('#lightbox').is(':visible')) {
            switch(e.which) {
                case 37: // Left arrow
                    $('.lightbox-prev').click();
                    break;
                case 39: // Right arrow
                    $('.lightbox-next').click();
                    break;
                case 27: // Escape
                    $('.lightbox-close').click();
                    break;
            }
        }
    });
    
    function showLightbox(index) {
        $('#lightbox-img').attr('src', images[index]);
        $('#current-image').text(index + 1);
        $('#total-images').text(images.length);
        $('#lightbox').fadeIn(300);
        $('body').addClass('no-scroll');
        
        // Preload next and previous images
        if (images[index + 1]) {
            new Image().src = images[index + 1];
        }
        if (images[index - 1]) {
            new Image().src = images[index - 1];
        }
    }
});
</script>
<style>
body.no-scroll {
    overflow: hidden;
}
</style>
@endsection
@section('css')
<style>
.project-details .pd-2 {
    padding: 15px;
}

.project-details .imge {
    padding: 10px;
    background: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.project-details .imge:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}

.project-details .imge:hover::after {
    content: '\f00e';
    font-family: 'FontAwesome';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 30px;
    background: rgba(0,0,0,0.7);
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    opacity: 0;
    animation: fadeInIcon 0.3s ease forwards;
}

@keyframes fadeInIcon {
    to {
        opacity: 1;
    }
}

.project-details .imge img {
    border-radius: 6px;
    transition: transform 0.3s ease;
}

.project-details .imge:hover img {
    transform: scale(1.05);
}

/* Lightbox Styles */
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
    animation: fadeIn 0.3s ease;
}

.lightbox-content {
    position: relative;
    margin: auto;
    padding: 20px;
    width: 90%;
    max-width: 1200px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox img {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
    transition: color 0.3s ease;
}

.lightbox-close:hover {
    color: #ff6b35;
}

.lightbox-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
    background: rgba(0,0,0,0.5);
    padding: 10px 15px;
    border-radius: 50%;
    transition: all 0.3s ease;
    user-select: none;
}

.lightbox-nav:hover {
    background: rgba(255,107,53,0.8);
    color: white;
}

.lightbox-prev {
    left: 30px;
}

.lightbox-next {
    right: 30px;
}

.lightbox-counter {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    background: rgba(0,0,0,0.7);
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 16px;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Responsive */
@media (max-width: 768px) {
    .lightbox-nav {
        font-size: 25px;
        padding: 8px 12px;
    }
    
    .lightbox-prev {
        left: 15px;
    }
    
    .lightbox-next {
        right: 15px;
    }
    
    .lightbox-close {
        font-size: 30px;
        right: 20px;
        top: 15px;
    }
    
    .lightbox-counter {
        bottom: 20px;
        font-size: 14px;
        padding: 8px 15px;
    }
}
</style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ url('frontend/images/page-header-bg.jpg') }})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li><a href="{{ route('home') }}">Dự Án</a></li>
                    <li><span>/</span></li>
                    <li>{{ $detail->name }}</li>
                </ul>
                <h2>{{ $detail->name }}</h2>
            </div>
        </div>
    </section>
    <section class="project-details">
        <div class="container">
            <div class="row">
                @foreach ($img as $index => $item)
                    <div class="col-md-6 pd-2">
                        <div class="imge" data-index="{{ $index }}">
                            <img src="{{ $item }}" alt="Project Image {{ $index + 1 }}"
                                style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
