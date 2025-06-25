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
    <div class="container">
        <div class="row product-tuan">
            <!-- Cột trái -->
            <div class="col-lg-3 col-xl-3">
                <div id="menu-fetail" class="side-detail">

               
                <!-- Menu danh mục sản phẩm -->
                @include('layouts.menu.menuleft')
                <!-- Sản phẩm liên quan (Có thể bạn thích) -->
             
                 </div>
            </div>
            <!-- Cột phải: Chi tiết sản phẩm -->
            <div class="col-lg-9 col-xl-9">
                <div class="row">
                    <!-- Ảnh sản phẩm -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-image mb-4">
                            <a href="{{ $img[0] }}" id="mainGallery">
                                <img id="mainProductImg" src="{{ $img[0] }}" alt="{{ $product->name }}"
                                    class="img-fluid rounded" style="width:100%;object-fit:cover;cursor:zoom-in;">
                            </a>
                        </div>
                        <!-- Modal phóng to ảnh -->
                        <div id="imgModal"
                            style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);align-items:center;justify-content:center;">
                            <span id="closeImgModal"
                                style="position:absolute;top:30px;right:40px;font-size:2.5rem;color:#fff;cursor:pointer;z-index:10001;">&times;</span>
                            <img id="imgModalContent" src=""
                                style="max-width:99vw !important;max-height:98vh !important;width:auto;height:auto;box-shadow:0 0 20px #000;border-radius:0;background:#fff;display:block;margin:auto;">
                        </div>
                        <div id="lightgallery" class="product-thumbnails d-flex gap-2 mt-2">
                            @foreach ($img as $thumb)
                                <img src="{{ $thumb }}" alt="thumb" width="60" height="60"
                                    style="object-fit:cover; border-radius:6px; border:1.5px solid #eee; cursor:pointer; transition: border 0.2s;">
                            @endforeach
                        </div>
                    </div>
                    <!-- Thông tin sản phẩm -->
                    <div class="col-lg-6 col-xl-6">
                        <h1 style="font-size:1.8rem;font-weight:700;">{{ $product->name }}</h1>
                        <div class="mb-3" style="font-size:1.2rem;font-weight:600;">
                            @if ($product->discount && $product->discount > 0 && $product->discount < $product->price)
                                <span style="color:#888;text-decoration:line-through;margin-right:10px;">
                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                </span>
                                <span style="color:#e74c3c;">
                                    {{ number_format($product->discount, 0, ',', '.') }}đ
                                </span>
                            @else
                                <span style="color:#e74c3c;">
                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            {!! languageName($product->description) !!}
                        </div>
                        <a href="tel:{{ $setting->phone1 ?? '0123456789' }}" class="btn btn-contact-glass">
                            <i class="fa fa-phone"></i> Liên hệ đặt hàng
                        </a>
                    </div>
                </div>
                <!-- Mô tả chi tiết sản phẩm -->
                <div class="product-description mt-5">
                    <h3>Mô tả sản phẩm</h3>
                    {!! languageName($product->content) !!}
                </div>
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
							"items": 4
						}
					}
				}'>
                                    <!--Blog One Start-->
                                    @foreach ($productlq as $item)
                                        @php
                                            $imgprohome = json_decode($item->images);
                                        @endphp
                                        @include('layouts.product.item', [
                                            'item' => $item,
                                            'imgnb' => $imgprohome,
                                        ])
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // lightGallery cho ảnh lớn
            lightGallery(document.getElementById('mainGallery'), {
                selector: 'this',
                zoom: true,
                download: false,
                actualSize: false
            });

            // Đổi ảnh lớn khi click thumb
            const mainImg = document.getElementById('mainProductImg');
            const thumbs = document.querySelectorAll('.product-thumbnails img');
            thumbs.forEach(function(thumb) {
                thumb.addEventListener('click', function() {
                    mainImg.src = this.src;
                    // Xóa active cũ
                    thumbs.forEach(t => t.classList.remove('active-thumb'));
                    // Thêm active cho thumb đang chọn
                    this.classList.add('active-thumb');
                });
            });
        });
    </script>
    <style>
        .active-thumb {
            border: 2px solid #e74c3c !important;
            box-shadow: 0 0 4px #e74c3c55;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Khởi tạo sticky sidebar cho menu-fetail
        new StickySidebar('#menu-fetail', {
            topSpacing: 80,
            bottomSpacing: 0,
            containerSelector: '.row.product-tuan',
            innerWrapperSelector: '.side-detail, .sidebar, .sidebar__inner '
        });

        // lightGallery cho ảnh lớn
        lightGallery(document.getElementById('mainGallery'), {
            selector: 'this',
            zoom: true,
            download: false,
            actualSize: false
        });

        // Đổi ảnh lớn khi click thumb
        const mainImg = document.getElementById('mainProductImg');
        const thumbs = document.querySelectorAll('.product-thumbnails img');
        thumbs.forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                mainImg.src = this.src;
                thumbs.forEach(t => t.classList.remove('active-thumb'));
                this.classList.add('active-thumb');
            });
        });
    });
</script>
@endsection
