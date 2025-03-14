<x-site-layout>


@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Vacancy</h1>

    <form action="{{ route('admin.vacancies.update', $vacancy->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Title:</label>
            <input type="text" name="title" value="{{ $vacancy->title }}" class="w-full p-2 border rounded-md" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Description:</label>
            <textarea name="description" class="w-full p-2 border rounded-md" required>{{ $vacancy->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Location:</label>
            <input type="text" name="location" value="{{ $vacancy->location }}" class="w-full p-2 border rounded-md" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600">Update</button>
    </form>
</div>
    


</x-site-layout>


