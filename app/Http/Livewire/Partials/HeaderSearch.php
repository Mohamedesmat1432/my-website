<?php

namespace App\Http\Livewire\Partials;

use App\Models\Category;
use Livewire\Component;

class HeaderSearch extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'All categories';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.partials.header-search',['categories' => $categories]);
    }
}
