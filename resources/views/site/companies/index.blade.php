<x-site-layout>

    <div class="container">
        <h1>Companies</h1>
        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add New Company</a>
        <div class="list-group">
            @forelse ($companies as $company)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    {{ $company->name }}
                    <div>
                        <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?');">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="list-group-item">No companies found.</div>
            @endforelse
        </div>
    
        <div class="mt-4">
            {{ $companies->links() }}
        </div>

</x-site-layout>