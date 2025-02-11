<div>
    <!-- Title -->
    <label class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" wire:model.live="title"
        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <!-- Description -->
    <label class="block text-sm font-medium text-gray-700 mt-4">Description</label>
    <textarea wire:model.live="description"
        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none"></textarea>
    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <!-- Price -->
    <label class="block text-sm font-medium text-gray-700 mt-4">Price ($)</label>
    <input type="number" wire:model.live="price"
        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <!-- Category -->
    <label class="block text-sm font-medium text-gray-700 mt-4">Category</label>
    <select wire:model.live="category"
        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
        <option value="">Select Category</option>
        <option value="Electronics">Electronics</option>
        <option value="Furniture">Furniture</option>
        <option value="Vehicles">Vehicles</option>
        <option value="Real Estate">Real Estate</option>
    </select>
    @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <!-- Location -->
    <label class="block text-sm font-medium text-gray-700 mt-4">Location</label>
    <input type="text" wire:model.live="location"
        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
    @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

   

</div>