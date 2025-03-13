<x-site-layout>
<div class="container">
    <h1>Create New Company</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf  {{-- CSRF token for form security --}}
        
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Website:</label>
            <input type="url" class="form-control" id="website" name="website">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</x-site-layout>