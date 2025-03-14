<x-site-layout>

    <div> Hi this is admin vacancy page </div>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-800">{{ $vacancy->title }}</h1>
        <p class="text-gray-700">{{ $vacancy->description }}</p>
        <p class="text-gray-600"><strong>Location:</strong> {{ $vacancy->location }}</p>
        
        <div class="mt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Applicants</h2>
            <div class="bg-white shadow-lg rounded-lg p-6">
                @if($vacancy->applications->isEmpty())
                    <p class="text-gray-500">No applications yet.</p>
                @else
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Applicant Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Applied On</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vacancy->applications as $index => $application)
                                <tr class="border border-gray-300 hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $application->user->name }}</td>
                                    <td class="px-4 py-2">{{ $application->user->email }}</td>
                                    <td class="px-4 py-2">{{ $application->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('applications.show', $application->id) }}" 
                                           class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                                           View Application
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    
        <div class="mt-6">
            <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="px-3 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
            <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="return confirm('Are you sure?');">Delete</button>
            </form>
        </div>
    </div>
    

</x-site-layout>



