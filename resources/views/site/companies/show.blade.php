<x-site-layout>
    
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
        <!-- Company Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $company->name }}</h1>
            <p class="text-gray-600 mt-2">{{ $company->address }}</p>
            <p class="mt-2">
                <strong class="text-gray-700">Website:</strong>
                <a href="{{ $company->website }}" class="text-blue-500 hover:text-blue-700 underline" target="_blank">
                    {{ $company->website }}
                </a>
            </p>
        </div>
    
        @if($company->vacancies->isNotEmpty())
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Current Vacancies</h3>
                <ul class="mt-4 space-y-3">
                    @foreach($company->vacancies as $vacancy)
                        <li>
                            <a href="{{ route('vacancies.show', $vacancy->id) }}"
                               class="block bg-gray-100 hover:bg-gray-200 p-3 rounded-lg shadow-sm transition">
                                <span class="text-lg font-medium text-gray-800">{{ $vacancy->title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    

  </x-site-layout>