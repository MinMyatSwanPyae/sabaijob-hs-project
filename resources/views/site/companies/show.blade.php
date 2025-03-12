<x-site-layout>
    
  <div class="container">
    <h1>{{ $company->name }}</h1>
    <p><strong>Address:</strong> {{ $company->address }}</p>
    <p><strong>Website:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a></p>

    @if($company->vacancies->isNotEmpty())
        <h3>Current Vacancies</h3>
        <ul>
            @foreach($company->vacancies as $vacancy)
                <li>
                    <a href="{{ route('vacancies.show', $vacancy->id) }}">
                        {{ $vacancy->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url('/companies') }}">Back to Companies</a>
</div>

</x-site-layout>