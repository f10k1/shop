<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', ['products' => Product::orderBy('id', 'DESC')->simplePaginate(15)]);
    }

    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }


    public function showCreate()
    {
        return view('product.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'price' => ['required', 'decimal:2'],
            'quantity' => ['required', 'integer', 'min:0'],
            'is_bestseller' => ['nullable'],
            'description' => ['string', 'nullable'],
            'short_description' => ['string', 'nullable'],
            'thumb' => ['file', 'mimes:jpeg,jpg,png', 'nullable']
        ]);

        $attributes = array_filter($attributes, function ($attribute) {
            return !is_null($attribute);
        });

        if (array_key_exists('thumb', $attributes)) {
            Storage::put('', request()->file('thumb'));

            $attributes['thumb'] = request()->file('thumb')->hashName();
        }

        $product = Product::create($attributes);

        return redirect()->route('product', $product);
    }

    public function remove(Product $product)
    {
        $product->delete();

        return redirect()->route('product.all');
    }
}
