<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Routing\UrlGenerator;

use App\Http\Controllers\indexController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\FbController;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\IndexController as ClientIndexController;

use App\Http\Controllers\Dashboard\NewsController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ChillCategoryController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\SourceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(env('APP_ENV') === 'production')
    URL::forceScheme('https');

Route::get('/crypto', function(){
	return redirect()->away('http://103.130.213.150:8081/');
})->name('home');

Route::get('/', [indexController::class,'index'])->name('home');
Route::get('/search', [indexController::class,'search'])->name('client.search');
Route::get('/category', [indexController::class,'category'])->name("index.category");

Route::group(['prefix'=>'tin-tuc'],function(){
	Route::get('/{category_slug}', [indexController::class,'category'])->name("index.category");
	Route::get('/{category_slug}/{chillCategory_slug}', [indexController::class,'chillCategory'])->name("index.chillCategory");
	Route::get('/{category}/{chill_category}/{slug}', [indexController::class,'post'])->name("index.post");
});

Route::group(['middleware'=>'auth','prefix'=>'account'],function(){
	Route::get('/detail', [AccountController::class,'accountDetail'])->name("client.account.detail");
	Route::get('/post', [AccountController::class,'accountDetail'])->name("client.account.post");
	Route::post('/update', [AccountController::class,'accountUpdate'])->name("client.account.update");
	Route::post('/pin', [AccountController::class,'pin'])->name('client.pinnew');
	Route::post('/unpin', [AccountController::class,'unpin'])->name('client.unpinnew');
});

Route::group(['prefix'=>'admin'],function(){
	Route::get('/login', [adminController::class,'login'])->name('admin.login');
	Route::post('/login', [adminController::class,'postLogin'])->name('admin.postLogin');
});

Route::group(['middleware'=>'staff','prefix'=>'dashboard'],function(){
	Route::get('/', [adminController::class,'index'])->name('admin.home');
	Route::get('/data/database', [adminController::class,'getDatabase'])->name('admin.CSDL');
	Route::group(['prefix'=>'news'],function(){
		Route::post('/get', [NewsController::class,'getNews'])->name('admin.database.news.get');
		Route::post('/add', [NewsController::class,'addNews'])->name('admin.database.news.add');
		Route::post('/edit', [NewsController::class,'editNews'])->name('admin.database.news.edit');
		Route::post('/delete', [NewsController::class,'deleteNews'])->name('admin.database.news.delete');
	});
	Route::group(['prefix'=>'categorys'],function(){
		Route::post('/get', [CategoryController::class,'getCategorys'])->name('admin.database.categorys.get');
		Route::post('/add', [CategoryController::class,'addCategorys'])->name('admin.database.categorys.add');
		Route::post('/edit', [CategoryController::class,'editCategorys'])->name('admin.database.categorys.edit');
		Route::post('/delete', [CategoryController::class,'deleteCategorys'])->name('admin.database.categorys.delete');
	});
	Route::group(['prefix'=>'chill_categorys'],function(){
		Route::post('/get', [ChillCategoryController::class,'getChillCategorys'])->name('admin.database.chill_categorys.get');
		Route::post('/add', [ChillCategoryController::class,'addChillCategorys'])->name('admin.database.chill_categorys.add');
		Route::post('/edit', [ChillCategoryController::class,'editChillCategorys'])->name('admin.database.chill_categorys.edit');
		Route::post('/delete', [ChillCategoryController::class,'deleteChillCategorys'])->name('admin.database.chill_categorys.delete');
	});
	Route::group(['prefix'=>'authors'],function(){
		Route::post('/get', [AuthorController::class,'getAuthors'])->name('admin.database.authors.get');
		Route::post('/add', [AuthorController::class,'addAuthors'])->name('admin.database.authors.add');
		Route::post('/edit', [AuthorController::class,'editAuthors'])->name('admin.database.authors.edit');
		Route::post('/delete', [AuthorController::class,'deleteAuthors'])->name('admin.database.authors.delete');
	});
	Route::group(['prefix'=>'sources'],function(){
		Route::post('/get', [SourceController::class,'getSources'])->name('admin.database.sources.get');
		Route::post('/add', [SourceController::class,'addSources'])->name('admin.database.sources.add');
		Route::post('/edit', [SourceController::class,'editSources'])->name('admin.database.sources.edit');
		Route::post('/delete', [SourceController::class,'deleteSources'])->name('admin.database.sources.delete');
	});
	Route::get('/api-dtb', [adminController::class,'getDTB'])->name('admin.database.get');
});

Route::group(['prefix'=>'auth'],function(){

	Route::get('/login', [ClientIndexController::class,'login'])->name("client.login");
	Route::post('/login', [ClientIndexController::class,'postLogin'])->name("client.postLogin");
	Route::post('/register', [ClientIndexController::class,'postRegister'])->name("client.postRegister");
	Route::get('/logout', [ClientIndexController::class,'logout'])->name("client.logout");

	Route::get('facebook', [FbController::class, 'redirectToFacebook'])->name('socialite.facebook.login');
	Route::get('facebook/callback', [FbController::class, 'facebookSignin'])->name('socialite.facebook.callback');

	Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('socialite.google.login');
	Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('socialite.google.callback');
});

//Route::get('/dashboard/getseed', [adminController::class,'getSeed']);
//Route::get('/craw', [apiController::class,'index']);
