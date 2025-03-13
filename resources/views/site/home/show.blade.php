<x-site-layout>

<h1> Hi This is Home </h1> 

<div class="container">
    <h1>Welcome to SabaiJob</h1>
    @auth
        @if (auth()->user()->role === 'admin')
            <div class="alert alert-success" role="alert">
                You are logged in as an admin. You have full access to manage the system.
            </div>
        @endif
    @endauth

    {{-- Other content --}}
</div>


</x-site-layout>