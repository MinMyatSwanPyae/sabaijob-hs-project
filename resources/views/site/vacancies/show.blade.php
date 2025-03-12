<x-site-layout>
    <h2 class="font-bold mb-4 text-4xl">{{$vacancy->title}}</h2>
    <p>{{$vacancy->description}}</p>
    <x-see-recruiter-profile :recruiter="$vacancy->recruiter" />
</x-site-layout>



