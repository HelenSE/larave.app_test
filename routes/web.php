<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAuth;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('main');
});

Route::get('admin', function (){
    return view('admin.index');
});

;

Route::middleware(['auth', 'ololo'])->prefix('admin')->name('admin.')
    ->group(function(){
    Route::resources([
        'brand'=> BrandController::class,
        'category' => CategoryController::class,
        'product' => \App\Http\Controllers\Admin\ProductController::class
    ]);
});

Route::resource('brand', BrandController::class)
    ->except(['destroy']);
Route::resource('category', CategoryController::class);
Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);

Route::get('show-form', [FormController::class, 'showForm'])->name('showForm');
Route::post('show-form', [FormController::class, 'postForm'])->name('namePostForm');


Route::get('product/{id}', [ProductController::class, 'index'])->name('show-product');
Route::get('catalog', [ProductController::class, 'catalog'])->name('catalog');

//Route::get('catalog', function () {
//    return view('store');
//})->name('dfsljhflk');

//Route::get('product', function () {
//    return view('product');
//});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
