
<span>DB::table("categorys")->insert([</span><br>
@foreach($categorys as $value)
<span>[</span><br>
<span>'name' => '{{ $value->name }}',</span><br>
<span>'slug' => '{{ $value->slug }}',</span><br>
<span>'dataid' => '{{ $value->dataid }}',</span><br>
<span>'url' => '{{ $value->url }}',</span><br>
<span>],</span><br>
@endforeach
<span>]);</span><br>

<span>DB::table("chill_categorys")->insert([</span><br>
@foreach($chill_categorys as $value)
<span>[</span><br>
<span>'categoryId' => '{{ $value->categoryId }}',</span><br>
<span>'name' => '{{ $value->name }}',</span><br>
<span>'slug' => '{{ $value->slug }}',</span><br>
<span>'dataid' => '{{ $value->dataid }}',</span><br>
<span>'url' => '{{ $value->url }}',</span><br>
<span>],</span><br>
@endforeach
<span>]);</span><br>

<span>DB::table("authors")->insert([</span><br>
@foreach($authors as $value)
<span>[</span><br>
<span>'name' => '{{ $value->name }}',</span><br>
<span>'url' => '{{ $value->url }}',</span><br>
<span>],</span><br>
@endforeach
<span>]);</span><br>

<span>DB::table("sources")->insert([</span><br>
@foreach($sources as $value)
<span>[</span><br>
<span>'name' => '{{ $value->name }}',</span><br>
<span>'slug' => '{{ $value->slug }}',</span><br>
<span>'url' => '{{ $value->url }}',</span><br>
<span>],</span><br>
@endforeach
<span>]);</span><br>

<span>DB::table("news")->insert([</span><br>
@foreach($news as $value)
<span>[</span><br>
<span>'title' => '{{ str_replace('\'','\\\'',$value->title) }}',</span><br>
<span>'category' => '{{ str_replace('\'','\\\'',$value->category) }}',</span><br>
<span>'chill_category' => '{{ str_replace('\'','\\\'',$value->chill_category) }}',</span><br>
<span>'author' => '{{ str_replace('\'','\\\'',$value->author) }}',</span><br>
<span>'source' => '{{ str_replace('\'','\\\'',$value->source) }}',</span><br>
<span>'image' => '{{ str_replace('\'','\\\'',$value->image) }}',</span><br>
<span>'source' => '{{ str_replace('\'','\\\'',$value->source) }}',</span><br>
<span>'first_look' => '{{ str_replace('\'','\\\'',$value->first_look) }}',</span><br>
<span>'description' => '{{ str_replace('\'','\\\'',$value->description) }}',</span><br>
<span>'slug' => '{{ str_replace('\'','\\\'',$value->slug) }}',</span><br>
<span>'hot' => '{{ str_replace('\'','\\\'',$value->hot) }}',</span><br>
<span>],</span><br>
@endforeach
<span>]);</span><br>

