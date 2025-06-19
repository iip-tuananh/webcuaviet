@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
{{$setting->company}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="page-header">
	<div class="page-header-bg" style="background-image: url({{url('frontend/images/page-header-bg.jpg')}})">
	</div>
	<div class="container">
		<div class="page-header__inner">
			<ul class="thm-breadcrumb list-unstyled">
				<li><a href="{{route('home')}}">Trang chủ</a></li>
				<li><span>/</span></li>
				<li>{{$title}}</li>
			</ul>
			<h2>{{$title}}</h2>
		</div>
	</div>
</section>
<section class="about-two">
	<div class="container">
		<div class="section-title text-center">
			<span class="section-title__tagline">{{$title}}</span>
			<h2 class="section-title__title">{{$setting->company}}</h2>
			<div class="section-title__line"></div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="about-two__left">
					{!!($gioithieu->content)!!}
				</div>
			</div>
		</div>
	</div>
</section>
<!--Testimonial One Start-->
<section class="testimonial-one">
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
</section>
 <!--Testimonial One End-->
 <section class="brand-one">
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
						 @foreach ($partner as $item)
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
 </section>

@endsection