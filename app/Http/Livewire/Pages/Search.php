<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class Search extends Component
{
    // protected $paginationTheme = 'bootstrap';
    public $sorting;
    public $page_size;
    public $search;
    public $product_cat;
    public $product_cat_id;
    // public $min_price;
    // public $max_price;
    public function mount()
    {
        $this->sorting = 'default';
        $this->page_size = 8;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));
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
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-asc') {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('regular_price', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('regular_price', 'DESC')->paginate($this->page_size);
        } else {
            $products = Product::where('category_id', 'like', '%' . $this->product_cat_id . '%')->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'DESC')->paginate($this->page_size);
        }
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.pages.search', [
            'categories' => $categories,
            'products' => $products,
            'wishlist_items' => $wishlist_items
        ])->layout('layouts.main');
    }
}
