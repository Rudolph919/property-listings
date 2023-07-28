<div>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4">
                    <div class="pt-4 pb-4 text-4xl">
                        <h1>Listing List</h1>
                    </div>

                    <div class="flex flex-col overflow-x-auto">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Title</th>
                                        <th scope="col" class="px-6 py-4">Description</th>
                                        <th scope="col" class="px-6 py-4">Date Online</th>
                                        <th scope="col" class="px-6 py-4">Date Offline</th>
                                        <th scope="col" class="px-6 py-4">Currency</th>
                                        <th scope="col" class="px-6 py-4">Price</th>
                                        <th scope="col" class="px-6 py-4">Category</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listings as $listing)
                                        <tr
                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                            <td class="px-6 py-2">{{ $listing->title }}</td>
                                            <td class="px-6 py-2">{{ $listing->description }}</td>
                                            <td class="px-6 py-2">{{ $listing->date_online }}</td>
                                            <td class="px-6 py-2">{{ $listing->date_offline }}</td>
                                            <td class="px-6 py-2">{{ $listing->currency }}</td>
                                            <td class="px-6 py-2">{{ $listing->price }}</td>
                                            <td class="px-6 py-2">{{ $listing->category->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

