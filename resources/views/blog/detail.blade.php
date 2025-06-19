@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="page-header">
   <div class="page-header-bg" style="background-image: url({{url('frontend/images/page-header-bg.jpg')}})">
   </div>
   <div class="container">
       <div class="page-header__inner">
           <ul class="thm-breadcrumb list-unstyled">
               <li><a href="index.html">Home</a></li>
               <li><span>/</span></li>
               <li>{{languageName($blog_detail->title)}}</li>
           </ul>
           <h2>{{languageName($blog_detail->title)}}</h2>
       </div>
   </div>
</section>
<section class="blog-details">
   <div class="container">
       <div class="row">
           <div class="col-xl-9 col-lg-9">
               <div class="blog-details__left">
                  
                   <div class="blog-details__content">
                       <ul class="list-unstyled blog-details__meta">
                           <li><a href=""><i class="far fa-user-circle"></i> by Admin </a>
                           </li>
                           <li><span>/</span></li>
                           <li><a href=""><i class="far fa-calendar"></i> {{date_format($blog_detail->created_at,'d/m/Y')}}</a>
                           </li>
                       </ul>
                       <h1 class="blog-details__title">{{languageName($blog_detail->title)}}</h1>
                       {!!languageName($blog_detail->content)!!}
                   </div>
                 
               </div>
           </div>
           <div class="col-xl-3 col-lg-3">
            <div class="menu-blog-lq">
                <h3 class="menu-blog-lq__title">Bài viết liên quan</h3>
                <ul class="menu-2cap">
                     @foreach($bloglq as $i)
                     <li>
                          <a href="{{route('detailBlog',['slug'=>$i->slug])}}" title="{{languageName($i->title)}}">
                            {{languageName($i->title)}}
                          </a>
                     </li>
                     @endforeach
                </ul>
            </div>
           </div>
       </div>
   </div>
</section>
@endsection