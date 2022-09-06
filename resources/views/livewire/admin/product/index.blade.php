<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>All products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- start admin categories-->
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-black">
                    <thead>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Quantity</th>
                        <th>Reg_price</th>
                        <th>Sale_price</th>
                        <th>Stock</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <img src="{{asset('img/products')}}/{{$product->img}}" alt="{{$product->img}}" width="50">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->slug}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->regular_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <a class="text-primary" href="{{route('admin.product.update',['product_slug'=>$product->slug])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="text-danger" href="#" wire:click.prevent="deleteProduct({{$product->id}})">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="create_cat mb-3 float-right">
                    <a href="{{route('admin.product.create')}}" class="site-btn">Create product</a>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pagination">{{$products->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end admin categories-->
</div>

