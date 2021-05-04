<h2><span>Tin mới</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              @foreach($newest_news as $new)
                @if(isset($new))
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
                @endif
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
