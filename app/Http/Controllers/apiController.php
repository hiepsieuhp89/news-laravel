<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Models\Categorys;
use App\Models\ChillCategorys;

//simplehtmldom is a script that we use to get content of a website through an url
include(app_path().'\Http\PlugIn\simplehtmldom_1_9_1\simple_html_dom.php');
include(app_path().'\Http\PlugIn\slugify.php');
//

class apiController extends Controller
{
    public function film(){
        $url = "https://tuoitre.vn/danh-bom-lieu-chet-kinh-hoang-mot-nha-tho-cong-giao-o-indonesia-20210328123002811.htm";
        $html = file_get_html($url);
        $main = $html->find('h1.article-title')[0]->plaintext;
        $detail = $html->find('#main-detail-body')[0]->find('p');
        foreach($detail as $value){
            echo $value->plaintext;
        }
    }
	//public static $news_ex = ['Video','Góc nhìn','Hài','Ý kiến',];
    public static $news_ex = ['Media','Công nghệ','Du lịch',];
	public function check($i){
		$news_ex = ['Trang chủ','Beauty & Fashion','Ăn - Quẩy - Đi','Xem Mua Luôn','Media','Công nghệ','Du lịch',];
		if(in_array($i,$news_ex)) 
            return false;
		return true;
	}
    public function index(){
    	$this->craw_news();
    }
    public function craw_news(){
    	//$this->menu();
    	//$this->craw_single_category();
    	$this->craw_chill_category();
        //$this->craw_hot_news();
    }
    public function menu(){
        // trang web để cào menu
        $html = file_get_html('https://kenh14.vn');
        $menus = $html->find('#k14-main-menu-wrapper')[0]->find('ul.kbh-menu-list')[0]->find('li');
        $i = 0;

        //mỗi menu ta cào tên và url
        foreach($menus as $key){
            $title = $key->find('a')[0]->getAttribute('title');

            if($this->check($title) && $title){
                    $url =  'https://kenh14.vn'.$key->find('a')[0]->getAttribute('href');
                    $categoryid = DB::table('categorys')->insertgetId([
                        'name' => $key->find('a')[0]->getAttribute('title'),
                        'slug' => slugify($key->find('a')[0]->getAttribute('title')),
                        'dataid' => 0,
                        'url' => $url,
                    ]);
                $i++;
            }
            if($i == 7) break;
        }
    }
    public function craw_single_category(){
        //cào các menu con của từng menu cha
    	$urls = Categorys::select('id','url')->get();

        //mỗi menu con ta lấy tên và url
    	foreach($urls as $url){
    		$html = file_get_html($url->url);
    		if(isset($html->find('div.kbw-submenu')[0])){

    			$chill_categorys = $html->find('div.kbw-submenu')[0]->find('div.w1040.clearfix ul li');

    			foreach($chill_categorys as $key){
                    if($key->getAttribute('class') != 'kbwsli fr'){
                        $title = $key->find('a')[0]->getAttribute('title');

                        if($this->check($title) && trim($title) != ''){
                                $chillcateid = DB::table('chill_categorys')->insertgetId([
                                'categoryId' => $url->id,
                                'name' => $title,
                                'url' => 'https://kenh14.vn'.$key->find('a')[0]->getAttribute('href'),
                                'slug' => slugify($title),
                            ]);
                        }
                    }
    			}
	    		
	    	}
    	}
    }
    public function craw_chill_category(){
        //mỗi menu con ta cào các bài viết
    	$ChillCategorys = ChillCategorys::where('id','>',0)->get();

        //mỗi bài viết ta cào chi tiết bài viết
    	foreach($ChillCategorys as $ChillCategory){
    		$html = file_get_html($ChillCategory->url);

	    	if(isset($html->find('ul.knsw-list')[0])){

	    		$posts = $html->find('ul.knsw-list')[0]->find('li');

	    		foreach($posts as $key){
                    if( isset($key->find('div.knswli-left a')[0]) ){
                        $url = 'https://kenh14.vn'.$key->find('div.knswli-left a')[0]->href;

                        $post_banner_img = $key->find('div.knswli-left a')[0]->getAttribute('style');

                            //lấy độ dài đoạn cần cắt
                        $part_cut = strlen('background-image:url("');

                            //cắt url ảnh
                        $post_banner_img = substr( $post_banner_img, $part_cut , strpos($post_banner_img,'")') - $part_cut);

                            //cào bài viết cụ thể khi biết url
                        $this->craw_single_page($url,$ChillCategory->category->id,$ChillCategory->id,0,$post_banner_img);
                    }
	    		}
	    	}
    	}
    }
    public function craw_single_page($url,$categoryid,$chillcateid,$is_hot,$banner_img){

    	$html = file_get_html($url);
        //neu la bai viet thuong
    	if( isset($html->find('div.kbwc-body div.kbwcb-left-wrapper')[0]) ){
            $des = '|';
            $images = '|';
            $image = '|';
            $title = '';
    		$main = $html->find('div.kbwc-body div.kbwcb-left-wrapper')[0];

            $first_look = $main->find('.knc-sapo')[0]->plaintext;

            //cào các thẻ picture chứa ảnh
            $picture = $main->find('.klw-body-top .klw-new-content div.knc-content')[0]->find('.VCSortableInPreviewMode');

            //cào tiêu đề 
            $title .= $main->find('div.kbwc-header .kbwc-title')[0]->plaintext;
            //cào văn bản
            $para = $main->find('.klw-body-top .klw-new-content div.knc-content')[0]->find('p');
            $des = '';
            $string_para = [];
            $para_id = 0;
            $string_img = '';
            foreach($para as $key){
                if($key->parent()->getAttribute('class') != 'PhotoCMS_Caption')
                    $string_para[$para_id++] = '<p>' . $this->format_text($key->plaintext) . '</p>';
            }
            foreach($picture as $key){
                $cap = isset($key->find('.PhotoCMS_Caption p')[0])?$this->format_text($key->find('.PhotoCMS_Caption p')[0]->plaintext):"Nguồn ảnh: kênh 14";
                if(isset($key->find('img')[0]))
                    $string_img .= '<figure class="image video"><img src="'.$key->find('img')[0]->getAttribute('src').'" ><figcaption class="caption">'. $cap .'</figcaption></figure>';
                if(isset($key->find('video')[0]))
                    $string_img .= '<figure class="image video"><video loop="loop" preload="auto" src="'.$key->find('video')[0]->getAttribute('src').'" ></video><div class="caption">'. $cap .'</figcaption></figure>';          
            }
            for($i = 0;$i < $para_id - 1;$i++){
                $des .= $string_para[$i];
            }
            $des .= $string_img;
            $des .= $string_para[$para_id - 1];

            //insert vào database
    	    DB::table('news')->insert([
	    		'title' => trim($title),
                'category' => $categoryid,
	    		'chill_category' => $chillcateid,
                'first_look' => trim($first_look),
	    		'description' => $des,
	    		'source' => 1,
                'author' => 1,
	    		'image' => $banner_img,
	    		'images' => $images,
	    		'slug' => slugify($title),
                'hot' => $is_hot,
	    	]);
            return 0;
    	}
    }
    public function craw_hot_news(){
        $ChillCategorys = ChillCategorys::select('id','url')->where('id','>',0)->get();
        foreach($ChillCategorys as $ChillCategory){
            $html = file_get_html($ChillCategory->url);
            if(isset($html->find('article.item-news')[0])){
                $url = $html->find('article.item-news a')[0]->getAttribute('href');
                $this->craw_single_page($url,$ChillCategory->id,1);
            }
        }
    }
    public function format_text($string){
        return trim(html_entity_decode($string));
    }
}
