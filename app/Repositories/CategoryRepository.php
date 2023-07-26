<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    /**
     * @var Category
     */
    protected Category $category;

    /**
     * ListingRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get all listings.
     *
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return $this->category->get();
    }
}
