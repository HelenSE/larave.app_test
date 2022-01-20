<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request ){
        $cart= Session::get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::query()
            ->whereIn('id', $productIds)
            ->get();
        dump($products);
//        $request->session()->push('test', 'aslkdjalsh');
//        $request->session()->put('dsfsfsf', [1,3,5]);
//        dump($request->session()->get('test'));
    }

    public function addToCart(Request $request ){
        $productId = $request->get('product_id');
        session()->increment('cart.'.$request->get('product_id'));
        dump($productId);

    }
}
