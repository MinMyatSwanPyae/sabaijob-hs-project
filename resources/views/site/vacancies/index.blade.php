<x-site-layout>
<h2> Vacancies </h2> 

<ul>
  @foreach ($vacancies as $vacancy)
  <li> <a href="/vacancies/{{$vacancy->id}}"> {{$vacancy->title}} </a> </li>
    
  @endforeach
  
</ul> 
</x-site-layout>