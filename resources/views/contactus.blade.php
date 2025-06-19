@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
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
				<li><a href="{{route('home')}}">Home</a></li>
				<li><span>/</span></li>
				<li>Liên Hệ</li>
			</ul>
			<h2>Liên Hệ</h2>
		</div>
	</div>
</section>
<section class="contact-page">
	<div class="contact-page-shape-1 float-bob-x">
		<img src="{{url('frontend/images/contact-page-shape-1.png')}}" alt="">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7">
				<div class="contact-page__left">
					<div class="section-title text-left">
						<span class="section-title__tagline">Liên hệ</span>
						<h2 class="section-title__title">Gửi Thông Tin Cho Chúng Tôi</h2>
						<div class="section-title__line"></div>
					</div>
					<div class="contact-page__form">
						<form action="{{route('postcontact')}}" method="post" class="comment-one__form contact-form-validated">
							@csrf
							<div class="row">
								<div class="col-xl-6">
									<div class="comment-form__input-box">
										<input type="text" placeholder="Họ Tên" required name="name">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="comment-form__input-box">
										<input type="email" placeholder="Email address" name="email" required>
									</div>
								</div>
								<div class="col-xl-12">
									<div class="comment-form__input-box">
										<input type="text" placeholder="Số điện thoại" name="Phone">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="comment-form__input-box text-message-box">
										<textarea name="mess" placeholder="Lời nhắn"></textarea>
									</div>
									<div class="comment-form__btn-box">
										<button type="submit" class="thm-btn comment-form__btn">Gửi Liên Hệ</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xl-5 col-lg-5">
				<div class="contact-page__right">
					<div class="contact-page__details">
						<ul class="list-unstyled contact-page__details-list">
							<li>
								<span>Hotline</span>
								<p><a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a></p>
							</li>
							<li>
								<span>Email</span>
								<p><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
							</li>
							<li>
								<span>Địa chỉ</span>
								<p>{{$setting->address1}}</p>
							</li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{!!$setting->iframe_map!!}
@endsection