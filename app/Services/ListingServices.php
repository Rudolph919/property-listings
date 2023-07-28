<?php

namespace App\Services;

use App\Models\Listing;
use App\Repositories\ListingRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ListingServices
{
    /**
     * @var ListingRepository
     */
    protected ListingRepository $listingRepository;

    /**
     * ListingService constructor.
     * @param ListingRepository $listingRepository
     */
    public function __construct(ListingRepository $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }


    /**
     * Get all listings.
     *
     * @return Collection
     */
    public function getAllListings(): Collection
    {
        return $this->listingRepository->getAllListings();
    }

    /**
     * Get most recent listings.
     *
     * @return Collection
     */
    public function getMostRecentListings(): Collection
    {
        return $this->listingRepository->getMostRecentListings();
    }

    /**
     * Get listing by id.
     *
     * @param $id
     * @return Listing
     */
    public function getListingById($id): Listing
    {
        return $this->listingRepository->getListingById($id);
    }

    /**
     * Get listing by id.
     *
     * @param $slug
     * @return Listing
     */
    public function getListingBySlug($slug): Listing
    {
        return $this->listingRepository->getListingBySlug($slug);
    }

    /**
     * Validate listing data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return Listing
     */
    public function saveListingData(array $data): Listing
    {
        return $this->listingRepository->save($data);
    }

    /**
     * Update listing data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @param $id
     * @return Listing
     */
    public function updateListing(array $data, $id): Listing
    {
        return $this->listingRepository->update($data, $id);
    }

    /**
     * Delete post by id.
     *
     * @param $id
     * @return Listing
     */
    public function deleteById($id): Listing
    {
        return $this->listingRepository->delete($id);
    }
}
