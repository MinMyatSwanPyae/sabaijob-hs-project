<x-site-layout>
<div class="container">
    <h1>Your Applications</h1>
    <ul class="list-group">
        @forelse ($applications as $application)
            <li class="list-group-item">
                Vacancy: <strong>{{ $application->vacancy->title }}</strong><br>
                Status: <strong>{{ $application->status }}</strong> <!-- Assuming there's a status field -->
                <br>
                Applied on: <strong>{{ $application->created_at->format('M d, Y') }}</strong>
                <a href="{{ route('applications.show', $application->id) }}" class="btn btn-info">View Details</a>
            </li>
        @empty
            <li class="list-group-item">No applications found.</li>
        @endforelse
    </ul>
</div>
</x-site-layout>