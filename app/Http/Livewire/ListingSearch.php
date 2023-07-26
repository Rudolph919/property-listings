<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Services\CategoryServices;
use Livewire\Component;

class ListingSearch extends Component
{
    protected CategoryServices $categoryServices;

    public $categories;

    public function boot(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }
    public function mount()
    {
        $this->categories = $this->categoryServices->getAllCategories();
    }

    public function render()
    {
        $categories = $this->categories;
        return view('livewire.listing-search', compact('categories'));
    }
}
