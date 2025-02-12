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
