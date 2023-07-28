<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="pt-4 pb-4 text-4xl">
                        <h1>Listing Create Form</h1>
                    </div>
{{--                    <p class="text-xs p-4 text-red-400">** The below form is intended to create your new listing. All the fields are required except for the bedrooms and bathroom fields. they only become required when listing type is property.</p>--}}

                    <form wire:submit.prevent="createListing">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                                <select id="category" wire:model="listingCategory"
                                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('listingCategory') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-1">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                <input type="text" id="title" wire:model.defer="title"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                <textarea id="description" rows="4" wire:model.defer="description"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Listing description..."></textarea>
                                @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="date_online" class="block mb-2 text-sm font-medium text-gray-900">Date Online</label>
                                <input type="date" id="date_online" wire:model.defer="dateOnline"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('dateOnline') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-1">
                                <label for="date_offline" class="block mb-2 text-sm font-medium text-gray-900">Date Offline</label>
                                <input type="date" id="date_offline" wire:model.defer="dateOffline"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('dateOffline') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="currency" class="block mb-2 text-sm font-medium text-gray-900">Currency</label>
                                <select id="currency" wire:model.defer="currency"
                                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option selected>Select Currency</option>
                                    <option value="ZAR">ZAR</option>
                                    <option value="USD">US Dollar</option>
                                    <option value="EUR">Euro</option>
                                    <option value="GBP">British Pound Sterling</option>
                                    <option value="AUD">Australian Dollar</option>
                                </select>
                                @error('currency') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                                <input type="text" id="price" wire:model.defer="price"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('price') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if ($showFields)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                                <div class="col-span-1">
                                    <label for="bedrooms" class="block mb-2 text-sm font-medium text-gray-900">Bedrooms</label>
                                    <select id="bedrooms" wire:model="bedrooms"
                                            class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option>Select Bedrooms</option>
                                        <option value="1">1 Bedroom</option>
                                        <option value="1.5">1 1/2 Bedrooms</option>
                                        <option value="2">2 Bedrooms</option>
                                        <option value="2.5">2 1/2 Bedrooms</option>
                                        <option value="3">3 Bedrooms</option>
                                        <option value="3.5">3 1/2 Bedrooms</option>
                                        <option value="4">4 Bedrooms</option>
                                        <option value="4.5">4 1/2 Bedrooms</option>
                                        <option value="5">5 Bedrooms</option>
                                        <option value="5.5">5 1/2 Bedrooms</option>
                                        <option value="6">6 Bedrooms</option>
                                        <option value="6.5">6 1/2 Bedrooms</option>
                                        <option value="7">7 Bedrooms</option>
                                        <option value="7.5">7 1/2 Bedrooms</option>
                                        <option value="8">8 Bedrooms</option>
                                        <option value="8.5">8 1/2 Bedrooms</option>
                                    </select>
                                    @error('bedrooms') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-1">
                                    <label for="bathrooms" class="block mb-2 text-sm font-medium text-gray-900">Bathrooms</label>
                                    <select id="bathrooms" wire:model="bathrooms"
                                            class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                        <option>Select Bathrooms</option>
                                        <option value="1">1 Bathroom</option>
                                        <option value="1.5">1 1/2 Bathrooms</option>
                                        <option value="2">2 Bathrooms</option>
                                        <option value="2.5">2 1/2 Bathrooms</option>
                                        <option value="3">3 Bathrooms</option>
                                        <option value="3.5">3 1/2 Bathrooms</option>
                                        <option value="4">4 Bathrooms</option>
                                        <option value="4.5">4 1/2 Bathrooms</option>
                                        <option value="5">5 Bathrooms</option>
                                        <option value="5.5">5 1/2 Bathrooms</option>
                                        <option value="6">6 Bathrooms</option>
                                        <option value="6.5">6 1/2 Bathrooms</option>
                                        <option value="7">7 Bathrooms</option>
                                        <option value="7.5">7 1/2 Bathrooms</option>
                                        <option value="8">8 Bathrooms</option>
                                    </select>
                                    @error('bathrooms') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
                            <div class="col-span-1">
                                <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900">Mobile Number</label>
                                <input type="text" id="mobile_number" wire:model.defer="mobileNumber"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('mobileNumber') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-span-1">
                                <label for="email_address" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                                <input type="text" id="email_address" wire:model.defer="emailAddress"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('emailAddress') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <label for="photo" class="block text-sm font-medium text-gray-900">Upload Images</label>
                            <input id="photo" type="file" multiple wire:model="photo"
                                class="block w-full text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-1">
                            @error('photo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>

                        @if($photo)
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Image Preview</label>
                            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 mb-4">

                                @foreach($photo as $image)
                                    <div class="col-span-1">
                                        <img src="{{ $image->temporaryUrl() }}" class="" alt="">
                                    </div>

                                @endforeach

                            </div>
                        @endif

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                            Create Listing
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{--'date_online' => now()->addDays(rand(1, 10)),--}}
{{--'date_offline' => now()->addDays(rand(15, 30)),--}}
{{--'price' => rand(1000, 10000),--}}
{{--'currency' => 'ZAR',--}}
{{--'bedrooms' => rand(1, 10),--}}
{{--'contact_details_mobile' => $this->faker->phoneNumber,--}}
{{--'contact_details_email' => $this->faker->email,--}}
{{--'category_id' => rand(1, 4),--}}
