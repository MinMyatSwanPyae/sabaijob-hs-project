<x-site-layout>

    <div> Hi this is admin vacancy page </div>

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800">{{ $vacancy->title }}</h1>
    <p class="text-gray-700">{{ $vacancy->description }}</p>
    <p class="text-gray-600"><strong>Location:</strong> {{ $vacancy->location }}</p>

    <div class="mt-4">
        <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
        <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?');">Delete</button>
        </form>
    </div>
</div>

</x-site-layout>



