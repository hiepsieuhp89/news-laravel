<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;

use App\Models\Categorys;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') === 'production')
            URL::forceScheme('https');

        View::composer('client.*',function($view){
            $categorys = Categorys::all();
            $popular_news = News::where('hot',1)->inRandomOrder()->take(5)->get();
            $i = 0;
            foreach ($categorys as $category) {
                $newest_news[$i++] = News::where('category',$category->id)->first();
            }
            $data = ['categorys'=>$categorys,'newest_news'=>$newest_news,'popular_news'=>$popular_news];
            return $view->with($data);
        });   
         View::composer('client.templates.header',function($view){
            $quick = News::take(6)->inRandomOrder()->get();
            return $view->with(['quick_news'=>$quick]);
        });   
    }
}
