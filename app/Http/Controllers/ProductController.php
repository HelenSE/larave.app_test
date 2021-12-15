<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        $product = Product::findOrFail($id);
        $products = Product::all();
        return view('product.product', [
            'product' => $product,
            'products' => $products,

        ]);
    }

    public function catalog()
    {
        $products = Product::where('status', 1)
            ->paginate(9);
            ->simplePaginate(9);
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.catalog', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }


}


