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
                  <a class=bg-pink-500 href="{{ route('vacancies.show', ['id' => $vacancy->id]) }}">{{ $vacancy->title }}</a>
                </li>
                
            @endforeach
        </ul>
    @endif

    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>

    <a href="{{ url('/companies') }}">Back to Companies</a>

    @foreach ($companies as $company)
    <tr>
        <td>{{ $company->name }}</td>
        <td>
            <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary">Edit</a>

            <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</div>

  </x-site-layout>