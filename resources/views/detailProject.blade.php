@extends('layouts.main.master')
@section('title')
    {{ $detail->name }}
@endsection
@section('description')
    {{ $detail->description }}
@endsection
@section('image')
    @php
        $img = json_decode($detail->images);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('js')
@endsection
@section('css')
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
                    <li><a href="{{ route('home') }}">Dự Án</a></li>
                    <li><span>/</span></li>
                    <li>{{ $detail->name }}</li>
                </ul>
                <h2>{{ $detail->name }}</h2>
            </div>
        </div>
    </section>
    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="project-details__img-box">
                        <div class="project-details__img owl-carousel owl-theme thm-owl__carousel"
                            data-owl-options='{
            "loop": false,
            "autoplay": true,
            "margin": 30,
            "nav": false,
            "dots": false,
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
                    "items": 1
                },
                "1200": {
                    "items": 1
                }
            }
        }'>
                            @foreach ($img as $item)
                                <div class="imge">
                                    <img src="{{ $item }}" alt="">
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="project-details__video-box">
                        @if($detail->location)
                            @php
                                $videoUrl = $detail->location;
                                // Kiểm tra nếu là YouTube URL
                                if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                                    // Chuyển đổi YouTube URL thành embed URL
                                    if (strpos($videoUrl, 'youtu.be') !== false) {
                                        $videoId = substr($videoUrl, strrpos($videoUrl, '/') + 1);
                                    } else {
                                        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
                                        $videoId = $params['v'] ?? '';
                                    }
                                    $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                                } else {
                                    $embedUrl = $videoUrl;
                                }
                            @endphp
                            
                            <div class="project-details__video">
                                <div class="video-responsive">
                                    @if(strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false)
                                        <iframe 
                                            src="{{ $embedUrl }}" 
                                            frameborder="0" 
                                            allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                        </iframe>
                                    @else
                                        <!-- Video file trực tiếp -->
                                        <video controls>
                                            <source src="{{ $videoUrl }}" type="video/mp4">
                                            Trình duyệt của bạn không hỗ trợ video.
                                        </video>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="project-details__no-video">
                                <p>Không có video cho dự án này.</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="project-details__room-wallpapers">
                <h3 class="project-details__room-wallpapers-title">Chi tiết dự án</h3>
                {!! languageName($detail->content) !!}
            </div>
        </div>
    </section>
@endsection
