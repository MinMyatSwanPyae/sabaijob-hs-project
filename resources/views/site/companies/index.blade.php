<x-site-layout>

    <div class="container">
        <h2 class="font-bold text-2xl">Companies</h2>
    
        <ul class="list-disc pl-4">
          @foreach($companies as $company)
              <li>
                  <a class="underline" href="/companies/{{$company->id}}">{{$company->name}}</a>
              </li>
          @endforeach
        </ul>
    
        {{ $companies->links() }} 
    </div>
    

</x-site-layout>