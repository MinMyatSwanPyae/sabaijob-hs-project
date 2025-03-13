<x-site-layout>

    <div class="container mt-4">
        <h1>Create New Vacancy</h1>
        <form method="POST" action="{{ route('admin.vacancies.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
                <div class="invalid-feedback">
                    Please provide a title.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
                <div class="invalid-feedback">
                    Please provide a description.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
                <div class="invalid-feedback">
                    Please provide a location.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    

</x-site-layout>