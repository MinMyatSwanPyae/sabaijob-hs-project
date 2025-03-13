<x-site-layout>

  <div class="container">
    <h1>Vacancies</h1>
    <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add New Vacancy</a>
    <ul class="list-disc pl-4">
        @foreach($vacancies as $vacancy)
            <li>
                <a class="underline" href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->title }}</a>
                <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info">Edit</a>

                <form method="POST" action="{{ route('vacancies.destroy', $vacancy->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vacancy?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
  

</x-site-layout>


