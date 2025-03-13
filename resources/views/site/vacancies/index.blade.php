<x-site-layout>

  <h2 class="font-bold text-2xl">Vacancies</h2>

  @foreach ($vacancies as $vacancy)
  <div class="vacancy">
      <h3>{{ $vacancy->title }}</h3>
      <p>{{ $vacancy->description }}</p>
      <a href="{{ route('vacancies.show', $vacancy->id) }}">View Details</a>
  </div>
@endforeach

{{-- Pagination links --}}
<div class="mt-4">
  {{ $vacancies->links() }}
</div>

  

</x-site-layout>


