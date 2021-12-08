<?php

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
    $data = [
        'name'=> 'first category',
        'price'=> 1
    ];
    $category = Category::create($data);

    $secondCategory = new Category();
    $secondCategory->name = 'test category';
    $secondCategory->status = 0;
    $secondCategory->save();

    return view('main');
});

Route::get('store', function () {
    return view('store');
});

Route::get('product', function () {
    return view('store');
});

Route::get('hello', [SiteController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
