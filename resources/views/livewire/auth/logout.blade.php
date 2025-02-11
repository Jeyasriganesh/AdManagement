<div>
    <button wire:click="logout">Logout</button>
</div>
<div class="max-w-4xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">My Ads List</h2>
        
        <div class="space-x-3">
            <a href="{{ route('ad.create') }}" 
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
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('message') }}
        </div>
    @endif

    <livewire:edit-ad /> 

    @foreach ($ads as $ad)
        <div class="border p-4 rounded-lg shadow-md mb-4 bg-white">
            <h3 class="text-lg font-bold">{{ $ad->title }}</h3>
            <p class="text-gray-600">{{ $ad->description }}</p>
            <p class="text-sm text-gray-500">Price: ${{ $ad->price }} | Category: {{ $ad->category }}</p>

            <div class="mt-3 flex space-x-3">
                <button wire:click="EditAd({{ $ad->
