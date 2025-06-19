<!--Site Footer Start-->
<footer class="site-footer">
   <div class="site-footer-bg">
   </div>
   <div class="site-footer__top">
      <div class="container">
         <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
               <div class="footer-widget__column footer-widget__about">
                  <div class="footer-widget__logo">
                     <a href=""><img src="{{$setting->logo}}" alt=""></a>
                  </div>
                  <div class="footer-widget__about-text-box">
                     <p class="footer-widget__about-text">{{$setting->webname}}</p>
                  </div>
                  {{-- <div class="site-footer__social">
                     <a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>
                     
                     <a href="{{$setting->fbPixel}}" target="_blank"><i class="fab fa-tiktok"></i></a>
                   
                     <a href="{{$setting->google}}" target="_blank"><i class="fab fa-youtube"></i></a>
                  </div> --}}
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6  wow fadeInUp" data-wow-delay="400ms">
               <div class="footer-widget__column footer-widget__contact clearfix">
                  <h3 class="footer-widget__title">Liên hệ</h3>
                  <ul class="footer-widget__contact-list list-unstyled clearfix">
                     <li>
                        <div class="icon">
                           <span class="icon-phone-call"></span>
                        </div>
                        <div class="text">
                           <h5 class="mb-0">Hotline</h5>
                           <p class="mb-0"><a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a></p>
                        </div>
                     </li>
                     <li>
                        <div class="icon">
                           <span class="icon-message"></span>
                        </div>
                        <div class="text">
                           <h5 class="mb-0">Email</h5>
                           <p class="mb-0"><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                        </div>
                     </li>
                     <li>
                        <div class="icon">
                           <span class="icon-location"></span>
                        </div>
                        <div class="text">
                           <h5 class="mb-0">Địa chỉ</h5>
                           <p class="mb-0">{{$setting->address1}}</p>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
               <div class="footer-widget__column footer-widget__explore clearfix">
                  <h3 class="footer-widget__title">Hỗ Trợ Khách Hàng</h3>
                  <ul class="footer-widget__explore-list list-unstyled clearfix">
                      @foreach ($hotrokhachhang as $item)
                     <li><a
                                                    href="{{ route('pagecontent', ['slug' => $item->slug]) }}">{{ $item->title }}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
               <div class="footer-widget__column footer-widget__explore clearfix">
                  <h3 class="footer-widget__title">Sản Phẩm</h3>
                  <ul class="footer-widget__explore-list list-unstyled clearfix">
                     @foreach ($categoryhome as $item)
                     <li><a href="{{route('allListProCate',['danhmuc'=>$item->slug])}}">{{languageName($item->name)}}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
            
            
         </div>
      </div>
   </div>
   <div class="site-footer__bottom">
      <div class="container">
         <div class="row">
            <div class="col-xl-12">
               <div class="site-footer__bottom-inner">
                  <p class="site-footer__bottom-text">© Copyright 2024 by <a href="#">{{$setting->webname}}</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!--Site Footer End-->