<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
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

    public function resetInputs()
    {
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->regular_price = '';
        $this->sale_price = '';
        $this->qty = '';
        $this->SKU = '';
        $this->img = '';
        $this->category_id = '';
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }
    public function mount(){
        $this->stock = 'instock';
        $this->featured = 0;
    }
    // public function updated($fields){
    //     $this->validateOnly($fields,[
    //         'name' => 'required',
    //         'slug' => 'required|unique:products',
    //         'description' => 'required',
    //         'regular_price' => 'required|numeric',
    //         'sale_price' => 'numeric',
    //         'qty' => 'required|numeric',
    //         'featured' => 'required',
    //         'stock' => 'required',
    //         'SKU' => 'required|numeric',
    //         'img' => 'required|mimes:jpeg,png,jpg',
    //         'category_id' => 'required'
    //     ]);
    // }
    public function createProduct()
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
            'img' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->featured = $this->featured;
        $product->qty = $this->qty;
        $product->SKU = $this->SKU;
        $imgName = Carbon::now()->timestamp . '.' . $this->img->extension();
        $this->img->storeAs('products',$imgName);
        $product->img = $imgName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message','product has been created successfully');
        $this->resetInputs();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.create',[
            'categories' => $categories
        ])->layout('layouts.main');
    }
}
