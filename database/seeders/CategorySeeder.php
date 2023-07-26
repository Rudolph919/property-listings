<?php

namespace Database\Seeders;

use App\Models\Category_;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Furniture',
            ],
            [
                'name' => 'Electronics',
            ],
            [
                'name' => 'Cars',
            ],
            [
                'name' => 'Property',
            ],
        ];

        foreach ($categories as $category) {
            Category_::create($category);
        }
    }
}
