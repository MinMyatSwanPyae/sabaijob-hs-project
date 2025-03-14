<x-site-layout>

  <div class="container mx-auto p-6 bg-white">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Your Applications</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/12 py-3 px-4 text-left uppercase font-semibold text-sm">No</th>
                    <th class="w-4/12 py-3 px-4 text-left uppercase font-semibold text-sm">Vacancy Title</th>
                    <th class="w-2/12 py-3 px-4 text-left uppercase font-semibold text-sm">Applied On</th>
                    <th class="w-2/12 py-3 px-4 text-left uppercase font-semibold text-sm">Status</th>
                    <th class="w-3/12 py-3 px-4 text-left uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($applications as $index => $application)
                    <tr>
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('applications.show', $application->id) }}" class="text-blue-500 hover:text-blue-600">
                                {{ $application->vacancy->title }}
                            </a>
                        </td>
                        <td class="py-3 px-4">{{ $application->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4">{{ $application->status }}</td>
                        <td class="py-3 px-4">
                            <form method="POST" action="{{ route('applications.destroy', $application->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($applications->isEmpty())
        <div class="text-center py-8">
            <p class="text-gray-500 text-sm">No applications found.</p>
        </div>
    @endif
</div>


</x-site-layout>