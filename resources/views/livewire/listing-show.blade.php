<div class="p-4 w-full">
    <div class="flex justify-end">
        <button wire:click="$emit('closeModal')" class="hover:cursor-pointer">
            <i class="fa-solid fa-xmark fa-lg text-red-500"></i>
        </button>
    </div>
    <div class="p-2 ">
        <p>{{ $listing->title }}</p>
        <p>{{ $listing->description }}</p>
        <p>Listing valid {{ $listing->date_online }} till {{ $listing->date_offline }}</p>
        <p>{{ $listing->currency }} {{ $listing->price }}</p>
        <p>{{ $listing->category->name }}</p>
        <p>Contact Details (Mobile): {{ $listing->contact_details_mobile }}</p>
        <p>Contact Details (Email): {{ $listing->contact_details_mobile }}</p>
        <p>
            @foreach($listing->images as $image)
                <img src="{{ asset('storage/' . $image->filename) }}" alt=""/>
            @endforeach
        </p>
        <p></p>
    </div>
</div>
