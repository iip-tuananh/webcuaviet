<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner clearfix">
                <div class="main-header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ $setting->logo }}" alt="" class="dark-logo">
                    </a>
                </div>
                    <form action="{{ route('search_result') }}" method="POST" class="header-search-form"
                            style="display:inline-block; margin-left:20px;">
                            @csrf
                            <input type="text" name="keyword" class="header-search-input input-group-field auto-search form-control" placeholder="Tìm kiếm..."
                                style="padding:5px 10px; border-radius:4px; border:1px solid #ccc;"  id="ajax-search-input" autocomplete="off">



                            <button type="submit" class="header-search-btn"
                                style="padding:5px 10px; border:none; background:#333; color:#fff; border-radius:4px;">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                          <div class="ajax-search-result-container" style="display: none;">
                        <div class="search-results-wrapper">
                            <!-- Kết quả tìm kiếm sẽ hiển thị ở đây -->
                        </div>
                        <div class="search-loading" style="display: none;">
                            <div class="loader-ellips">
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                                <span class="loader-ellips__dot"></span>
                            </div>
                        </div>
                    </div>
                    <div class="search-overlay"></div>
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
                            </ul>
                        </div>
                        <!-- Ô tìm kiếm bắt đầu -->
                    
                        <!-- Ô tìm kiếm kết thúc -->
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
