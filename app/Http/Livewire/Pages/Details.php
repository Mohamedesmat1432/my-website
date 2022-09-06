<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Details extends Component
{
    public $product_slug;
    public $qty;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
        $this->qty = 1;
    }
    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate(Product::class);
        $this->emitTo('partials.cart-count', 'refreshComponent');
        session()->flash('message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    public function increase()
    {
        $this->qty++;
    }
    public function decrease()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }
    public function render()
    {
        $product = Product::where('slug', $this->product_slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        // $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.pages.details', [
            'product' => $product,
            'popular_products' => $popular_products
        ])->layout('layouts.main');
    }
}
