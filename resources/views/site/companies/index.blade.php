<x-site-layout>

    <div class="container">
        <h2 class="font-bold text-2xl">Companies</h2>
    
        <ul class="list-disc pl-4">
          @foreach($companies as $company)
              <li>
                  <a class="underline" href="/companies/{{$company->id}}">{{$company->name}}</a> 
                  <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
    
                  <form method="POST" action="{{ route('companies.destroy', $company->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</button>
                  </form>
              </li>
          @endforeach
        </ul>
    
        {{ $companies->links() }} 
    </div>
    

</x-site-layout>