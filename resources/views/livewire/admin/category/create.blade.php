<div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('admin.category')}}"> All categories</a>
                        <span>Create category</span>
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
                        <form action="#" method="POST" wire:submit.prevent="createCategory">
                            @csrf
                            <div class="group-input">
                                <label for="name">Category name *</label>
                                <input type="text" id="cat_name" wire:model="name" wire:keyup="generateSlug" placeholder="Enter your category name" required autofocus />
                                @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                            </div>
                            <div class="group-input">
                                <label for="slug">Category Slug *</label>
                                <input type="text" id="cat_slug" wire:model="slug" placeholder="Enter your category slug" required />
                                @error('slug') <span class="text-danger">{{ $message }}</span>  @enderror
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

