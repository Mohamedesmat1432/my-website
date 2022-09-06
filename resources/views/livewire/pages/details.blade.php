@section('title','Details')
<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- Details Section Begin -->
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('product.details',['product_slug'=>$product->slug])}}">
                    <img src="{{asset('img/products')}}/{{$product->img}}" alt="{{$product->img}}">
                </a>
            </div>
            <div class="col-md-6">
                <h2>{{$product->name}}</h2>
                <span>{{$product->category->name}}</span>
                <p>{{$product->description}}</p>
                <div class="mb-3">
                    <div class="quantity">
                        <div class="product-qty">
                            <i class="fa fa-plus-circle" wire:click.prevent="increase()"></i>
                            <input type="text" wire:model="qty">
                            <i class="fa fa-minus-circle" wire:click.prevent="decrease()"></i>
                        </div>
                    </div>
                </div>
                <div class="float-right bg-light" style="line-height: 46px;">
                    <span class="p-2">${{$product->regular_price}}</span>
                </div>
                <button href="#"
                    wire:click.prevent="addToCart({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"
                    class="site-btn float-left">
                    Add to cart
                </button>
            </div>
        </div>
    </div>
    <!-- Details Section Begin -->
</div>
