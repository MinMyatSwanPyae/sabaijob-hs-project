<x-site-layout>
  <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Vacancy Title</th>
            <th>Applied On</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $application)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $application->vacancy->title }}</td>
            <td>{{ $application->created_at->toFormattedDateString() }}</td>
            <td>
                <!-- Delete Button -->
                <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-site-layout>