<x-site-layout>

<div class="container">
    <h1>Companies</h1>
    <ul>
        @foreach($companies as $company)
            <li>
                <a href="{{ route('companies.show', $company->id) }}">
                    {{ $company->name }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $companies->links() }} <!-- Pagination links -->
</div>

  </x-site-layout>