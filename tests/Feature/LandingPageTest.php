<?php

use App\Http\Livewire\ListingComponent;
use App\Http\Livewire\ListingSearch;
use App\Models\Listing;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('can see search bar and authentication links', function () {
    $this->get('/')
        ->assertSuccessful()
        ->assertSeeLivewire(ListingSearch::class)
        ->assertSee('Log in')
        ->assertSee('Register');
});

test('can display message when no listings has been captured', function () {
    $this->assertDatabaseCount('listings', 0);

    $this->get('/')
        ->assertSuccessful()
        ->assertSeeLivewire(ListingComponent::class)
        ->assertSee('No listings has been captured on the system.');
});

test ('can create listings in the database and show listings on the landing page', function () {
    $countToInsert = 5;

    $listings = Listing::factory()->count($countToInsert)->create();

    $this->assertDatabaseCount('listings', $countToInsert);

    $response = $this->get('/')
        ->assertSuccessful();

    for ($i = 0; $i < $countToInsert; $i++) {
        $response->assertSee(Str::limit($listings[$i]->title, 25));
        $response->assertSee(Str::limit($listings[$i]->description, 20));
    }
});
