<div>
    <form action="{{route('product.search')}}">
        <div class="advanced-search">
            <select class="category-btn" wire:model="product_cat_id" >
                <option value="">{{$product_cat}}</option>
                @foreach ($categories as $category)
                <option class="cat-id" value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
            </select>
            <div class="input-group">
                <input type="text" placeholder="What do you need?" name="search" value="{{$search}}">
                <button type="submit"><i class="ti-search"></i></button>
            </div>
            <input type="hidden" value="{{str_split($product_cat,12)[0]}}"  />
            <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cat" />
            <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cat-id" />
        </div>
    </form>
</div>

