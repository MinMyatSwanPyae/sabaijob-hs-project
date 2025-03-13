<x-site-layout>

    <div class="container">
        <h1>{{ $vacancy->title }}</h1>
        <p><strong>Description:</strong> {{ $vacancy->description }}</p>
        <p><strong>Location:</strong> {{ $vacancy->location }}</p>
        
        @if ($vacancy->company)
            <p><strong>Company:</strong> {{ $vacancy->company->name }}</p>
            
            <!-- Asked ChatGPT For Help -->
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
        
    
        <a href="{{ url('/vacancies') }}" class="btn btn-secondary">Back to Vacancies</a>
    
    </div>
    

</x-site-layout>



