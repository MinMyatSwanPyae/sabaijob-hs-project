<x-site-layout>
    
    <div class="container">
        <h1>Company Details</h1>
        <div class="company-info">
            <p><strong>Name:</strong> {{ $company->name }}</p>
            <p><strong>Description:</strong> {{ $company->description }}</p>
            <p><strong>Total Vacancies:</strong> {{ $company->vacancies->count() }}</p>
            <p><strong>Colleague Admins:</strong>
                <ul>
                    @foreach ($company->recruiters as $recruiter)
                        <li>{{ $recruiter->name }} - {{ $recruiter->email }}</li>
                    @endforeach
                </ul>
            </p>
            <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-primary">Edit Company Information</a>
        </div>
    </div>
    

  </x-site-layout>