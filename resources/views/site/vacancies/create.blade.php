<x-site-layout>

<div class="container">
    <h1>Create Vacancy</h1>
    <form method="POST" action="{{ route('vacancies.store') }}">
        @csrf
        <div class="form-group">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

</x-site-layout>