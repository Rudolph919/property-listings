<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;

class ListingComponent extends Component
{
    public $listings;

    protected $listeners = ['searchTriggered'];

    public function mount()
    {
        $this->listings = Listing::orderBy('created_at', 'desc')->take(12)->get();
    }

    public function render()
    {
        $listings = $this->listings;
        return view('livewire.listing-component', compact('listings'));
    }
}
