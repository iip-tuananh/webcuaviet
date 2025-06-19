<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner clearfix">
                <div class="main-header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ $setting->logo }}" alt="" class="dark-logo">
                    </a>
                </div>
                <div class="main-header__top-right">
                    <div class="main-header__top-right-content">
                        <div class="main-header__top-address-box">
                            <ul class="list-unstyled main-header__top-address">
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    <div class="content">
                                        <p>Hotline</p>
                                        <h5><a href="tel:{{ $setting->phone1 }}">{{ $setting->phone1 }}</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-message"></span>
                                    </div>
                                    <div class="content">
                                        <p>Email</p>
                                        <h5><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></h5>
                                    </div>
                                </li>
                                {{-- 
                        <li>
                           <div class="icon icon--location">
                              <span class="icon-location"></span>
                           </div>
                           <div class="content">
                              <p>Địa chỉ</p>
                              <h5>{{$setting->address1}}</h5>
                           </div>
                        </li>
                        --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu__wrapper clearfix mauweb">
            <div class="container">
                <div class="main-menu__wrapper-inner clearfix mauweb">
                    <div class="main-menu__left">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="current">
                                    <a style="color: white" href="{{ route('home') }}">Trang chủ </a>
                                </li>
                                <li>
                                    <a style="color: white" href="{{ route('aboutUs') }}">Giới thiệu </a>
                                </li>
                                {{-- 
                        <li class="dropdown">
                           <a href="{{route('serviceListAll')}}">Dịch vụ </a>
                           <ul>
                              @foreach ($servicehome as $item)
                              <li><a href="{{route('serviceList',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        --}}
                                <li class="dropdown">
                                    <a style="color: white" href="{{ route('allProduct') }}">Sản phẩm</a>
                                    <ul>
                                        @foreach ($categoryhome as $item)
                                            <li>
                                                <a
                                                    href="{{ route('allListProCate', ['danhmuc' => $item->slug]) }}">{{ languageName($item->name) }}</a>
                                                @if (isset($item->typeCate) && count($item->typeCate) > 0)
                                                    <ul class="submenu">
                                                        @foreach ($item->typeCate as $child)
                                                            <li>
                                                                <a
                                                                    href="{{ route('allListType', ['danhmuc' => $item->slug, 'loaidanhmuc' => $child->slug]) }}">{{ languageName($child->name) }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a style="color: white" href="{{ route('duanTieuBieu') }}">Dự án </a>
                                </li>
                                <li class="dropdown">
                                    <a style="color: white" href="javascipt:;">Blog</a>
                                    <ul>
                                        @foreach ($blogCate as $item)
                                            <li><a
                                                    href="{{ route('listCateBlog', ['slug' => $item->slug]) }}">{{ languageName($item->name) }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a style="color: white" href="javascipt:;">Hỗ Trợ Khách Hàng</a>
                                    <ul>
                                        @foreach ($hotrokhachhang as $item)
                                            <li><a
                                                    href="{{ route('pagecontent', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a style="color: white" href="{{ route('lienHe') }}">Liên hệ </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__search-btn-box">
                            <div class="lang-wrap">
                                <a href="javascript:;" onclick="translateheader('vi')"><img width="30"
                                        src="/frontend/images/vie.png" alt=""></a>
                                {{-- <span>/</span> --}}
                                <a href="javascript:;" onclick="translateheader('en')"><img width="30"
                                        src="{{ url('frontend/images/eng.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
