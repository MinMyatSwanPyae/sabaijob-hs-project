<x-site-layout>

<div class="container">
    <h1>Companies</h1>
    <ul>
        @foreach($companies as $company)
            <li>
                <a href="{{ route('companies.show', $company->id) }}">
                    {{ $company->name }}
                </a>
                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
            </li>
        @endforeach
    </ul>

    {{ $companies->links() }} <!-- Pagination links -->
</div>

  </x-site-layout>