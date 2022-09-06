<div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container-fluid">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        mohamedesmat1432@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +02 01153447675
                    </div>
                </div>
                <div class="ht-right">
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{asset('img/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">
                                English</option>
                            <option value='yu' data-image="{{asset('img/flag-1.jpg')}}" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{asset('img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        @livewire('partials.header-search')
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            @livewire('partials.wishlist-count')
                            @livewire('partials.cart-count')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All categories</span>
                        <ul class="depart-hover">
                            @foreach ($categories as $category)
                            <li class="{{request()->is('product-category/'.$category->slug) ? 'active' : ''}}"><a
                                    href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{request()->is('/') ? 'active' : ''}}"><a href="/">{{__('trans.Home')}}</a></li>
                        <li class="{{request()->is('shop') ? 'active' : ''}}"><a href="/shop">{{__('trans.Shop')}}</a></li>
                        <li><a href="./blog.html">Blog</a></li>
                        <li class="{{request()->is('contact') ? 'active' : ''}}"><a href="/contact">Contact</a></li>
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->user_type === 'ADMIN')
                                <li><a href="#"> {{Auth::user()->name}} <i class="fa fa-user-circle"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
                                        <li><a href="{{route('admin.category')}}">Admin Category</a></li>
                                        <li><a href="{{route('admin.product')}}">Admin Product</a></li>
                                        <li>
                                            <form id="logout" action="{{route('logout')}}" method="POST">
                                                @csrf
                                            </form>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                                <i class="fa fa-arrow-right"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @else
                                <li><a href="#"> {{Auth::user()->name}} <i class="fa fa-user"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('user.dashboard')}}">User Dashboard</a></li>
                                        <li>
                                            <form id="logout" action="{{route('logout')}}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                                <i class="fa fa-arrow-right"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            @else
                                <li><a class="{{request()->is(route('login')) ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
                                <li><a class="{{request()->is(route('register')) ? 'active' : ''}}" href="{{route('register')}}">Register</a></li>
                            @endif
                        @endif
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

</div>

