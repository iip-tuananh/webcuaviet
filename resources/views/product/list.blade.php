@extends('layouts.main.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    Danh sách {{ $title }}
@endsection
@section('image')
    {{ url('' . $banner[0]->image) }}
@endsection
@section('js')

@endsection
@section('css')
    <style>
        .menu-2cap>li {
            margin-bottom: 10px;
        }

        .menu-2cap .submenu {
            margin-left: 15px;
        }

        .menu-2cap .submenu li {
            margin-bottom: 5px;
        }

        .menu-2cap a {
            /* white-space: nowrap; */
            display: block;
            padding: 4px 8px;
            color: #222;
            text-decoration: none;
        }

        .menu-2cap a:hover {
            color: #007bff;
        }
    </style>
@endsection
@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ url('frontend/images/page-header-bg.jpg') }})">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>{{ $title }}</li>
                </ul>
                <h2>{{ $title }}</h2>
            </div>
        </div>
    </section>
    <section class="product">
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="sidebar" id="sidebar">
                        <div class="sidebar__inner">
                            <div class="product__sidebar">
                                <div class="product__sidebar-title">
                                    <h3 class="tieude-tuan">Danh mục sản phẩm</h3>
                                </div>
                            </div>
                            <ul class="menu-2cap list-unstyled">
                                @foreach ($categoryhome as $parent)
                                    <li>
                                        <a href="{{ route('allListProCate', ['danhmuc' => $parent->slug]) }}"
                                            class="{{ request()->routeIs('allListProCate') && request('danhmuc') == $parent->slug ? 'active' : '' }}">{!! languageName($parent->name) !!}</a>
                                        @if (isset($parent->typeCate) && count($parent->typeCate) > 0)
                                            <ul class="submenu list-unstyled">
                                                @foreach ($parent->typeCate as $child)
                                                    <li class="boder-li">
                                                        <a href="{{ route('allListType', ['danhmuc' => $parent->slug, 'loaidanhmuc' => $child->slug]) }}"
                                                            class="{{ request()->routeIs('allListType') && request('loaidanhmuc') == $child->slug ? 'active' : '' }}">{!! languageName($child->name) !!}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9">
                    <div class="content">
                        <div class="product__items">
                            <div class="product__all">
                                <div class="row">
                                    @if (count($list) > 0)
                                        @foreach ($list as $item)
                                            @php
                                                $img = json_decode($item->images);
                                            @endphp
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-6">
                                                @include('layouts.product.item', [
                                                    'item' => $item,
                                                    'imgnb' => $img,
                                                ])
                                            </div>
                                        @endforeach
                                        {{ $list->links() }}
                                    @else
                                        <h3>Nội dung đang cập nhật...</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
