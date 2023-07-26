<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date_online' => now()->addDays(rand(1, 10)),
            'date_offline' => now()->addDays(rand(15, 30)),
            'price' => rand(1000, 10000),
            'currency' => 'ZAR',
            'bedrooms' => rand(1, 10),
            'contact_details_mobile' => $this->faker->phoneNumber,
            'contact_details_email' => $this->faker->email,
            'category_id' => rand(1, 4),
        ];
    }
}
