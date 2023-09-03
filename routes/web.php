<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\SocialProvidersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcomeRoute');


// Route::get('/news', function (){
// return "Soon you will see here a lot of NEWS!";
// });

Route::get('/news', [NewsController::class, 'index'])->name('newsList');

Route::get('/new/{id}', [NewsController::class, 'show'])->name('showOneNew');

Route::get('/categories', [CategoriesController::class, 'showCategories']);

Route::get('/categories/{cid}', [CategoriesController::class, 'showNewsByCategory']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/account', AccountController::class)->name('account');


    Route::group(['prefix' =>'admin', 'as' => 'admin.'], static function (){

    // Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.newsList');

    // Route::get('/news/create', [AdminNewsController::class, 'create'])->name('admin.create');


    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::get('/parser', AdminParserController::class)->name('parser');
    // Route::resource('/profile', AdminProfileController::class);



    //Route::resource('/categories', AdminCategoryController::class);

    Route::get('/new/{id}', [NewsController::class, 'adminshow'])->name('admin.showOneNew');

    Route::get('/', function () {
        return view('admin.adminIndex');
    });
    });
    
      

    // Route::get('/categories/create', [AdminCategoryController::class, 'create']);
    
 });

 Route::get('/categories', [CategoriesController::class, 'showCategories'])->name('admin.categoriesIndex');
 
// 

Route::group(['middleware' => 'guest'], function () {
    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social-providers.redirect');

    Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social-providers.callback');
});



 Route::any('/test', function(Request $request) {
    dd(app());
 });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
