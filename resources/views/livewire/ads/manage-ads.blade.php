<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-xl font-semibold mb-4">My Ads List</h2>

    <div class="space-x-3 mb-4">
        <a href="{{ route('ads.create') }}" 
           class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
            Create Ad
        </a>

        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" 
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Logout
            </button>
        </form>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex space-x-4 mb-4">
        <input type="text" wire:model.live="search" 
               placeholder="Search by keyword..." 
               class="border p-2 rounded w-1/3">

        <select wire:model.live="category" class="border p-2 rounded w-1/3">
            <option value="">All Categories</option>
            <option value="Electronics">Electronics</option>
            <option value="Furniture">Furniture</option>
            <option value="Vehicles">Vehicles</option>
            <option value="Real Estate">Real Estate</option>
        </select>

        <input type="number" wire:model.live="minPrice" placeholder="Min Price" 
               class="border p-2 rounded w-1/6">

        <input type="number" wire:model.live="maxPrice" placeholder="Max Price" 
               class="border p-2 rounded w-1/6">
    </div>

    @if ($ads->count() > 0)
        @foreach ($ads as $ad)
            <div class="flex items-center border p-4 rounded-lg shadow-md mb-4 bg-white">
                <!-- Left Side: Ad Details -->
                <div class="w-2/3 pr-4">
                    <h3 class="text-lg font-bold">{{ $ad->title }}</h3>
                    <p class="text-gray-600">{{ $ad->description }}</p>
                    <p class="text-sm text-gray-500">Price: ${{ $ad->price }} | Category: {{ $ad->category }}</p>

                    <div class="mt-3 flex space-x-3">
                        <button wire:click="EditAd({{ $ad->id }})"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Edit
                        </button>

                        <button wire:click="deleteAd({{ $ad->id }})"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Delete
                        </button>
                    </div>
                </div>

                <!-- Right Side: Image -->
                <div class="w-1/3">
                    @if ($ad->image)
                        <img src="{{ asset('storage/' . $ad->image) }}" 
                             class="w-full h-32 object-cover rounded-lg">
                    @else
                        <div class="w-full h-32 flex items-center justify-center bg-gray-200 text-gray-500 rounded-lg">
                            No Image
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="mt-4">
            {{ $ads->links() }}
        </div>
        @else
        <div class="border p-4 rounded-lg shadow-md bg-white">
            <p class="text-gray-500">No ads found.</p>
        </div>
    @endif
</div>
