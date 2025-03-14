<x-site-layout>
    

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $company->name }}</h1>
    
        <p class="text-gray-600"><strong>Address:</strong> {{ $company->address ?? 'N/A' }}</p>
        <p class="text-gray-600"><strong>Website:</strong> 
            @if ($company->website)
                <a href="{{ $company->website }}" target="_blank" class="text-blue-500 underline">{{ $company->website }}</a>
            @else
                N/A
            @endif
        </p>
    
        <div class="mt-6">
            <a href="{{ route('admin.companies.edit') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                Edit Company
            </a>
        </div>
    </div>

    

  </x-site-layout>