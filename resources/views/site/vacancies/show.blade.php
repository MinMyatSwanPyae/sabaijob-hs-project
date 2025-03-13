<x-site-layout>

    <div class="container">
        <h1>{{ $vacancy->title }}</h1>
        <p>{{ $vacancy->description }}</p>
        <p>Location: {{ $vacancy->location }}</p>
    
        @auth
            <form action="{{ route('applications.store') }}" method="POST">
                @csrf
                <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                <button type="submit" class="btn btn-primary">Apply Now</button>
            </form>
        @else
            <a href="{{ route('login') }}?redirect={{ request()->fullUrl() }}" class="btn btn-primary">Apply Now</a>
        @endauth
    </div>
    
        
    
        <a href="{{ url('/vacancies') }}" class="btn btn-secondary">Back to Vacancies</a>
    
    

</x-site-layout>



