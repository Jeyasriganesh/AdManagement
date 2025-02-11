<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Register</h2>

        <form wire:submit="register" class="mt-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model.live="email"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model="password"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" wire:model="password_confirmation"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 outline-none">
            </div>

            <button type="submit"
                class="w-full mt-6 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Register
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</div>
