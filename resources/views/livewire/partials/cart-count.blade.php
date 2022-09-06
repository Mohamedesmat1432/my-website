<li class="cart-icon">
    <a href="/cart" class="toggle-cart">
        <b>Cart</b>
        <i class="icon_bag_alt"></i>
        @if ($cart_count > 0)
        <span>{{$cart_count}}</span>
        @else
        <span>0</span>
        @endif
    </a>
</li>
{{-- <li class="cart-price">${{$cart_total}}</li> --}}
