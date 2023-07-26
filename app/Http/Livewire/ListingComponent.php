<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Services\ListingServices;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListingComponent extends Component
{
    protected ListingServices $listingServices;

    public Collection $listings;

    protected $listeners = ['searchTriggered'];


    public function boot(ListingServices $listingServices)
    {
        $this->listingServices = $listingServices;
    }

    public function mount()
    {
        $this->listings = $this->listingServices->getMostRecentListings();
    }

    public function render()
    {
        $listings = $this->listings;
        return view('livewire.listing-component', compact('listings'));
    }
}
