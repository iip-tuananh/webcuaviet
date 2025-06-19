@extends('layouts.main.master')
@section('title')
Tất cả dịch vụ
@endsection
@section('description')
Tất cả dịch vụ
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('js')
@endsection
@section('css')
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
               <li>Tất cả dịch vụ</li>
           </ul>
           <h2>Tất cả dịch vụ</h2>
       </div>
   </div>
</section>
<section class="product">
    <div class="container">
      <div class="row">
         @foreach ($servicehome as $item)
         <div class="col-xl-4 col-lg-4">
            <!--Services One Single-->
            <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
               <div class="services-one__img">
                  <a href="{{route('serviceList',['slug'=>$item->slug])}}">
                     <img src="{{$item->image}}" alt="">
                  </a>
                  
               </div>
               <div class="services-one__content">
                  <h3 class="services-one__title"><a href="{{route('serviceList',['slug'=>$item->slug])}}">{{$item->name}}</a></h3>
                  <div class="services-one__text line_2">{!!$item->description!!}
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
@endsection