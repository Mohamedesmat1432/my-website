<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('admin.product')}}"> All products</a>
                        <span>Create product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- start admin create category-->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        @if (Session::has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="#" method="POST" wire:submit.prevent="createProduct" enctype="multipart/form-data">
                            @csrf
                            <div class="group-input">
                                <label for="name">Product name *</label>
                                <input type="text" id="name" wire:model="name" wire:keyup="generateSlug" placeholder="Enter your product name" required autofocus />
                                @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="slug">Product slug *</label>
                                <input type="text" id="slug" wire:model="slug" placeholder="Enter your product slug" required />
                                @error('slug') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="description">Product description *</label>
                                <textarea type="text" id="desc" wire:model="description" placeholder="Enter your product description" required></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="regular_price">Product reg-price *</label>
                                <input type="text" id="desc" wire:model="regular_price" placeholder="Enter your product regular price" required />
                                @error('regular_price') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="sale_price">Product sale-price *</label>
                                <input type="text" id="sale_price" wire:model="sale_price" placeholder="Enter your product sale price" required />
                                @error('sale_price') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="qty">Product quantity *</label>
                                <input type="text" id="qty" wire:model="qty" placeholder="Enter your product quantity" required />
                                @error('qty') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="qty">Product Image *</label>
                                <input type="file" id="img" wire:model="img" />
                                @error('img') <span class="text-danger">{{ $message }}</span>  @enderror
                                @if($img)
                                <img src="{{$img->temporaryUrl()}}" alt="" width="80"/>
                                @endif
                            </div>
                            <div class="group-input">
                                <label for="qty">Product stock *</label>
                                <select id="stock" wire:model="stock">
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                                @error('stock') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="featured">Product featured *</label>
                                <select id="featured" wire:model="stock">
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                                @error('featured') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="category_id">Product category-id *</label>
                                <select id="category_id" wire:model="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>

                            <button type="submit" class="site-btn login-btn">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end admin create category-->
</div>

