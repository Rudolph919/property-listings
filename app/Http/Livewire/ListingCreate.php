<?php

namespace App\Http\Livewire;

use App\Services\CategoryServices;
use App\Services\ListingServices;
use Livewire\Component;
use Illuminate\Support\Collection;

class ListingCreate extends Component
{
    protected CategoryServices $categoryServices;

    protected ListingServices $listingServices;

    public Collection $categories;

    public $listingCategory;

    public $title;

    public $description;

    public $dateOnline;

    public $dateOffline;

    public $currency;

    public $price;

    public $bedrooms = null;

    public $bathrooms = null;

    public $mobileNumber;

    public $emailAddress;

    public $showFields = false;

    protected $rules = [
        'listingCategory' => ['required'],
        'title' => ['required', 'min:3', 'max:255'],
        'description' => ['required', 'min:5', 'max:500'],
        'dateOnline' => ['required'],
        'dateOffline' => ['required', 'after:date_online'],
        'currency' => ['required'],
        'price' => ['required'],
        'bedrooms' => ['nullable', 'required_if:listingCategory,4'],
        'bathrooms' => ['nullable', 'required_if:listingCategory,4'],
        'mobileNumber' => ['required', 'min:10', 'max:12'],
        'emailAddress' => ['required', 'email'],
    ];


    protected $messages = [
        'bedrooms.required_if' => 'This field is required if category is Property',
        'bathrooms.required_if' => 'This field is required if category is Property',
    ];


    public function boot(
        CategoryServices $categoryServices,
        ListingServices $listingServices,
    ): void
    {
        $this->categoryServices = $categoryServices;
        $this->listingServices = $listingServices;
    }

    public function mount(): void
    {
        $this->categories = $this->categoryServices->getAllCategories();
    }

    public function updated($listingCategory)
    {
        if ($this->listingCategory != 4) {
            $this->showFields = false;
        } else {
            $this->showFields = true;
        }

    }

    public function createListing()
    {
        $this->validate();

        $this->listingServices->saveListingData([
            'category_id' => $this->listingCategory,
            'title' => $this->title,
            'description' => $this->description,
            'date_online' => $this->dateOnline,
            'date_offline' => $this->dateOffline,
            'price' => $this->price,
            'currency' => $this->currency,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'contact_details_mobile' => $this->mobileNumber,
            'contact_details_email' => $this->emailAddress,
        ]);
    }

    public function render()
    {
        $categories = $this->categories;
        return view('livewire.listing-create', compact('categories'))
            ->extends('layouts.app');
    }
}
