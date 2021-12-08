<?php

use App\Http\Controllers\SiteController;
use App\Models\Product;
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
    //$product = Product::find(1);
//    $data = [
//        'name'=> 'create product',
//        'price'=> 1000
//    ];
//    $product = Product::create($data);
//    dd($product);
//    $product = new Product();
//    $product->name = 'New name 12';
//    $product->price = 135;
//    $product->save();
    $list = Product::
    //where('status', true)
         where('price', '>', 10000)
         ->get();
    //dd($list);
    return view('main');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
