<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Shop extends Component
{
    // protected $paginationTheme = 'bootstrap';
    public $sorting;
    public $page_size;
    public $min_price;
    public $max_price;
    public function mount()
    {
        $this->sorting = 'default';
        $this->page_size = 8;
        $this->min_price = 10;
        $this->max_price = 400;
    }
    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        $this->emitTo('partials.cart-count', 'refreshComponent');
        session()->flash('message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        $this->emitTo('partials.wishlist-count', 'refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item) {
            if ($item->id == $product_id) {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('partials.wishlist-count', 'refreshComponent');
                return;
            }
        }
    }
    use WithPagination;
    public function render()
    {
        $categories = Category::all();
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        if ($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-asc') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->page_size);
        } else {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->page_size);
        }
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.pages.shop', [
            'categories' => $categories,
            'products' => $products,
            'wishlist_items' => $wishlist_items
        ])->layout('layouts.main');
    }
}
