<?php

namespace App\Http\Livewire\Partials;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistCount extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        $wishlist_count = Cart::instance('wishlist')->count();
        return view('livewire.partials.wishlist-count',['wishlist_count' => $wishlist_count]);
    }
}
