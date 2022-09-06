<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Wishlist extends Component
{
    public function removeFromWishlist($item_id)
    {
        foreach(Cart::instance('wishlist')->content() as $item){
            if($item->id == $item_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('partials.wishlist-count','refreshComponent');
                return;
            }
        }
    }
    public function moveToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate(Product::class);
        $this->emitTo('partials.wishlist-count','refreshComponent');
        $this->emitTo('partials.cart-count','refreshComponent');

    }
    public function render()
    {
        $wishlist_items = Cart::instance('wishlist')->content();
        $wishlist_count = Cart::instance('wishlist')->count();
        return view('livewire.pages.wishlist',[
            'wishlist_items' => $wishlist_items,
            'wishlist_count' => $wishlist_count
        ])->layout('layouts.main');
    }
}
