<x-site-layout>


<div class="container">
    <h1>Edit Vacancy</h1>
    <form method="POST" action="{{ route('vacancies.update', ['id' => $vacancy->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $vacancy->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" required>{{ $vacancy->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


</x-site-layout>


