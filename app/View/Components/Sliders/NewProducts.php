<?php

namespace App\View\Components\Sliders;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sliders.new-products', ['products' => Product::orderBy('id', 'DESC')->cursor()->filter(function ($product) {
            return $product->isNew();
        })->take(10)]);
    }
}
