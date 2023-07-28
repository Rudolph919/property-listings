<?php

namespace App\Http\Livewire;

use App\Services\ListingServices;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListingList extends Component
{
    protected ListingServices $listingServices;

    public Collection $listings;

    public function boot(ListingServices $listingServices)
    {
        $this->listingServices = $listingServices;
    }

    public function mount()
    {
        $this->listings = $this->listingServices->getAllListings();
    }
    public function render()
    {
        $listings = $this->listings;
        return view('livewire.listing-list', compact('listings'))
            ->extends('layouts.app');
    }
}
