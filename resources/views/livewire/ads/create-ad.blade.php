<div class="max-w-2xl mx-auto bg-white p-6 shadow-md rounded-md">
   @if($id!='')
   <h2 class="text-xl font-bold text-gray-700 mb-4">Update Ad</h2>
   @else
   <h2 class="text-xl font-bold text-gray-700 mb-4">Create New Ad</h2>
   @endif
   @if(session()->has('message'))
   <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
      {{ session('message') }}
   </div>
   @endif
   <livewire:dynamic-component :is="$current" :key="$current" :$id/>
   <div class="flex justify-end mt-4 space-x-2">
      @if ($current === 'ads.step-two')
      <button wire:click="save"
         class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
      Save
      </button>
      @else
      <button wire:click="next"
         class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
      Next
      </button>
      @endif
   </div>
</div>