@extends('client.templates.master')
@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Trang chủ</a></li>
              <li><a href="">Tìm kiếm</a></li>
            </ol>
            <div class="single_post_content">
              <h2><span>Kết quả tìm kiếm</span></h2>
              <span style="line-height: 3em;font-size: 16px;">Kết quả tìm kiếm cho: {{ Request()->keysearch }}</span>
              @if(count($news) > 0)
              <div class="single_post_content">
                <ul class="business_catgnav  nowow nofadeInDown">
                  <li class="big-look look">
                    <figure class="bsbig_fig"> 
                    	<div class="main-fig image">
  	                  	<a href="{{ route('index.post',['category' => $news[0]->getCategory->slug, 'chill_category' => $news[0]->getChillCategory->slug, 'slug' => $news[0]->slug ]) }}" class="featured_img"> 
  	                  		<img alt="" src = "{{ $news[0]->image }}" data-src="{{ $news[0]->image }}"> 
  	                  		<span class="overlay"></span> 
  	                  	</a>
                    	</div>	
                    	<div class="main-fig content">
                    	<figcaption> 
  	                    <a class="title" href="{{ route('index.post',['category' => $news[0]->getCategory->slug, 'chill_category' => $news[0]->getChillCategory->slug, 'slug' => $news[0]->slug ]) }}">
  	                        {{ $news[0]->title }}
  	                    </a> 
  	                </figcaption>
                      <p>{{ $news[0]->first_look}}</p>
                      </div>
                    </figure>
                  </li>
                  @foreach($news as $key=>$new)
                  @if($key>0)
                    <li class="small-look look">
                    <figure class="bsbig_fig"> 
                      <div class="main-fig content">
                      <figcaption> 
                        <a class="title" href="{{ route('index.post',['category' => $new->getCategory->slug, 'chill_category' => $new->getChillCategory->slug, 'slug' => $new->slug ]) }}">
                            {{ $new->title }}
                        </a> 
                    </figcaption>
                      <p>{{ $new->first_look}}</p>
                      </div>
                      <div class="main-fig image">
                        <a  href="{{ route('index.post',['category' => $new->getCategory->slug, 'chill_category' => $new->getChillCategory->slug, 'slug' => $new->slug ]) }}" class="featured_img"> 
                          <img alt="" src = "{{ $new->image }}" data-src="{{ $new->image }}"> 
                          <span class="overlay"></span> 
                        </a>
                      </div>  
                    </figure>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              {{ $news->links('client.templates.sections.paginate') }}
              @endif
            </div>
          </div>
        </div>
      </div>
      @include('client.templates.sections.right_section')
    </div>
</section>
@endsection