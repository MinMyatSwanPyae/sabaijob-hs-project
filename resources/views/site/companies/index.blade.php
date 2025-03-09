<x-site-layout>
  <h2> Companies Haha </h2> 
  <ul>
    @foreach ($companies as $company)
    <li> <a href="/companies/{{$company->id}}"> {{$company->title}} </a> </li>
      
    @endforeach
    
  </ul> 
  </x-site-layout>