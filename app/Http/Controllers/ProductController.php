<?php

namespace App\Http\Controllers;

use App\Models\{ Product, Unit };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with(['unit'])->get();
    }

    public function store(ProductRequest $request)
    {
        $request->merge([
            'isActive' => $request->isActive ? 1 : 0,
        ]);

        $product = Product::create($request->except(['photo']));

        if ($request->hasFile('photo')) {
            $s3 = Storage::disk('s3');

            $file = $s3->put('/files/products/'.$product->id, $request->photo, 'public'); // Uploading
            $fileUrl = $s3->url($file); // Get File URL

            $product->update([
                'photo' => $fileUrl
            ]);
        }

        return $product;
    }

    public function update($id)
    {
        $product = Product::find($id);
        return $product->update(Request::all());
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return $product->delete();
    }

    public function units()
    {
        return Unit::all();
    }
}
