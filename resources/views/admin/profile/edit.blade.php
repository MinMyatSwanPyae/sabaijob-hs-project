<x-site-layout>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Profile</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Name</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="w-full p-2 border rounded-md focus:ring focus:ring-pink-300">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="w-full p-2 border rounded-md focus:ring focus:ring-pink-300">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">New Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded-md focus:ring focus:ring-pink-300">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded-md focus:ring focus:ring-pink-300">
        </div>

        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-md hover:bg-pink-600 transition">
            Update Profile
        </button>
    </form>
</div>

</x-site-layout>