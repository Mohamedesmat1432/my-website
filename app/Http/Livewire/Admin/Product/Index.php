<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product->img){
            unlink('img/products/' . $product->img);
        }
        $product->delete();
        session()->flash('message','product has been deleted successfully');
    }
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.admin.product.index',[
            'products' => $products
        ])->layout('layouts.main');
    }
}
