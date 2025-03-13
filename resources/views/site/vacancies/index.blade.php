<x-site-layout>

  <h2 class="font-bold text-2xl">Vacancies</h2>

  <ul class="list-disc pl-4">
    @foreach($vacancies as $vacancy)
        <li><a class="underline" href="/vacancies/{{$vacancy->id}}">{{$vacancy->title}}</a></li>
        <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-info">Edit</a>
    @endforeach
  </ul>

</x-site-layout>


