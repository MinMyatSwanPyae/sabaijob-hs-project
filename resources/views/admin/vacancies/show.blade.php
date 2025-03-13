<x-site-layout>

    <div class="container">
        <h1>{{ $vacancy->title }}</h1>
        <p><strong>Description:</strong> {{ $vacancy->description }}</p>
        <p><strong>Location:</strong> {{ $vacancy->location }}</p>
        
        @if ($vacancy->company)
            <p><strong>Company:</strong> {{ $vacancy->company->name }}</p>
            
            @if ($vacancy->company->recruiters && $vacancy->company->recruiters->isNotEmpty())
                <div class="recruiter-info">
                    <h3>Recruiter Information</h3>
                    @foreach($vacancy->company->recruiters as $recruiter)
                        <p><strong>Name:</strong> {{ $recruiter->name }}</p>
                        <p><strong>Email:</strong> {{ $recruiter->email }}</p>
                    @endforeach
                </div>
            @endif
        @else
            <p><strong>Company:</strong> Information unavailable</p>
        @endif
        
        <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info">Edit</a>
        
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Vacancies</a> <!-- Updated to return to the dashboard -->
    
        <form method="POST" action="{{ route('vacancies.destroy', $vacancy->id) }}" onsubmit="return confirm('Are you sure you want to delete this vacancy?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    
    

</x-site-layout>



