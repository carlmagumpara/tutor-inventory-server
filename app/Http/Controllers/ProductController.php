<?php

namespace App\Http\Controllers;
use \App\Models\Product;
use Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(){
        return Product::create(Request::all());
    }

    public function update($id){
        $product = Product::find($id);
        return $product->update(Request::all());
    }

    public function show($id){
        $product = Product::find($id);
        return $product;
    }

    public function delete($id){
        $product = Product::find($id);
        return $product->delete();
    }


}
