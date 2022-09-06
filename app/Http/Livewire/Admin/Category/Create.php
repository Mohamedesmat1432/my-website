<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }
    // public function resetInputs()
    // {
    //     $this->name = '';
    //     $this->slug = '';
    // }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }
    public function createCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','category has been created successfully');
        return redirect()->route('admin.category');
    }
    public function render()
    {
        return view('livewire.admin.category.create')->layout('layouts.main');
    }
}
