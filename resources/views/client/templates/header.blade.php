<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container body">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 desktop-nav">
        <div class="header_top">
          <div class="header_top_left">
            <!--
            <ul class="top_nav">
              <li><a href="#">Giới thiệu</a></li>
              <li><a href="pages/contact.html">Liên hệ</a></li>
            </ul>
          -->
          </div>
          <div class="header_top_right">
            @if(!Auth::check())
            <a href="{{ route('client.login') }}">
              <div class="login">
              <i class="fas fa-user"></i>
            </div>
            </a>
            @else
            <div class="dropdown account_detail_dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Xin chào {{ Auth::user()->name }}
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="z-index: 10000">
                <li><a href="{{ route('client.account.post') }}?section=pinnednews"><i class="fas fa-heart"></i>&ensp;Yêu thích</a></li>
                <li><a href="{{ route('client.account.detail') }}?section=detail"><i class="fas fa-user"></i>&ensp;Thông tin tài khoản</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route("client.logout") }}"><i class="fas fa-sign-out-alt"></i>&ensp;đăng xuất</a></li>
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 desktop-nav">
        <div class="header_bottom">
          <div class="logo_area">
            <a style="display: flex;" href="{{ route('home') }}" class="logo d-flex">
              <img src="logo.png" alt="">
              <div style="margin: auto 0;">VnPoint</div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <section id="navArea_mobile" style="padding: 0 30px 10px 30px;">
          <nav class="mnb navbar navbar-default navbar-fixed-top">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <div class="nav-slide-menu">
                          <a href="javascript::void(0);" id="msbo"><i class="ic fa fa-bars"></i></a>
                      </div>
                      <div class="account_area header_top_right" style="width: 50%;">
                        @if(!Auth::check())
                        <a href="{{ route('client.login') }}" title="Đăng nhập">
                          <div class="login">
                          <i class="fas fa-user"></i>
                         </div>
                        </a>
                        @else
                        <div class="dropdown account_detail_dropdown">
                          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Xin chào {{ Auth::user()->name }}
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="z-index: 6000">
                            <li><a href="{{ route('client.account.post') }}?section=pinnednews"><i class="fas fa-heart"></i>&ensp;Yêu thích</a></li>
                            <li><a href="{{ route('client.account.detail') }}?section=detail"><i class="fas fa-user"></i>&ensp;Thông tin tài khoản</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route("client.logout") }}"><i class="fas fa-sign-out-alt"></i>&ensp;đăng xuất</a></li>
                          </ul>
                        </div>
                        @endif
                      </div>
                  </div>
              </div>
          </nav>
          <div class="msb" id="msb">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <div class="logo_area" style="padding: 10px;height: fit-content;">
                              <a style="display: flex;" href="{{ route('home') }}" class="logo d-flex">
                                <img src="logo.png" alt="">
                                <div style="margin: auto 0;">VnPoint</div>
                              </a>
                            </div>
                            <form class="navbar-form navbar-right" action="{{ route('client.search') }}" method="get">
                            @csrf
                            <div class="input-group">
                              <input type="text" class="form-control" name="keysearch" placeholder="Nhập để tìm kiếm">
                              <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                  <i class="glyphicon glyphicon-search"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                      @foreach($categorys as $category)
                        <li class="panel panel-default" id="dropdown">
                            <a class="strong" data-toggle="collapse" href="#category{{$category->id}}">{{ $category->name }}<span class="caret"></span>
                            </a>
                            <!-- Dropdown level 1 -->
                            @if(count($category->chillCategorys) > 0)
                            <div id="category{{$category->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav">
                                        @foreach($category->chillCategorys as $chillCategory)
                                          <li><a href="{{ route('index.chillCategory',['category_slug'=>$category->slug,'chillCategory_slug' => $chillCategory->slug]) }}">{{ $chillCategory->name }}</a></li>
                                        @endforeach
                                        <!-- Dropdown level 2 -->
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
          </div>
        </section>
        <section id="navArea" style="padding: 0 30px 10px 30px;">
          <nav class="navbar navbar-inverse" role="navigation" style="z-index: 1500">
            <div class="navbar-header">
              <form class="hidden" style="height: 20px;" class="navbar-form navbar-right" action="{{ route('client.search') }}" method="get">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" name="keysearch" placeholder="Nhập để tìm kiếm">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav main_nav mr-auto">
                <li class="active"><a href="{{ route('home') }}"><span class="fa fa-home desktop-home"></span><span class="mobile-show"></span></a></li>
                @foreach($categorys as $category)
                  <li class="dropdown"><a href="{{ route('index.category',['category_slug'=>$category->slug]) }}">{{ $category->name }}</a>
                    @if(count($category->chillCategorys) > 0)
                      <ul class="dropdown-menu" role="menu">
                          @foreach($category->chillCategorys as $chillCategory)
                            <li><a href="{{ route('index.chillCategory',['category_slug'=>$category->slug,'chillCategory_slug' => $chillCategory->slug]) }}">{{ $chillCategory->name }}</a></li>
                          @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
              <form style="height: 20px;" class="navbar-form navbar-right" action="{{ route('client.search') }}" method="get">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" name="keysearch" placeholder="Nhập để tìm kiếm">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </nav>
        </section>  
      </div>
    </div>
  </header>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"><span>Tin ngẫu nhiên</span>
          <ul id="ticker01" class="news_sticker">
            @foreach($quick_news as $new)
            <li>
              <a href="{{ route('index.post',['category'=>$new->getCategory->slug,'chill_category'=>$new->getChillCategory->slug,'slug'=>$new->slug]) }}">
              {{$new->title}}
                <img src="{{ $new->image }}" alt="">
              </a>
            </li>
            @endforeach
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="https://www.facebook.com/paipaithereallife"></a></li>
              <li class="youtube"><a href="https://www.youtube.com/"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>