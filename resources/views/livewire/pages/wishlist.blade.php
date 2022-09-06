<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop"> Shop</a>
                        <span>Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- start product wishlist-->
    <div class="container py-3">
        <div class="product-list">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            @if ($wishlist_count > 0)
            <div class="row justify-content-center">
                @foreach ($wishlist_items as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <div class="product-item">
                        <div class="pi-pic">
                            <a href="{{route('product.details',['product_slug'=>$item->model->slug])}}">
                                <img height="280" src="{{asset('img/products')}}/{{$item->model->img}}"
                                    alt="{{$item->model->img}}">
                            </a>
                            <div class="sale pp-sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt text-danger"
                                    wire:click.prevent="removeFromWishlist({{$item->model->id}})"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#"
                                        wire:click.prevent="moveToCart('{{$item->rowId}}')">Move
                                        to cart</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$item->model->category->name}}</div>
                            <a href="#">
                                <h5>{{$item->model->name}}</h5>
                            </a>
                            <div class="product-price">
                                ${{$item->model->regular_price}}
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-not-found">
                        no product
                    </div>
                </div>
            </div>
            @endif
            <hr>
        </div>
    </div>
    <!-- start product wishlist-->
</div>
