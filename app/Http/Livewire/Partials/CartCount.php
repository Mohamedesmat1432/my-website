<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartCount extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        $cart_count = Cart::instance('cart')->count();
        $cart_total = Cart::instance('cart')->total();
        return view('livewire.partials.cart-count',['cart_count'=>$cart_count,'cart_total'=>$cart_total]);
    }
}
