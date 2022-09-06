<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','category has been deleted successfully');
    }
    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(4);
        return view('livewire.admin.category.index',[
            'categories' => $categories
        ])->layout('layouts.main');
    }
}
