<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product){
        $related_products = Product::whereHas('category', function($query) use ($product){
            $query->whereId($product->category_id);
        })
        ->where('id', '<>', $product->id)
        ->inRandomOrder()
        ->take(4)
        ->get(['id', 'name', 'slug', 'price']);

        return view('frontend.product.show', compact('product', 'related_products'));
    }
}
