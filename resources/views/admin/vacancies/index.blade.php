<x-site-layout>


  @section('content')
  <div class="container">
      <h1>Admin Vacancies Index Page</h1>
      <ul>
          @foreach($vacancies as $vacancy)
              <li>{{ $vacancy->title }} - {{ $vacancy->description }}</li>
          @endforeach
      </ul>
  </div>
  
  

</x-site-layout>


