@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
{{$title_page}} 
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
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
               <li>{{$title_page}} </li>
           </ul>
           <h2>{{$title_page}} </h2>
       </div>
   </div>
</section>
<section class="blog-one">
   <div class="container">
       <div class="row">
         @if (count($blog) > 0)  
            @foreach ($blog as $key => $item)
           <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="{{$key}}00ms" style="visibility: visible; animation-delay: {{$key}}00ms; animation-name: fadeInUp;">
               <!--Blog One Start-->
               <div class="blog-one__single">
                   <div class="blog-one__img">
                       <img src="{{$item->image}}" alt="">
                       <a href="{{route('detailBlog',['slug'=>$item->slug])}}">
                           <span class="blog-one__plus"></span>
                       </a>
                   </div>
                   <div class="blog-one__content">
                       <div class="blog-one__date">
                           <p>{{date_format($item->created_at,'d/m/Y')}}</p>
                       </div>
                       <ul class="list-unstyled blog-one__meta">
                           <li><a href="{{route('detailBlog',['slug'=>$item->slug])}}"><i class="far fa-user-circle"></i> by Admin </a>
                           </li>
                           <li>
                       </ul>
                       <h3 class="blog-one__title"><a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                   </div>
               </div>
           </div>
           @endforeach
           {{$blog->links()}}
         @else 
         <h3>Nội dung đang cập nhật</h3>
         @endif
          
       </div>
   </div>
</section>
@endsection