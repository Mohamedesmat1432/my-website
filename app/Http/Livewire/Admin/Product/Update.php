<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class Update extends Component
{
    public $name;
    public $slug;
    public $description;
    public $regular_price;
    public $sale_price;
    public $qty;
    public $featured;
    public $stock;
    public $SKU;
    public $img;
    public $category_id;

    public $product_slug;
    public $product_id;
    public $newImg;

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function mount($product_slug){
        $this->product_slug = $product_slug;
        $product = Product::where('slug',$product_slug)->first();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->qty = $product->qty;
        $this->featured = $product->featured;
        $this->stock = $product->stock;
        $this->SKU = $product->SKU;
        $this->img = $product->img;
        $this->category_id = $this->category_id;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'qty' => 'required|numeric',
            'featured' => 'required',
            'stock' => 'required',
            'SKU' => 'required|numeric',
            'img' => 'required|mimes:png,jpeg,jpg',
            'category_id' => 'required'
        ]);
        if($this->newImg){
            $this->validateOnly($fields,['newImg' => 'required|mimes:jpg,png,jpeg']);
        }
    }
    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'qty' => 'required|numeric',
            'featured' => 'required',
            'stock' => 'required',
            'SKU' => 'required|numeric',
            'img' => 'required|mimes:png,jpeg,jpg',
            'category_id' => 'required'
        ]);
        if($this->newImg){
            $this->validate(['newImg' => 'required|mimes:jpg,png,jpeg']);
        }
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->qty = $this->qty;
        $product->featured = $this->featured;
        $product->stock = $this->stock;
        $product->SKU = $this->SKU;
        if($this->newImg){
            unlink('img/products/' . $product->img );
            $imgName = Carbon::now()->timestamp . '.' . $this->newImg->extension();
            $this->newImg->storeAs('products',$imgName);
            $product->img = $imgName;
        }
        $product->category_id = $this->category_id;
    }
    public function render()
    {
        return view('livewire.admin.product.update')->layout('layouts.main');
    }
}
