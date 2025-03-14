<x-site-layout>

  <div class="max-w-6xl mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Companies</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($companies as $company)
            <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-xl font-semibold text-gray-900">{{ $company->name }}</h3>
                <p class="text-gray-600 mt-2">
                    {{ Str::limit($company->description ?? 'No description available.', 100) }}
                </p>

                <div class="mt-4">
                    <a href="{{ route('companies.show', $company->id) }}" 
                       class="text-pink-500 font-semibold hover:text-pink-600 transition-colors">
                        View Details →
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $companies->links() }}
    </div>
</div>


</x-site-layout>