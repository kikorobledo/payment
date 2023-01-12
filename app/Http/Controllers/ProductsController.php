<?php

namespace App\Http\Controllers;

use Stripe\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $products = Products::paginate(9);

        return view('welcome', compact('products'));
    }

    public function pay(Products $product){

        return view('products.pay', compact('product'));

    }
}
