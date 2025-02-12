<div>
    <label class="block text-sm font-medium text-gray-700 mt-4">Image</label>
    <input type="file" wire:model="image" class="block w-full mt-1">
    <div wire:loading wire:target="photo">Uploading...</div>

    @if ($image instanceof Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
        <!-- Show preview for new upload -->
        <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-20 object-cover">
    @elseif ($existingImage)
        <!-- Show existing image if editing -->
        <img src="{{ asset('storage/' . $existingImage) }}" class="mt-2 h-20 object-cover">
    @endif

    @error('image')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
