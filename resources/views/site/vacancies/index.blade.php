<x-site-layout>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    @foreach ($vacancies as $vacancy)
        <div class="bg-white shadow-lg rounded-lg p-5 hover:shadow-xl transition-shadow duration-300">
            <h2 class="text-xl font-bold mb-2">{{ $vacancy->title }}</h2>
            <p class="text-gray-700 mb-4">{{ Str::limit($vacancy->description, 100) }}</p>
            <div class="text-sm text-gray-600 mb-2">Location: {{ $vacancy->location }}</div>
            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="inline-block px-6 py-2 text-white bg-pink-500 rounded hover:bg-pink-600 transition-colors duration-200 text-sm">View Details</a>
        </div>
    @endforeach
</div>

<div class="mt-8">
    {{ $vacancies->links() }}
</div>


  

</x-site-layout>


