<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.products');
    }

    public function products()
    {
        if (request()->input('search')) {
            $attribute = request()->validate([
                'search' => ['min:4', 'max:256'],
            ]);

            $products = Product::orderBy('id', 'DESC')->where('name', 'like', '%' . $attribute['search'] . '%')->simplePaginate(15);
        } else {
            $products = Product::orderBy('id', 'DESC')->simplePaginate(15);
        }

        return view('user.admin.products', ['products' => $products]);
    }
}
