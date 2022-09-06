<?php

namespace App\Http\Livewire\Partials;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.partials.header',['categories'=>$categories]);
    }
}
