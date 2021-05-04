<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;
use App\Models\Categorys;
use App\Models\ChillCategorys;
use App\Models\News;

class indexController extends Controller
{
    public function index(){
    	$star_news = News::where('category',1)->take(6)->orderby('id','DESC')->get();
        $social = News::where('category',6)->take(6)->orderby('id','DESC')->get();
        $musik = News::where('category',4)->take(6)->orderby('id','DESC')->get();
        $news = [
            "Star" => $star_news,
            "Xã hội" => $social,
            "Musik" => $musik,
        ];
        //dd($news);
        $hotnew = News::where('hot',1)->inRandomOrder()->get();
    	$data = [
    		'news_collections' => $news,
            'hotnew' => $hotnew,
    	];
    	return view("client.index",$data);
    }
    public function search(Request $req){
        //$news = News::search('Sơn Tùng')->get();
        //dd($news);
        $news = News::where('title','LIKE','%'.$req->keysearch.'%')->orwhere('slug','LIKE','%'.$req->keysearch.'%')->orwhere('first_look','LIKE','%'.$req->keysearch.'%')->paginate(10);
        $data = [
            'news' => $news,
        ];
        return view("client.search",$data);
    }
    public function category($category_slug){
        $category = Categorys::where('slug',trim($category_slug))->first();
        $news = News::where('category',$category->id)->orderby('id','DESC')->paginate(10);
        $data = [
            'news' => $news,
            'category' => $category,
        ];
        //dd($news->links());
        return view("client.category",$data);
    }
    public function chillCategory($category_slug,$chillCategory_slug){
        $chillCategory = ChillCategorys::where('slug',$chillCategory_slug)->first();
        $news = News::where('chill_category',$chillCategory->id)->orderby('id','DESC')->paginate(10);
        $data = [
            'news' => $news,
            'chillCategory' => $chillCategory,
        ];
        return view("client.chillCategory",$data);
    }
    public function post($category,$chill_category,$slug){
    	$data = ['new' => News::where('slug',$slug)->first()];
    	return view("client.reading",$data);
    }
}
