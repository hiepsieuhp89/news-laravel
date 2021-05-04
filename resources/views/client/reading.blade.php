@extends('client.templates.master')
@section('meta-section')
<meta property="og:url"           content="{{ Request()->url() }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $new->title }}" />
<meta property="og:description"   content="{{ $new->first_look }}" />
<meta property="og:image"         content="{{ $new->image }}" />
@endsection
@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Trang chủ</a></li>
              <li><a href="{{ route('index.category',['category_slug'=>$new->getCategory->slug]) }}">{{ $new->getCategory->name}}</a></li>
              <li><a href="{{ route('index.chillCategory',['category_slug'=>$new->getCategory->slug,'chillCategory_slug'=>$new->getChillCategory->slug]) }}">{{ $new->getChillCategory->name}}</a></li>
            </ol>
            <h1>{{$new->title}}</h1>
            <div class="post_commentbox"> 
              <a href=""><i class="fa fa-user"></i>{{ $new->author_created->name }}</a>
              <span><i class="fa fa-calendar"></i>6:49 AM</span> 
              <a href="{{ route('index.chillCategory',['category_slug'=>$new->getCategory->slug,'chillCategory_slug'=>$new->getChillCategory->slug]) }}">
                <i class="fa fa-tags"></i>{{ $new->getChillCategory->name}}
              </a> 
            </div>
            @if(Auth::check())
              <div class="tool-button" style="font-size: 20px;float: right;">
                @if( in_array($new->id, explode('|',Auth::user()->pinned_news)) )
                  <a title="Bỏ thích" class="love-button tool-button checked" data-id = '{{ $new->id }}' action = 'unpin'><i class="fas fa-heart"></i></a>
                @else
                  <a title="Thích" class="love-button tool-button" data-id = '{{ $new->id }}' action = 'pin'><i class="far fa-heart"></i></a>
                @endif
                <!--
                  <a class="alert-button tool-button" data-id = '{{ $new->id }}' action = 'report'><i class="fas fa-exclamation-triangle"></i></a>
                -->
              </div>
            @endif
            <div class="single_page_content">
              @php 
                echo $new->description;
              @endphp
              <ul>
                <li><a href="{{ $new->source_created->url }}">Theo: {{ $new->source_created->name }}</a></li>
              </ul>
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li>
                  <div class="fb-share-button" data-href="{{ Request()->url() }}" data-layout="button_count" data-size="large">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">chia sẻ
                    </a>
                  </div> 
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @include('client.templates.sections.right_section')
    </div>
</section>
@endsection