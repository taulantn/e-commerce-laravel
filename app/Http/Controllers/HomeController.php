<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){

        $products = Product::with('category')->get(['id', 'name', 'price', 'slug']);

        return view('frontend.homepage', compact('products'));
    }
}
