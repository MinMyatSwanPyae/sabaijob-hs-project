<x-site-layout>
<div class="container">
    <h1>Application Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $application->job->title ?? 'Job Title' }}</h5>
            <p class="card-text"><strong>Applicant:</strong> {{ $application->user->name ?? 'Applicant Name' }}</p>
            <p class="card-text"><strong>Application Date:</strong> {{ $application->created_at->format('M d, Y') }}</p>
            <p class="card-text"><strong>Cover Letter:</strong> {{ $application->cover_letter }}</p>
        </div>
    </div>

    <a href="{{ url('/applications') }}" class="btn btn-primary">Back to Applications</a>
</div>
</x-site-layout>

