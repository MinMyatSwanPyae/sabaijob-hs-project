<x-site-layout>

  <body class="bg-gray-100">
    <div class="container mx-auto px-4">
      <div class="mt-6">
          <h1 class="text-2xl font-bold mb-4">Welcome to Sabai Job Portal</h1>
  
          <!-- Latest Vacancies Section -->
          <div class="latest-vacancies mb-8">
              <h2 class="text-xl font-semibold mb-3">Latest Vacancies</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                  @foreach($latestVacancies as $vacancy)
                      <div class="bg-white p-4 shadow rounded hover:bg-gray-50">
                          <h3 class="font-bold text-lg">{{ $vacancy->title }}</h3>
                          <p class="text-sm text-gray-600">{{ $vacancy->description }}</p>
                          <p class="text-sm text-gray-500">Location: {{ $vacancy->location }}</p>
                          <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-pink-500 hover:text-pink-700 mt-2 inline-block">View Details</a>
                      </div>
                  @endforeach
              </div>
          </div>
  
          <!-- Top Companies Section -->
          <div class="top-companies mb-8">
              <h2 class="text-xl font-semibold mb-3">Top Companies</h2>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  @foreach($topCompanies as $company)
                      <div class="bg-white p-4 shadow rounded hover:bg-gray-50">
                          <h3 class="font-bold text-lg">{{ $company->name }}</h3>
                          <p class="text-sm text-gray-500">{{ $company->vacancies_count }} vacancies</p>
                          <a href="#" class="text-pink-500 hover:text-pink-700 mt-2 inline-block">View Company</a>
                      </div>
                  @endforeach
              </div>
          </div>
  
          <!-- User's Applications Section -->
          @auth
              <div class="user-applications mb-8">
                  <h2 class="text-xl font-semibold mb-3">Your Applications</h2>
                  <div class="grid grid-cols-1 gap-4">
                      @foreach(auth()->user()->applications as $application)
                          <div class="bg-white p-4 shadow rounded hover:bg-gray-50">
                              <h3 class="font-bold text-lg">{{ $application->vacancy->title }}</h3>
                              <p class="text-sm text-gray-600">{{ $application->vacancy->description }}</p>
                              <p class="text-sm text-gray-500">Applied on: {{ $application->created_at->format('M d, Y') }}</p>
                              <a href="#" class="text-pink-500 hover:text-pink-700 mt-2 inline-block">View Application</a>
                          </div>
                      @endforeach
                  </div>
              </div>
          @endauth
      </div>
  </div>
  
  


</x-site-layout>