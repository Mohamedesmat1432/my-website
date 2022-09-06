<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CategoryComponent extends Component
{
    // protected $paginationTheme = 'bootstrap';
    public $sorting;
    public $page_size;

    public $category_slug;
    public $min_price;
    public $max_price;
    public function mount($category_slug)
    {
        $this->sorting = 'default';
        $this->page_size = 8;
        $this->min_price = 10;
        $this->max_price = 400;
        $this->category_slug = $category_slug;
    }
    public function addToCart($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        $this->emitTo('partials.cart-count','refreshComponent');
        session()->flash('message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate(Product::class);
        $this->emitTo('partials.wishlist-count','refreshComponent');
    }
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wish_item){
            if($wish_item->id == $product_id){
                Cart::instance('wishlist')->remove($wish_item->rowId);
                $this->emitTo('partials.wishlist-count','refreshComponent');
                return;
            }
        }
    }
    use WithPagination;
    public function render()
    {
        $wishlist_items = Cart::instance('wishlist')->content()->pluck('id');
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if ($this->sorting == 'date') {
            $products = Product::where('category_id',$category_id)->orderBy('created_at', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-asc') {
            $products = Product::where('category_id',$category_id)->orderBy('regular_price', 'ASC')->paginate($this->page_size);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::where('category_id',$category_id)->orderBy('regular_price', 'DESC')->paginate($this->page_size);
        } else {
            $products = Product::where('category_id',$category_id)->orderBy('created_at', 'DESC')->paginate($this->page_size);
        }
        $categories = Category::all();
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.pages.category-component', [
            'categories' => $categories,
            'products' => $products,
            'category_name' => $category_name,
            'wishlist_items' => $wishlist_items
        ])->layout('layouts.main');
    }
}
