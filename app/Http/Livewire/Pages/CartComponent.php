<?php

namespace App\Http\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increase($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('partials.cart-count','refreshComponent');
    }
    public function decrease($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('partials.cart-count','refreshComponent');
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('partials.cart-count','refreshComponent');
        session()->flash('message', 'one product has remove from cart');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('partials.cart-count','refreshComponent');
        session()->flash('message', 'products has been removed from cart successfully');
    }

    public function saveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate(Product::class);
        $this->emitTo('partials.cart-count','refreshComponent');
        session()->flash('message','Move product to save for later successfully');
    }
    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate(Product::class);
        $this->emitTo('partials.cart-count','refreshComponent');
        session()->flash('message','Move product to cart successfully');
    }
    public function removeSaveForLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('message','Remove product from save for later successfully');
    }
    public function render()
    {
        $cart_content = Cart::instance('cart')->content();
        $cart_count = Cart::instance('cart')->count();
        $cart_subtotal = Cart::instance('cart')->subtotal();
        $cart_tax = Cart::instance('cart')->tax();
        $cart_total = Cart::instance('cart')->total();
        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.pages.cart-component', [
            'cart_content' => $cart_content,
            'cart_count' => $cart_count,
            'cart_subtotal' => $cart_subtotal,
            'cart_tax' => $cart_tax,
            'cart_total' => $cart_total
        ])->layout('layouts.main');
    }
}
