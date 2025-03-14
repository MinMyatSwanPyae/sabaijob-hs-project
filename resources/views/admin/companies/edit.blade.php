<x-site-layout>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Company</h1>
    
        <form action="{{ route('admin.companies.update') }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label class="block text-gray-700">Company Name:</label>
                <input type="text" name="name" value="{{ $company->name }}" class="w-full p-2 border rounded-md" required>
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Address:</label>
                <input type="text" name="address" value="{{ $company->address }}" class="w-full p-2 border rounded-md">
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Website:</label>
                <input type="url" name="website" value="{{ $company->website }}" class="w-full p-2 border rounded-md">
            </div>
    
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600">
                Update
            </button>
        </form>
    </div>
    
</x-site-layout>