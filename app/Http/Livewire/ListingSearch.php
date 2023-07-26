<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ListingSearch extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        $categories = $this->categories;
        return view('livewire.listing-search', compact('categories'));
    }
}
