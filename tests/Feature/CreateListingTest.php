<?php

use App\Http\Livewire\ListingCreate;
use App\Providers\RouteServiceProvider;
use Database\Factories\UserFactory;
use Database\Seeders\RolesAndPermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = (new UserFactory())->create();

    $this->seed(RolesAndPermissionSeeder::class);
});

test('can not access dashboard when not authenticated', function () {
    $this->get('/dashboard')
        ->assertStatus(302)
        ->assertRedirect('/login');
});

test('can see create listing link in the navigation bar when logged in', function () {
    $this->actingAs($this->user)
        ->get('/dashboard')
        ->assertSuccessful()
        ->assertSee('Dashboard')
        ->assertSee('Create Listing');
});

test('can see the default create listing form', function () {
    $this->actingAs($this->user)
        ->get(route('listing-create'))
        ->assertSuccessful()
        ->assertSeeInOrder([
            'Category',
            'Title',
            'Description',
            'Date Online',
            'Date Offline',
            'Currency',
            'Price',
//            'Bedrooms',
//            'Bathrooms',
            'Mobile Number',
            'Email Address',
        ]);
});

test('can see the property fields when category changed to property', function () {
    $this->actingAs($this->user)
        ->get(route('listing-create'))
        ->assertSuccessful();

    Livewire::test(ListingCreate::class)
        ->set('listingCategory', 4)
        ->assertSeeInOrder([
            'Bedrooms',
            'Bathrooms'
        ]);
});

test('can see validation messages when no category is selected', function () {
    $this->actingAs($this->user)
        ->get(route('listing-create'))
        ->assertSuccessful();

    Livewire::test(ListingCreate::class)
        ->call('createListing')
        ->assertHasErrors([
            'listingCategory',
            'title',
            'description',
            'dateOnline',
            'dateOffline',
            'currency',
            'price',
            'mobileNumber',
            'emailAddress',
        ]);
});

test('can see validation messages when property category is selected', function () {
    $this->actingAs($this->user)
        ->get(route('listing-create'))
        ->assertSuccessful();

    Livewire::test(ListingCreate::class)
        ->set('listingCategory', 4)
        ->call('createListing')
        ->assertHasErrors([
            'bedrooms',
            'bathrooms',
        ]);
});

test('can create listing from create form', function () {
    $this->actingAs($this->user)
        ->get(route('listing-create'))
        ->assertSuccessful();

    Livewire::test(ListingCreate::class)
        ->call('createListing')
        ->set('listingCategory', 4)
        ->set('title', fake()->sentence)
        ->set('description', fake()->paragraph)
        ->set('dateOnline',now()->addDays(rand(1, 10)))
        ->set('dateOffline',now()->addDays(rand(11, 20)))
        ->set('currency', 'ZAR')
        ->set('price', '200')
        ->set('mobileNumber', '0752345412')
        ->set('emailAddress', 'test@mail.com')
        ->call('createListing');
});





