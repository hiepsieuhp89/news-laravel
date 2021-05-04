<h2><span>Tin phổ biến</span></h2>
            <ul class="spost_nav">
              @foreach($popular_news as $new)
                <li>
                  <div class="media"> 
                    <a href="{{ route('index.post',['category'=>$new->getCategory->slug,'chill_category'=>$new->getChillCategory->slug,'slug'=>$new->slug]) }}" class="media-left"> 
                      <img alt="" src="{{ $new->image }}"> 
                    </a>
                    <div class="media-body"> 
                      <a href="{{ route('index.post',['category'=>$new->getCategory->slug,'chill_category'=>$new->getChillCategory->slug,'slug'=>$new->slug]) }}" class="catg_title">
                        {{ $new->title }}
                      </a> 
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>