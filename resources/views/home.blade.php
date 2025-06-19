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
@endsection
@section('js')

@endsection
@section('content')
 <!--Main Slider Start-->
 <section class="main-slider-three">
   <div class="main-slider-three__carousel thm-owl__carousel owl-carousel" data-owl-options='{
       "loop": true,
       "animateOut": "fadeOut",
       "animateIn": "fadeIn",
       "items": 1,
       "autoplay": true,
       "autoplayTimeout": 7000,
       "smartSpeed": 1000,
       "nav": true,
       "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
       "dots": false,
       "margin": 0
       }'>
       @foreach ($banner as $item)
       <div class="item">
         <div class="image-layer-three"
             style="background-image: url({{$item->image}});"></div>
         <!-- /.image-layer -->
         <div class="container">
             <div class="row">
                 <div class="col-xl-12">
                     <div class="main-slider-three__content" style="height: 200px !important;">
                         <p class="main-slider-three__sub-title" style="color: white"></p>
                         <h2 class="main-slider-three__title">{!!$item->title!!}</h2>
                         <p class="main-slider-des">{{$item->description}}</p>
                         <div class="main-slider-three__btn-box">
                             <a href="tel:{{$setting->phone1}}" class="main-slider-three__btn thm-btn">Liên hệ</a>
                         </div>
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

<!--Project One Start-->
{{-- <section class="project-one">
   <div class="container">
      <div class="section-title text-center">
         <span class="section-title__tagline">Dự Án</span>
         <h2 class="section-title__title">Công Trình Triển Khai</h2>
         <div class="section-title__line"></div>
      </div>
      <div class="project-one__inner">
         <div class="project-one__main-content">
            <div class="swiper-container" id="project-one__carousel">
               <div class="swiper-wrapper">
                  @foreach ($duan as $item)
                  @php
                      $imgduan = json_decode($item->images);
                  @endphp
                      <!-- /.swiper-slide -->
                  <div class="swiper-slide">
                     <div class="row">
                        <div class="col-xl-6 col-lg-6">
                           <div class="project-one__left">
                              <div class="project-one__img">
                                 <img src="{{$imgduan[0]}}" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <div class="project-one__right">
                              <div class="project-one__content-box">
                                 <div class="project-one-shape-1 float-bob-y">
                                    <img src="{{url('frontend/images/project-one-shape-1.png')}}" alt="">
                                 </div>
                                 <div class="project-one__content">
                                    <h4 class="project-one__title">{{$item->name}}</h4>
                                    <div class="project-one__text line_3">{{languageName($item->description)}}</div>
                                    <a href="{{route('duanTieuBieuDetail',['slug'=>$item->slug])}}"
                                       class="thm-btn project-one__btn">Chi Tiết Dự Án</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="project-one__thumb-box">
            <div class="swiper-container" id="project-one__thumb">
               <div class="swiper-wrapper">
                  @foreach ($duan as $item)
                  @php
                      $subimgduan = json_decode($item->images);
                  @endphp
                      <div class="swiper-slide">
                        <div class="project-one__img-holder">
                           <img src="{{$subimgduan[0]}}" alt="">
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
            <div class="project-one__nav">
               <div class="swiper-button-prev" id="project-one__swiper-button-next">
                  <i class="fa fa-angle-right angle-left"></i>
               </div>
               <div class="swiper-button-next" id="project-one__swiper-button-prev">
                  <i class="fa fa-angle-right"></i>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div class="project-one__more-project">
               <div class="project-one__more-project-content">
                  <p class="mb-0">Chúng tôi có tới hơn 300 dự án đã hoàn thành <a href="{{route('duanTieuBieu')}}">Xem Thêm Dự Án</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<!--Project One End-->


<!--Testimonial One Start-->
{{-- <section class="testimonial-one">
   <div class="testimonial-one-bg-box">
      <div class="testimonial-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
         style="background-image: url({{url('frontend/images/testimonial-one-bg.jpg')}});"></div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-xl-3">
            <div class="testimonial-one__left">
               <div class="section-title text-left">
                  <span class="section-title__tagline">testimonials</span>
                  <h2 class="section-title__title">Khách hàng nói gì về CNC VINTECH</h2>
                  <div class="section-title__line"></div>
               </div>
               <p class="testimonial-one__text">Chúng tôi luôn muốn nhận những đánh giá chân thành từ khách hàng
               </p>
            </div>
         </div>
         <div class="col-xl-9">
            <div class="testimonial-one__right">
               <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"
                  data-owl-options='{
                  "loop": true,
                  "autoplay": false,
                  "margin": 30,
                  "nav": false,
                  "dots": true,
                  "smartSpeed": 500,
                  "autoplayTimeout": 10000,
                  "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                  "responsive": {
                  "0": {
                  "items": 1
                  },
                  "768": {
                  "items": 1
                  },
                  "992": {
                  "items": 2
                  },
                  "1200": {
                  "items": 2.25545
                  }
                  }
                  }'>
                  @foreach ($ReviewCus as $item)
                       <!--Testimonial One Single-->
                  <div class="testimonial-one__single">
                     <div class="testimonial-one__quote">
                        <span class="icon-quotation"></span>
                     </div>
                     <div class="testimonial-one__text-2">{!!languageName($item->content)!!}
                     </div>
                     <div class="testimonial-one__client-info">
                        <div class="testimonial-one__img">
                           <img style="width:35px !important;" src="{{$item->avatar}}" alt="">
                        </div>
                        <div class="testimonial-one__client-content">
                           <h4 class="testimonial-one__client-name">{{languageName($item->name)}}</h4>
                           <p class="testimonial-one__client-title">{{languageName($item->position)}}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
                 
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<!--Testimonial One End-->
<!--About One Start-->
{{-- <section class="about-one">
   <div class="about-one-shape-2 float-bob-x"></div>
   <div class="about-one-wall">
      <img src="{{url('frontend/images/about-one-wall.png')}}" alt="">
   </div>
   <div class="container">
      <div class="row">
         <div class="col-xl-6" style="margin: auto;">
            <div class="about-one__left">
               <div class="section-title text-left">
                  <span class="section-title__tagline">Về Chúng Tôi</span>
                  <h2 class="section-title__title">Thiết Bị Chiếu Sáng ACES</h2>
                  <div class="section-title__line"></div>
               </div>
               <div class="about-one__text-2 line_7">{!!$gioithieu->content!!}</div>
               <div class="about-one__contact-us">
                  <div class="about-one__btn-box">
                     <a href="{{route('aboutUs')}}" class="thm-btn about-one__btn">Xem Thêm</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-6">
            <div class="about-one__right">
               <div class="about-one__img-box wow slideInRight" data-wow-delay="100ms"
                  data-wow-duration="2500ms">
                  <div class="about-one__img">
                     <img src="{{json_decode($gioithieu->image)[0]}}" alt="">
                  </div>
                  <div class="about-one__small-img">
                     <img src="{{url('frontend/images/about-one-small-img.jpg')}}" alt="">
                  </div>
                  <div class="about-one__project">
                     <div class="about-one__project-icon">
                        <span class="icon-wallpaper-1"></span>
                     </div>
                     <div class="about-one__project-content">
                        <h3 class="odometer" data-count="300">00</h3>
                        <p class="about-one__project-text">Dự Án Thành Công</p>
                     </div>
                  </div>
                  <div class="about-one__shape-1 float-bob-y"></div>
                  <div class="about-one__dot">
                     <img src="{{url('frontend/images/about-one-dots.png')}}" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<!--About One End-->
<!--Brand One Start-->
{{-- <section class="brand-one">
   <div class="container">
      <div class="brand-one__inner">
         <div class="row">
            <div class="col-xl-3">
               <div class="brand-one__title">
                  <h2 class="section-title__title">Đối tác tiêu biểu</h2>
               </div>
            </div>
            <div class="col-xl-9">
               <div class="brand-one__main-content">
                  <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                     "0": {
                     "spaceBetween": 30,
                     "slidesPerView": 2
                     },
                     "375": {
                     "spaceBetween": 30,
                     "slidesPerView": 2
                     },
                     "575": {
                     "spaceBetween": 30,
                     "slidesPerView": 3
                     },
                     "767": {
                     "spaceBetween": 50,
                     "slidesPerView": 4
                     },
                     "991": {
                     "spaceBetween": 50,
                     "slidesPerView": 5
                     },
                     "1199": {
                     "spaceBetween": 100,
                     "slidesPerView": 5
                     }
                     }}'>
                     <div class="swiper-wrapper">
                        @foreach ($Partner as $item)
                        <div class="swiper-slide">
                           <img src="{{$item->image}}" alt="">
                        </div>
                        @endforeach
                        
                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}
<!--Brand One End-->
<!--Blog One Start-->
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
@endsection