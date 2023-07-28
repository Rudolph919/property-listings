<?php

namespace App\Http\Livewire;

use App\Services\ListingServices;
use LivewireUI\Modal\ModalComponent;

class ListingShow extends ModalComponent
{
    protected ListingServices $listingServices;

    public $slug;

    public $listing;

    public function boot(ListingServices $listingServices)
    {
        $this->listingServices = $listingServices;
    }

    public function mount($slug)
    {
        $this->slug = $slug;

        $this->listing = $this->listingServices->getListingBySlug($this->slug);
    }

    public function render()
    {
        return view('livewire.listing-show');
    }
}
