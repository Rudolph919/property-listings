<div class="container grid grid-cols-2 gap-3 md:grid-cols-4 lg:grid-cols-6">
    @forelse ($listings as $listing)
    <div class="w-full min-w-300 rounded-lg bg-slate-200">

        @switch($listing->category_id)
            @case(1)
                <img src="https://loremflickr.com/300/300/furniture" alt="image" class="rounded-t-lg">
                @break
            @case(2)
                <img src="https://loremflickr.com/300/300/technology" alt="image" class="rounded-t-lg">
                @break
            @case(3)
                <img src="https://loremflickr.com/300/300/car" alt="image" class="rounded-t-lg">
                @break
            @default
                <img src="https://loremflickr.com/300/300/house" alt="image" class="rounded-t-lg">
        @endswitch
        <div class="p-2">
            <p>
                <span>{{ $listing->currency }} {{ $listing->price }}</span>
            </p>
            <p>{{ Str::limit($listing->title, 25) }}</p>
            <p>{{ Str::limit($listing->description, 20) }}</p>
            <p class="text-xs font-semibold text-gray-600">
                {{ $listing->date_online }} to {{ $listing->date_offline }}
                <span class="text-">
                    ({{ now()->diffInDays($listing->date_offline) }} days left)
                </span>
            </p>
            <p class="float-right text-xs font-semibold text-gray-600 pt-1">Posted {{ $listing->created_at->diffForHumans() }}</p>
        </div>

    </div>
    @empty
        <p>No listings has been captured on the system.</p>
    @endforelse
</div>
