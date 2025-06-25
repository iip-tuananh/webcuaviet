<!-- https://ambed-html.vercel.app/main-html/index.html -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- META -->
      <meta charset="UTF-8" />
      <meta name="theme-color" content="#d70018">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
      <meta name='revisit-after' content='2 days' />
      <meta name="viewport" content="width=device-width">
      <title>@yield('title')</title>
      <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
      <meta http-equiv="Content-Language" content="vi" />
      <link rel="alternate" href="{{url()->current()}}" hreflang="vi-vn" />
      <meta name="description" content="@yield('description')">
      <meta name="robots" content="index, follow" />
      <meta name="googlebot" content="index, follow">
      <meta name="revisit-after" content="1 days" />
      <meta name="generator" content="@yield('title')" />
      <meta name="rating" content="General">
      <meta name="application-name" content="@yield('title')" />
      <meta name="theme-color" content="#ed3235" />
      <meta name="msapplication-TileColor" content="#ed3235" />
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-title" content="{{url()->current()}}" />
      <link rel="apple-touch-icon-precomposed" href="@yield('image')" sizes="700x700">
      <meta property="og:url" content="">
      <meta property="og:title" content="@yield('title')">
      <meta property="og:description" content="@yield('description')">
      <meta property="og:image" content="@yield('image')">
      <meta property="og:site_name" content="{{url()->current()}}">
      <meta property="og:image:alt" content="@yield('title')">
      <meta property="og:type" content="website" />
      <meta property="og:locale" content="vi_VN" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:site" content="@{{url()->current()}}" />
      <meta name="twitter:title" content="@yield('title')" />
      <meta name="twitter:description" content="@yield('description')" />
      <meta name="twitter:image" content="@yield('image')" />
      <meta name="twitter:url" content="" />
      <meta itemprop="name" content="@yield('title')">
      <meta itemprop="description" content="@yield('description')">
      <meta itemprop="image" content="@yield('image')">
      <meta itemprop="url" content="">
      <link rel="canonical" href="{{\Request::url()}}">
      <!-- <link rel="amphtml" href="amp/" /> -->
      <link rel="image_src" href="@yield('image')" />
      <link rel="image_src" href="@yield('image')" />
      <link rel="shortcut icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <link rel="icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/bootstrap.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/animate.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/custom-animate.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/all.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/jarallax.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/jquery.magnific-popup.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/nouislider.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/nouislider.pips.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/odometer.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/swiper.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/style.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/tiny-slider.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/stylesheet.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/owl.carousel.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/owl.theme.default.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/jquery.bxslider.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/bootstrap-select.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/vegas.min.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/jquery-ui.css" />
      <!-- LightGallery CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
      {{-- <link rel="stylesheet" href="{{asset('frontend/css/timePicker.css')}}" /> --}}
      <!-- template styles -->
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/ambed.css" />
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/ambed-responsive.css" />
      <!-- modes css -->
      <!-- toolbar css -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/toolbar.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/callbutton.css">
      @yield('css')
      <script type="text/javascript"
      src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <script type="text/javascript">
         function googleTranslateElementInit() {
               new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN', }, 'translate_select');
         }
      </script>
      <style>
         .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
                 display: none;
             }
         .skiptranslate{
         display: none;
         top: 0;
         }
         .goog-te-banner-frame{display: none !important;}
         .goog-text-highlight { background: none !important; box-shadow: none !important;}
         .goog-te-banner-frame.skiptranslate {
       display: none !important;
       } 
   body {
      position: revert!important;
       top: 0px !important; 
       }
      </style>
   </head>
   <body class="custom-cursor">
      <div id="translate_select"></div>
      <div class="custom-cursor__cursor"></div>
      <div class="custom-cursor__cursor-two"></div>
      
      <!-- /.preloader -->
      <div class="page-wrapper">
        @include('layouts.header.index')
         <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
         </div>
         <!-- /.stricky-header -->
        @yield('content')
       
         @include('layouts.footer.index')
      </div>
      <div onclick="window.location.href= 'tel:{{$setting->phone1}}'" class="hotline-phone-ring-wrap">
         <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
               <a href="tel:{{$setting->phone1}}" class="pps-btn-img">
                  <img src="{{url('frontend/images/phone.png')}}" alt="Gọi điện thoại" width="50">
               </a>
            </div>
         </div>
         <a href="tel:{{$setting->phone1}}">
         </a>
         <div class="hotline-bar"><a href="tel:{{$setting->phone1}}">
            </a><a href="tel:{{$setting->phone1}}">
               <span class="text-hotline">{{$setting->phone1}}</span>
            </a>
         </div>
   
      </div>
      <!-- /.page-wrapper -->
      <div class="mobile-nav__wrapper">
         <div class="mobile-nav__overlay mobile-nav__toggler"></div>
         <!-- /.mobile-nav__overlay -->
         <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
               <a href="{{route('home')}}" aria-label="logo image"><img src="{{$setting->logo}}"
                  width="155" alt="{{$setting->logo}}" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
               <li>
                  <i class="fa fa-envelope"></i>
                  <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
               </li>
               <li>
                  <i class="fa fa-phone-alt"></i>
                  <a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
               </li>
            </ul>
            <!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
               <div class="mobile-nav__social">
                  <a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-twitter" target="_blank"></i></a>
                  
                  <a href="{{$setting->fbPixel}}" target="_blank"><i class="fab fa-instagram"></i></a>
                
                  <a href="{{$setting->google}}" target="_blank"><i class="fab fa-youtube"></i></a>
               </div>
               <!-- /.mobile-nav__social -->
            </div>
            <!-- /.mobile-nav__top -->
         </div>
         <!-- /.mobile-nav__content -->
      </div>
      <!-- /.mobile-nav__wrapper -->
      <div class="search-popup">
         <div class="search-popup__overlay search-toggler"></div>
         <!-- /.search-popup__overlay -->
         <div class="search-popup__content">
            <form action="#">
               <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
               <input type="text" id="search" placeholder="Search Here..." />
               <button type="submit" aria-label="search submit" class="thm-btn">
               <i class="icon-magnifying-glass"></i>
               </button>
            </form>
         </div>
         <!-- /.search-popup__content -->
      </div>
      <!-- /.search-popup -->
      <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery-3.6.0.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/bootstrap.bundle.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jarallax.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.appear.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.circle-progress.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.magnific-popup.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/swiper.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/tiny-slider.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/wow.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/countdown.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/owl.carousel.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.bxslider.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/vegas.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery-ui.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.lettering.min.js"></script>
      <!-- template js -->
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/ambed.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jQuery.style.switcher.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/toolbar.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/callbutton.js"></script>
      <!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"></script>
      @yield('js')
      <script>
         function translateheader(lang){
             
             var languageSelect = document.querySelector("select.goog-te-combo");
             languageSelect.value = lang; 
             languageSelect.dispatchEvent(new Event("change"));
         }
      </script>
      <script type="text/javascript" 
      src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/sticky-sidebar@3.3.1/dist/sticky-sidebar.min.js"></script>
<script>
    let sidebarInstance = null;

    function initStickySidebar() {
        const isMobile = window.innerWidth < 768;

        if (!isMobile) {
            // Chỉ khởi tạo nếu chưa có
            if (!sidebarInstance) {
                sidebarInstance = new StickySidebar('#sidebar', {
                    containerSelector: '#main-container .row', // Sửa từ '.test-course-details .row'
                    innerWrapperSelector: '.sidebar__inner',
                    topSpacing: 90,
                    bottomSpacing: 20,
                    resizeSensor: true
                });
            }
        } else {
            // Nếu đang ở mobile và đã khởi tạo → hủy
            if (sidebarInstance) {
                sidebarInstance.destroy();
                sidebarInstance = null;
            }
        }
    }

    window.addEventListener('load', initStickySidebar);
    window.addEventListener('resize', initStickySidebar);
</script>

   </body>
   {{-- #1565C0  --}}
     <script>
         $(document).ready(function() {
             const searchInput = $('#ajax-search-input');
             const searchForm = $('#ajax-search-form');
             const searchResultContainer = $('.ajax-search-result-container');
             const searchLoading = $('.search-loading');
             const searchOverlay = $('.search-overlay');
             let searchTimeout;
         
             // Khi nhập vào input tìm kiếm
             searchInput.on('input', function() {
                 const keyword = $(this).val().trim();
         
                 // Xóa timeout cũ để tránh gửi quá nhiều request
                 clearTimeout(searchTimeout);
         
                 // Nếu từ khóa ít hơn 2 ký tự, ẩn kết quả và overlay
                 if (keyword.length < 2) {
                     searchResultContainer.hide();
                     searchOverlay.fadeOut(200);
                     return;
                 }
         
                 // Hiển thị loading và overlay
                 if (!searchResultContainer.is(':visible')) {
                     searchOverlay.fadeIn(200);
                     searchResultContainer.slideDown(200);
                 }
                 searchLoading.show();
                 $('.search-results-wrapper').hide();
         
                 // Đặt timeout mới để tránh gửi request liên tục khi người dùng đang gõ
                 searchTimeout = setTimeout(function() {
                     // Gửi AJAX request
                     $.ajax({
                         url: '/auto-search-product',
                         method: 'POST',
                         data: {
                             keyword: keyword,
                             _token: $('meta[name="csrf-token"]').attr('content')
                         },
                         success: function(response) {
                             // Cập nhật kết quả tìm kiếm
                             searchLoading.fadeOut(200);
         
                             // Tạo và hiển thị kết quả HTML
                             let resultsHTML = '';
         
                             if (response.products && response.products.length > 0) {
                                 response.products.forEach(function(product) {
                                     const discountPrice = product.discount > 0 ?
                                         formatPrice(product.discount) : null;
                                     const regularPrice = formatPrice(product
                                         .price);
         
                                     resultsHTML += `
                                  <div class="search-result-item">
                                      <div class="search-result-image">
                                          <a href="${product.url}">
                                              <img src="${product.image || '/frontend/images/no-image.jpg'}" alt="${product.name}">
                                          </a>
                                      </div>
                                      <div class="search-result-info">
                                          <div class="search-result-name">
                                              <a href="${product.url}">${product.name}</a>
                                          </div>
                                          <div class="search-result-meta">
                                              ${product.category ? `<span class="search-result-category">${product.category}</span>` : ''}
                                          </div>
                                          <div class="search-result-price">
                                              ${discountPrice ? 
                                                  `${discountPrice}₫ <del>${regularPrice}₫</del>` : 
                                                  `${regularPrice}₫`
                                              }
                                          </div>
                                      </div>
                                  </div>
                              `;
                                 });
         
                                 // Thêm nút "Xem tất cả"
                                 resultsHTML += `
                              <div class="search-view-all">
                                  <a href="/ket-qua-tim-kiem?keywordsearch=${encodeURIComponent(keyword)}">
                                      Xem tất cả ${response.total || response.products.length} kết quả
                                  </a>
                              </div>
                          `;
                             } else {
                                 resultsHTML = `
                              <div class="search-no-result">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                  </svg>
                                  <div class="search-no-result-text">Không tìm thấy kết quả nào</div>
                                  <div class="search-no-result-hint">Hãy thử tìm kiếm với từ khóa khác</div>
                              </div>
                          `;
                             }
         
                             $('.search-results-wrapper').html(resultsHTML).fadeIn(300);
                         },
                         error: function() {
                             searchLoading.hide();
                             $('.search-results-wrapper').html(`
                          <div class="search-no-result">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                              </svg>
                              <div class="search-no-result-text">Đã xảy ra lỗi</div>
                              <div class="search-no-result-hint">Vui lòng thử lại sau</div>
                          </div>
                      `).fadeIn(300);
                         }
                     });
                 }, 300);
             });
         
             // Xử lý khi submit form
             searchForm.on('submit', function() {
                 const keyword = searchInput.val().trim();
                 if (keyword.length < 2) {
                     return false;
                 }
             });
         
             // Ẩn kết quả khi click vào overlay
             searchOverlay.on('click', function() {
                 searchResultContainer.slideUp(200);
                 searchOverlay.fadeOut(200);
             });
         
             // Ẩn kết quả khi click ra ngoài
             $(document).on('click', function(e) {
                 if (!$(e.target).closest('#search-header').length &&
                     !$(e.target).closest('.ajax-search-result-container').length) {
                     searchResultContainer.slideUp(200);
                     searchOverlay.fadeOut(200);
                 }
             });
         
             // Focus vào input tìm kiếm
             searchInput.on('focus', function() {
                 const keyword = $(this).val().trim();
                 if (keyword.length >= 2) {
                     searchResultContainer.slideDown(200);
                     searchOverlay.fadeIn(200);
                 }
             });
         
             // Format giá tiền
             function formatPrice(price) {
                 return new Intl.NumberFormat('vi-VN').format(price);
             }
         });
      </script>
<!-- Thêm ngay trước </body> -->
<div class="social-fixed-group">
    <a href="{{$setting->google}}" class="social-fixed zalo" target="_blank" rel="noopener">
        <img src="{{asset('frontend/images/zalo.png')}}" alt="Zalo" width="40">
    </a>
    <a href="{{$setting->facebook}}" class="social-fixed facebook" target="_blank" rel="noopener">
        <img src="{{asset('frontend/images/mess.png')}}" alt="Facebook" width="40">
    </a>
</div>
</html>