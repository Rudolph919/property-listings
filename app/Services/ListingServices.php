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
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

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
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'description' => 'bail|max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $post = $this->listingRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update post data');
        }

        DB::commit();

        return $post;

    }



    /**
     * Delete post by id.
     *
     * @param $id
     * @return Listing
     */
    public function deleteById($id): Listing
    {
        DB::beginTransaction();

        try {
            $post = $this->listingRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $post;

    }
}
