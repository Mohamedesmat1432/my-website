<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <span>All categories</span>
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
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif
                <table class="table table-striped table-black">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <a class="text-primary"
                                    href="{{route('admin.category.update',['category_slug'=>$category->slug])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="text-danger" href="#" wire:click.prevent="deleteCategory({{$category->id}})">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="create_cat mb-3 float-right">
                    <a href="{{route('admin.category.create')}}" class="site-btn">Create category</a>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="pagination">{{$categories->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end admin categories-->
</div>
