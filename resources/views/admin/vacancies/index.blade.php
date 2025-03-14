<x-site-layout>

  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Admin Vacancies</h1>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.vacancies.create') }}" class="px-4 py-2 bg-pink-500 text-white rounded-lg shadow-md hover:bg-pink-600 transition duration-300">
            + Create Vacancy
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vacancies as $vacancy)
                    <tr class="border border-gray-300 hover:bg-gray-50">
                        <td class="px-4 py-2 font-semibold">{{ $vacancy->title }}</td>
                        <td class="px-4 py-2">{{ Str::limit($vacancy->description, 100) }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.vacancies.show', $vacancy->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">View</a>
                            <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-300">Edit</a>
                            <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vacancy?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $vacancies->links() }}
    </div>
</div>
</x-site-layout>


