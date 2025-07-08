@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<style>
.main-slider-three {
    position: relative;
    overflow: hidden;
}

.main-slider-carousel.owl-carousel .owl-stage-outer {
    overflow: visible;
}

.slide-item {
    position: relative;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    min-height: 600px;
    display: flex;
    align-items: center;
}

.slide-bg {
    position: relative;
    width: 100%;
    height: 600px;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    display: flex;
    align-items: center;
}

.slide-bg:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}

.content-box {
    position: relative;
    z-index: 2;
    width: 100%;
}

.content-box .content {
    position: relative;
    max-width: 700px;
}

.content-box .title {
    position: relative;
    color: #ffffff;
    font-size: 48px;
    line-height: 1.2em;
    font-weight: 700;
    margin-bottom: 20px;
}

.content-box .text {
    position: relative;
    color: #ffffff;
    font-size: 18px;
    line-height: 1.6em;
    margin-bottom: 35px;
}

.content-box .btn-box {
    position: relative;
}

.theme-btn {
    position: relative;
    display: inline-block;
    overflow: hidden;
    font-size: 16px;
    color: #ffffff;
    background: #ff6b35;
    padding: 15px 35px;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.theme-btn:hover {
    background: #e55a2b;
    color: #ffffff;
    text-decoration: none;
}

.main-slider-carousel .owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
}

.main-slider-carousel .owl-nav [class*="owl-"] {
    position: absolute;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.3);
    /* border-radius: 50%; */
    font-size: 20px;
    line-height: 56px;
    text-align: center;
    transition: all 0.3s ease;
    margin: 0;
}

.main-slider-carousel .owl-nav .owl-prev {
    left: 50px;
}

.main-slider-carousel .owl-nav .owl-next {
    right: 50px;
}

.main-slider-carousel .owl-nav [class*="owl-"]:hover {
    background: #ff6b35;
    border-color: #ff6b35;
    color: #ffffff;
}

.main-slider-carousel .owl-dots {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
}

.main-slider-carousel .owl-dots .owl-dot {
    display: inline-block;
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    margin: 0 8px;
    transition: all 0.3s ease;
}

.main-slider-carousel .owl-dots .owl-dot.active,
.main-slider-carousel .owl-dots .owl-dot:hover {
    background: #ff6b35;
}

/* Animation Classes */
.animate-1 {
    animation: slideInDown 1s ease-out;
}

.animate-2 {
    animation: slideInUp 1s ease-out 0.3s both;
}

.animate-3 {
    animation: slideInUp 1s ease-out 0.6s both;
}

@keyframes slideInDown {
    from {
        transform: translateY(-100px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes slideInUp {
    from {
        transform: translateY(100px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .slide-bg {
        height: 500px;
    }
    
    .content-box .title {
        font-size: 32px;
    }
    
    .content-box .text {
        font-size: 16px;
    }
    
    .main-slider-carousel .owl-nav [class*="owl-"] {
        width: 50px;
        height: 50px;
        line-height: 46px;
        font-size: 18px;
    }
    
    .main-slider-carousel .owl-nav .owl-prev {
        left: 20px;
    }
    
    .main-slider-carousel .owl-nav .owl-next {
        right: 20px;
    }
}

@media (max-width: 480px) {
    .slide-bg {
        height: 400px;
    }
    
    .content-box .title {
        font-size: 28px;
    }
    
    .theme-btn {
        padding: 12px 25px;
        font-size: 14px;
    }
}

/* Video Projects Section */
.video-projects-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.video-projects-carousel .owl-stage-outer {
    padding: 20px 0;
}

.video-project-item {
    padding: 0 15px;
}

.video-project-link {
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform 0.3s ease;
}

.video-project-link:hover {
    text-decoration: none;
    color: inherit;
    transform: translateY(-5px);
}

.video-project-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.video-project-card:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.video-thumbnail {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.video-project-card:hover .video-thumbnail img {
    transform: scale(1.05);
}

.play-button-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.video-project-card:hover .play-button-overlay {
    opacity: 1;
}

.play-button {
    width: 80px;
    height: 80px;
    background: rgba(255,107,53,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
    transform: scale(0.8);
    transition: all 0.3s ease;
}

.video-project-card:hover .play-button {
    transform: scale(1);
    background: #ff6b35;
}

.play-button i {
    margin-left: 3px;
}

.video-duration {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.video-info {
    padding: 25px;
}

.video-title {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.video-project-card:hover .video-title {
    color: #ff6b35;
}

.video-description {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.video-projects-carousel .owl-nav {
    margin-top: 30px;
}

.video-projects-carousel .owl-nav [class*="owl-"] {
    width: 50px;
    height: 50px;
    background: white;
    color: #ff6b35;
    border: 2px solid #ff6b35;
    border-radius: 50%;
    font-size: 18px;
    line-height: 46px;
    text-align: center;
    margin: 0 10px;
    transition: all 0.3s ease;
}

.video-projects-carousel .owl-nav [class*="owl-"]:hover {
    background: #ff6b35;
    color: white;
}

.video-projects-carousel .owl-dots {
    margin-top: 30px;
}

.video-projects-carousel .owl-dots .owl-dot {
    width: 12px;
    height: 12px;
    background: #ddd;
    border-radius: 50%;
    margin: 0 8px;
    transition: all 0.3s ease;
}

.video-projects-carousel .owl-dots .owl-dot.active,
.video-projects-carousel .owl-dots .owl-dot:hover {
    background: #ff6b35;
}

/* Responsive for Video Section */
@media (max-width: 768px) {
    .video-projects-section {
        padding: 60px 0;
    }
    
    .video-thumbnail {
        height: 200px;
    }
    
    .video-info {
        padding: 20px;
    }
    
    .video-title {
        font-size: 16px;
    }
    
    .play-button {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }
}

@media (max-width: 480px) {
    .video-thumbnail {
        height: 180px;
    }
    
    .video-info {
        padding: 15px;
    }
    
    .video-title {
        font-size: 15px;
    }
    
    .video-description {
        font-size: 13px;
    }
}

/* Video Modal Styles */
.video-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
    animation: modalFadeIn 0.3s ease;
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.video-modal-content {
    position: relative;
    margin: 2% auto;
    width: 90%;
    max-width: 1000px;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 30px rgba(0,0,0,0.3);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from { 
        transform: translateY(-50px);
        opacity: 0;
    }
    to { 
        transform: translateY(0);
        opacity: 1;
    }
}

.video-modal-close {
    position: absolute;
    top: 15px;
    right: 25px;
    color: #fff;
    font-size: 35px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10001;
    transition: color 0.3s ease;
    background: rgba(0,0,0,0.5);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
}

.video-modal-close:hover {
    color: #ff6b35;
    background: rgba(0,0,0,0.7);
}

.video-modal-header {
    background: #333;
    color: white;
    padding: 20px 25px;
    border-bottom: 3px solid #ff6b35;
}

.video-modal-header h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

.video-modal-body {
    padding: 0;
    background: #000;
}

.video-container {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    background: #000;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* Loading spinner */
.video-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 18px;
}

.video-loading::after {
    content: '';
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 3px solid #fff;
    border-radius: 50%;
    border-top-color: #ff6b35;
    animation: spin 1s ease-in-out infinite;
    margin-left: 10px;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Click effect for video cards */
.video-project-card {
    cursor: pointer;
    position: relative;
}

.video-project-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255,107,53,0.1);
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 15px;
    z-index: 1;
}

.video-project-card:active::before {
    opacity: 1;
}

/* Responsive modal */
@media (max-width: 768px) {
    .video-modal-content {
        width: 95%;
        margin: 5% auto;
    }
    
    .video-modal-header {
        padding: 15px 20px;
    }
    
    .video-modal-header h3 {
        font-size: 20px;
    }
    
    .video-modal-close {
        width: 40px;
        height: 40px;
        font-size: 25px;
        top: 10px;
        right: 15px;
    }
}

@media (max-width: 480px) {
    .video-modal-content {
        width: 98%;
        margin: 2% auto;
    }
    
    .video-modal-header h3 {
        font-size: 18px;
    }
}

/* Prevent body scroll when modal is open */
body.modal-open {
    overflow: hidden;
}
</style>
@endsection
@section('js')
<script>
$(document).ready(function(){
    // Initialize main slider carousel
    $('.main-slider-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,
        dots: true,
        items: 1,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1000,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            768: {
                items: 1,
                nav: true
            }
        }
    });
    
    // Pause autoplay on hover
    $('.main-slider-carousel').on('mouseenter', function() {
        $(this).trigger('stop.owl.autoplay');
    });
    
    $('.main-slider-carousel').on('mouseleave', function() {
        $(this).trigger('play.owl.autoplay', [5000]);
    });
    
    // Initialize video projects carousel
    $('.video-projects-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: true,
        dots: true,
        margin: 30,
        smartSpeed: 600,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            768: {
                items: 2,
                nav: true
            },
            992: {
                items: 3,
                nav: true
            },
            1200: {
                items: 3,
                nav: true
            }
        }
    });
    
    // Pause video carousel autoplay on hover
    $('.video-projects-carousel').on('mouseenter', function() {
        $(this).trigger('stop.owl.autoplay');
    });
    
    $('.video-projects-carousel').on('mouseleave', function() {
        $(this).trigger('play.owl.autoplay', [4000]);
    });
    
    // Video Modal Functionality
    $('.video-project-card').click(function() {
        var videoUrl = $(this).data('video');
        var videoTitle = $(this).data('title');
        
        if (videoUrl) {
            // Convert various video URL formats to embeddable format
            var embedUrl = convertToEmbedUrl(videoUrl);
            
            if (embedUrl) {
                // Set modal content
                $('#video-modal-title').text(videoTitle);
                
                // Show loading state
                $('.video-container').html('<div class="video-loading">Đang tải video...</div>');
                
                // Show modal
                $('#videoModal').fadeIn(300);
                $('body').addClass('modal-open');
                
                // Load video after a short delay to show loading state
                setTimeout(function() {
                    $('.video-container').html('<iframe id="video-iframe" src="' + embedUrl + '" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>');
                }, 500);
            } else {
                alert('Định dạng video không được hỗ trợ');
            }
        }
    });
    
    // Close modal
    $('.video-modal-close, #videoModal').click(function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });
    
    // Close modal with ESC key
    $(document).keydown(function(e) {
        if (e.which === 27 && $('#videoModal').is(':visible')) {
            closeVideoModal();
        }
    });
    
    function closeVideoModal() {
        $('#videoModal').fadeOut(300);
        $('body').removeClass('modal-open');
        // Stop video by removing iframe
        setTimeout(function() {
            $('.video-container').empty();
        }, 300);
    }
    
    function convertToEmbedUrl(url) {
        // YouTube
        if (url.includes('youtube.com/watch')) {
            var videoId = url.split('v=')[1];
            if (videoId) {
                var ampersandPosition = videoId.indexOf('&');
                if (ampersandPosition !== -1) {
                    videoId = videoId.substring(0, ampersandPosition);
                }
                return 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
            }
        }
        
        // YouTube short URL
        if (url.includes('youtu.be/')) {
            var videoId = url.split('youtu.be/')[1];
            if (videoId) {
                var queryPosition = videoId.indexOf('?');
                if (queryPosition !== -1) {
                    videoId = videoId.substring(0, queryPosition);
                }
                return 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
            }
        }
        
        // Vimeo
        if (url.includes('vimeo.com/')) {
            var videoId = url.split('vimeo.com/')[1];
            if (videoId) {
                return 'https://player.vimeo.com/video/' + videoId + '?autoplay=1';
            }
        }
        
        // Facebook
        if (url.includes('facebook.com')) {
            return 'https://www.facebook.com/plugins/video.php?href=' + encodeURIComponent(url) + '&show_text=0&autoplay=1';
        }
        
        // Direct video files
        if (url.match(/\.(mp4|webm|ogg)$/i)) {
            return url;
        }
        
        // If already an embed URL, return as is
        if (url.includes('embed') || url.includes('player')) {
            return url;
        }
        
        return null;
    }
});
</script>
@endsection
@section('content')
 <!--Main Slider Start-->
 <section class="main-slider-three">
   <div class="main-slider-carousel owl-carousel owl-theme">
     @foreach ($banner as $key => $item)
     <div class="slide-item">
       <div class="slide-bg" style="background-image: url({{$item->image}});">
         <div class="auto-container">
           <div class="content-box">
             <div class="content">
               @if(isset($item->title))
               <h1 class="title animate-1">{{$item->title}}</h1>
               @endif
               @if(isset($item->description))
               <div class="text animate-2">{!!$item->description!!}</div>
               @endif
               @if(isset($item->link))
               <div class="btn-box animate-3">
                 <a href="{{$item->link}}" class="theme-btn btn-style-one">
                   <span class="btn-title">Tìm hiểu thêm</span>
                 </a>
               </div>
               @endif
             </div>
           </div>
         </div>
       </div>
     </div>
     @endforeach
   </div>
</section>
<!--Main Slider End-->
 <!--Team One Start-->
 
 <section class="about-one">
   <div class="container">
      <div class="section-title text-center">
         <h2 class="section-title__title">Dự Án Nổi Bật</h2>
         <div class="section-title__line"></div>
      </div>
       <div class="team-one__bottom">
         <div class="testimonial-one__right">
            <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"
               data-owl-options='{
               "loop": false,
               "autoplay": true,
               "margin": 30,
               "nav": true,
               "dots": false,
               "smartSpeed": 500,
               "autoplayTimeout": 3000,
               "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
               "responsive": {
               "0": {
               "items": 1
               },
               "768": {
               "items": 2
               },
               "992": {
               "items": 2
               },
               "1200": {
               "items": 4
               }
               }
               }'>
                @foreach ($duan as $key => $item)
         @php
             $img = json_decode($item->images);
         @endphp
           <div class=" wow fadeInUp animated" data-wow-delay="{{$key}}00ms" style="visibility: visible; animation-delay: {{$key}}00ms; animation-name: fadeInUp;">
               <!--Project Three Single-->
               <div class="project-three__single">
                   <div class="project-three__img-box">
                       <div class="project-three__img">
                           <img src="{{$img[0]}}" alt="">
                           <div class="project-three__arrow">
                               <a href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}"><i class="fa fa-angle-right"></i></a>
                           </div>
                           <div class="project-three__content">
                               <h3 class="project-three__title"><a href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}">{{$item->name}}</a></h3>
                               @if ($item->cateService != null)
                               <p class="project-three__sub-title">{{$item->cateService->name}}</p>
                               @endif
                              
                           </div>
                       </div>
                   </div>
               </div>
           </div>
         @endforeach
              
            </div>
         </div>
       </div>
   </div>
</section>
<!--Team One End-->


<!--Feature One End-->
<!--Services One Start-->
<section class="services-one">
   <div class="services-one-bg-box">
      <div class="services-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
         style="background-image: url({{url('frontend/images/services-one-bg.jpg')}});"></div>
   </div>
   <div class="container">
      <div class="section-title ">
         <span class="section-title__tagline">TẠI SAO ?</span>
         <h2 class="section-title__title">BẠN CHỌN CỬA VIỆT</h2>
         <div>
            <br>
      <div class="row">
         <div class="col-xl-7 col-lg-7">
                     <div class="taisao">{!!($taisao->description)!!}</div>
                     
      </div>
              
   
        
         <div class="col-xl-5 col-lg-5">
            <!--Services One Single-->
            <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
               <div class="services-one__img">
          @php
              $img_taisao = json_decode($taisao->image);
            //   dd($img_taisao);
          @endphp
                  <img src="{{$img_taisao[0]}}" alt="">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12 col-lg-12">
<button class="mirror-effect-button" onclick="window.location.href='{{ route('taisao') }}'">Xem thêm</button>         </div>
      </div>
   </div>
</section>
<!--Services One End-->
@foreach ($categoryhome as $pro)
@if (count($pro->product) > 0)

<section class="about-one ">
   <div class="container">
      <div class="section-title text-center">
         <h2 class="section-title__title">{{languageName($pro->name)}}</h2>
         <div class="section-title__line"></div>
      </div>
       <div class="team-one__bottom">
         <div class="testimonial-one__right">
            <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"
               data-owl-options='{
               "loop": false,
               "autoplay": true,
               "margin": 30,
               "nav": true,
               "dots": false,
               "smartSpeed": 500,
               "autoplayTimeout": 3000,
               "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
               "responsive": {
               "0": {
               "items": 1
               },
               "768": {
               "items": 2
               },
               "992": {
               "items": 3
               },
               "1200": {
               "items": 5
               }
               }
               }'>
               @foreach ($pro->product as $item)
               @php
                   $imgnb = json_decode($item->images);
               @endphp
                 
                @include('layouts.product.item')
                 
               @endforeach
              
            </div>
         </div>
       </div>
   </div>
</section>
@endif
@endforeach
<section class="blog-one video-projects-section">
   <div class="container">
      <div class="section-title text-center">
         <h2 class="section-title__title">VIDEO DỰ ÁN</h2>
         <div class="section-title__line"></div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="video-projects-carousel owl-carousel owl-theme">
          
           @foreach ($video as $item)
               
            <div class="video-project-item">
               <div class="video-project-card" data-video="{{$item->link}}" data-title="{{$item->name}}">
                  <div class="video-thumbnail">
                     <img src="{{$item->image}}" alt="{{$item->name}}">
                     <div class="play-button-overlay">
                        <div class="play-button">
                           <i class="fa fa-play"></i>
                        </div>
                     </div>
                     {{-- <div class="video-duration">05:30</div> --}}
                  </div>
                  <div class="video-info">
                     <h4 class="video-title">{{$item->name}}</h4>
                     {{-- <p class="video-description">Thi công cửa nhôm cao cấp cho biệt thự</p> --}}
                  </div>
               </div>
            </div>
           @endforeach
               <!-- Sample data for demo -->
            
            </div>
         </div>
      </div>
      <div class="row">
         {{-- <div class="col-12 text-center">
            <div class="mirror-effect-button" style="width:auto; margin: 30px auto 0;" onclick="window.location.href='{{ route('videoProjects') ?? '#' }}'">Xem Tất Cả Video</div>
         </div> --}}
      </div>
   </div>
</section>

<section class="blog-one">
   <div class="container">
      <div class="section-title text-center">
         <span class="section-title__tagline">News & Updates</span>
         <h2 class="section-title__title">Tin Tức Và Hoạt Động</h2>
         <div class="section-title__line"></div>
      </div>
      <div class="row">
         @foreach ($hotnews as $item)
         <div class="col-xl-3 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
            <!--Blog One Start-->
            <div class="blog-one__single">
               <div class="blog-one__img">
                  <img src="{{$item->image}}" alt="">
                  <a href="{{route('detailBlog',['slug'=>$item->slug])}}">
                  <span class="blog-one__plus"></span>
                  </a>
               </div>
               <div class="blog-one__content" >
                  <div class="blog-one__date">
                     <p>{{date_format($item->created_at,'d/m/Y')}}</p>
                  </div>
                  {{-- <ul class="list-unstyled blog-one__meta">
                     <li><a href="{{route('detailBlog',['slug'=>$item->slug])}}"><i class="far fa-user-circle"></i> by Admin </a>
                     </li>
                     <li></li>
                     
                  </ul> --}}
                  <h3 class="blog-one__title" style="margin-top: 10px"><a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a>
                  </h3>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="row">
         <div class="tuan-flex">

            <div class="mirror-effect-button" style="width:auto" onclick="window.location.href='{{ route('allListBlog') }}'">Xem Tất Cả</div>
         </div>
      </div>
   </div>
</section>
<!--Blog One End-->

<!-- Video Modal -->
<div id="videoModal" class="video-modal">
   <div class="video-modal-content">
      <span class="video-modal-close">&times;</span>
      <div class="video-modal-header">
         <h3 id="video-modal-title">Video Title</h3>
      </div>
      <div class="video-modal-body">
         <div class="video-container">
            <iframe id="video-iframe" src="" frameborder="0" allowfullscreen></iframe>
         </div>
      </div>
   </div>
</div>

@endsection