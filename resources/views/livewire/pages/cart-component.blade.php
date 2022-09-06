@section('title','Cart')
<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cart_count > 0)
                                @foreach ($cart_content as $item)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <a href="{{route('product.details',['product_slug'=>$item->model->slug])}}">
                                            <img height="80px" src="{{asset('img/products')}}/{{$item->model->img}}"
                                            alt="{{$item->model->img}}">
                                        </a>
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5>{{$item->model->name}}</h5>
                                    </td>
                                    <td class="p-price first-row">${{$item->model->regular_price}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="product-qty">
                                                <i class="fa fa-plus-circle"
                                                    wire:click.prevent="increase('{{$item->rowId}}')"></i>
                                                <input type="text" value="{{$item->qty}}">
                                                <i class="fa fa-minus-circle"
                                                    wire:click.prevent="decrease('{{$item->rowId}}')"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{$item->subtotal()}}</td>
                                    <td class="close-td first-row"><i class="ti-close"
                                            wire:click.prevent="destroy('{{$item->rowId}}')"></i></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>no product</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>${{$cart_subtotal}}</span></li>
                                    <li class="subtotal">Tax <span>${{$cart_tax}}</span></li>
                                    <li class="cart-total">Total <span>${{$cart_total}}</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</div>

