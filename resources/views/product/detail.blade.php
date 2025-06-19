@extends('layouts.main.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ languageName($product->description) }}
@endsection
@section('image')
    @php
        $img = json_decode($product->images);
        $ungdung = json_decode($product->preserve);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('css')
    <style>
        section.product-description table {
            border: none;
        }

        section.product-description table tbody tr {
            border-bottom: 1px solid #0000007d;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    margin: 5,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ url('frontend/images/page-header-bg.jpg') }})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li>Sản Phẩm</li>
                    <li><span>/</span></li>
                    <li>{{ $product->name }}</li>
                </ul>
                <h2>{{ $product->name }}</h2>
            </div>
        </div>
    </section>
    <section class="product-details">
        <div class="container">
            <div class="row product-tuan">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__img">
                        <div class="sx-box sx-product-gallery on-show-slider">

                            <div id="sync1" class="owl-carousel owl-theme owl-btn-vertical-center m-b5">
                                @foreach ($img as $item)
                                    <div class="item">
                                        <div class="mfp-gallery">
                                            <div class="sx-box">
                                                <div class="sx-thum-bx sx-img-overlay1 popup-gallery tuannimg">
                                                    <a href="{{ $item }}"><img class="imgbig"
                                                            src="{{ $item }}" alt=""></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> <br>
                            {{-- <div id="sync2" class="owl-carousel owl-theme">
							@foreach ($img as $item)
							<div class="item">
								<div class="sx-media">
									<img src="{{$item}}" alt="">
								</div>
							</div>
							@endforeach
						</div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title" style="color: white">{{ $product->name }} </h3>
                        @if ($product->price > 0 && $product->discount > 0 && $product->discount < $product->price)
                            <div class="product-single-price tuan-box">
                                <span class="p-single-old-price ">{{ number_format($product->price) }}₫</span>
                                <span class="p-single-new-price ">{{ number_format($product->discount) }}₫</span>
                            </div>
                        @elseif ($product->price == 0 && $product->discount == 0)
                            <div class="product-single-price">
                                <span class="p-single-new-price">Liên Hệ</span>
                            </div>
                        @else
                            <div class="product-single-price">
                                <span class="p-single-new-price ">{{ number_format($product->price) }}₫</span>
                            </div>
                        @endif
                    </div>

                    <div class="product-details__buttons">
                        <div class="product-details__buttons-1">
                            <a href="{{ $setting->phone1 }}" class="thm-btn">Liên hệ đặt hàng</a>
                        </div>

                    </div>
                    <br>
                    <div class="sx-box sx-product-gallery on-show-slider">
                        <div id="sync2" class="owl-carousel owl-theme">
                            @foreach ($img as $item)
                                <div class="item">
                                    <div class="sx-media tuannimg">
                                        <img class="imagedetail" src="{{ $item }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="product-details__buttons">
					<div class="product-details__buttons-1">
						<a href="tel:{{$setting->phone1}}" class="thm-btn">HotLine</a>
					</div>
				</div> --}}

                    {{-- <div class="product-details__social">
					<div class="title">
						<h3>Share with Friends</h3>
					</div>
					<div class="product-details__social-link">
						<a href="#"><span class="fab fa-twitter"></span></a>
						<a href="#"><span class="fab fa-facebook"></span></a>
						<a href="#"><span class="fab fa-pinterest-p"></span></a>
						<a href="#"><span class="fab fa-instagram"></span></a>
					</div>
				</div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="product-description">
        <div class="container">
            <h3 class="product-description__title">Thông tin sản phẩm</h3>
            {!! languageName($product->content) !!}
        </div>
    </section>
    <section class="sptuongtu">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Sản phẩm tương tự</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="productlq owl-carousel owl-theme thm-owl__carousel"
                        data-owl-options='{
					"loop": false,
					"autoplay": true,
					"margin": 30,
					"nav": false,
					"dots": false,
					"smartSpeed": 500,
					"autoplayTimeout": 4000,
					"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
					"responsive": {
						"0": {
							"items": 1.5
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
                        <!--Blog One Start-->
                        @foreach ($productlq as $item)
                            @php
                                $imgprohome = json_decode($item->images);
                            @endphp
                          @include('layouts.product.item', ['item' => $item, 'imgnb' => $imgprohome])
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
