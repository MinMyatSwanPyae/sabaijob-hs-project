<x-site-layout>

    <div class="container">
        <h1>Admin Dashboard</h1>
        <!-- Button to add a new vacancy -->
        <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add New Vacancy</a>
    
        <div class="mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through vacancies -->
                    @forelse ($vacancies as $vacancy)
                        <tr>
                            <td>{{ $vacancy->title }}</td>
                            <td>{{ $vacancy->description }}</td>
                            <td>{{ $vacancy->location }}</td>
                            <td>
                                <!-- Action buttons for view, edit, and delete -->
                                <a href="{{ route('vacancies.show', $vacancy->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vacancy?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <!-- Display when no vacancies are available -->
                        <tr>
                            <td colspan="4">No vacancies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</x-site-layout>