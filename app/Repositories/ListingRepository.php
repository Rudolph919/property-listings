<?php

namespace App\Repositories;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Database\Eloquent\Collection;

class ListingRepository
{
    /**
     * @var Listing
     */
    protected Listing $listing;

    protected ListingImage $listingImage;

    /**
     * ListingRepository constructor.
     * @param Listing $listing
     * @param ListingImage $listingImage
     */
    public function __construct(Listing $listing, ListingImage $listingImage)
    {
        $this->listing = $listing;
        $this->listingImage = $listingImage;
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
            ->first();
    }

    /**
     * Save listing
     *
     * @param $data
     * @return Listing
     */
    public function save($data): Listing
    {
        $listing = new $this->listing;
        $listing->category_id = $data['category_id'];
        $listing->title = $data['title'];
        $listing->description = $data['description'];
        $listing->date_online = $data['date_online'];
        $listing->date_offline = $data['date_offline'];
        $listing->price = $data['price'];
        $listing->currency = $data['currency'];
        $listing->bedrooms = $data['bedrooms'];
        $listing->bathrooms = $data['bathrooms'];
        $listing->contact_details_mobile = $data['contact_details_mobile'];
        $listing->contact_details_email = $data['contact_details_email'];
        $listing->save();

        foreach ($data['listing_images'] as $image) {
            $listingImage = new $this->listingImage;
            $listingImage->listing_id = $listing->id;
            $listingImage->filename = $image['filename'];
            $listingImage->original_filename = $image['original_filename'];
            $listingImage->save();
        }

        return $listing;
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
     * @param $id
     * @return Listing
     */
    public function delete($id)
    {
        $listing = $this->listing->find($id);
        $listing->delete();

        return $listing;
    }
}
