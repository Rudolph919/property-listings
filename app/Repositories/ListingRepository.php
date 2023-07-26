<?php

namespace App\Repositories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Collection;

class ListingRepository
{
    /**
     * @var Listing
     */
    protected Listing $listing;

    /**
     * ListingRepository constructor.
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * Get all listings.
     *
     * @return Collection
     */
    public function getAllListings(): Collection
    {
        return $this->listing->get();
    }

    /**
     * Get most recent listings.
     *
     * @return Collection
     */
    public function getMostRecentListings(): Collection
    {
        return $this->listing->orderBy('created_at', 'desc')->take(12)->get();
    }

    /**
     * Get listing by id
     *
     * @param $id
     * @return mixed
     */
    public function getListingById($id): mixed
    {
        return $this->listing
            ->where('id', $id)
            ->get();
    }


    /**
     * Get listing by slug
     *
     * @param $slug
     * @return mixed
     */
    public function getListingBySlug($slug): mixed
    {
        return $this->listing
            ->where('slug', $slug)
            ->get();
    }

    /**
     * Save listing
     *
     * @param $data
     * @return Listing
     */
    public function save($data)
    {
        $listing= new $this->listing;
        $listing->title = $data['title'];
        $listing->description = $data['description'];
        $listing->save();

        return $listing->fresh();
    }

    /**
     * Update Listing
     *
     * @param $data
     * @param $id
     * @return Listing
     */
    public function update($data, $id)
    {
        $listing = $this->listing->find($id);
        $listing->title = $data['title'];
        $listing->description = $data['description'];
        $listing->update();

        return $listing;
    }

    /**
     * Delete Listing
     *
     * @param $data
     * @return Listing
     */
    public function delete($id)
    {
        $listing = $this->listing->find($id);
        $listing->delete();

        return $listing;
    }
}
