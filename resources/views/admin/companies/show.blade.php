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
    
        <!-- Colleague Admins Section -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Company Admins</h2>
    
            @if($colleagueAdmins->isEmpty())
                <p class="text-gray-500">No admins found for this company.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($colleagueAdmins as $admin)
                        <div class="bg-white shadow-lg rounded-lg p-5 hover:shadow-xl transition-shadow duration-300">
                            <h3 class="text-xl font-bold mb-2">{{ $admin->name }}</h3>
                            <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $admin->email }}</p>
                            <p class="text-gray-600"><strong>Joined:</strong> {{ $admin->created_at->format('d M Y') }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    
</x-site-layout>