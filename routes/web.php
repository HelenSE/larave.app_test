<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAuth;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('cart',[CartController::class, 'index']);
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('admin', function (){
    return view('admin.index');
});


Route::get('product', function () {
    return view('product');
=======
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

Route::get('test-file', function (){
          $brand = \App\Models\Brand::query()->find(1);
          dump($brand->products()->where('price', '>', 1000)->get());
//        $products = \App\Models\Product::where('id', '<', '5')->with('brand')->get();
//        foreach ($products as $product){
//            dump($product->brand);
//        }
//    Storage::disk('public')->put('ololo/2.txt', 'ololol');
//    $file = Storage::get('ololo/2.txt');
//    Storage::prepend('ololo/2.txt', '15465465');
//    Storage::append('ololo/2.txt', '123549');
//    //dump(Storage::path('ololo/2.txt'));
//    //dump(Storage::disk('public')->url('ololo/2.txt'));
});

//Route::get('catalog', function () {
//    return view('store');
//})->name('dfsljhflk');

//Route::get('product', function () {
//    return view('product');
//});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
