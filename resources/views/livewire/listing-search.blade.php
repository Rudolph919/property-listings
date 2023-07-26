<div class="flex items-center justify-between ml-18 mr-18">
    <div>
        <select class="block w-40 text-sm text-gray-900 border border-gray-300 rounded-l-lg focus:ring-blue-500 focus:border-blue-500"
                wire:model="selectedCategory">
            <option selected>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <input type="text" class="w-60 pt-1  border-gray-300 md:w-64 lg:w-96" placeholder="Search">
    </div>

    <div>
        <button type="submit" class="w-10 p-1.5 m-0 text-white bg-green-500 border-0 rounded-r-lg hover:text-white hover:bg-green-700">
            <i class="fas fa-search"></i>
        </button>
    </div>


</div>
