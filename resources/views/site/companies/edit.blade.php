<x-site-layout>

<div class="container">
    <h1>Edit Company</h1>
    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $company->name }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" value="{{ $company->address }}" required>
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" class="form-control" name="website" value="{{ $company->website }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</x-site-layout>