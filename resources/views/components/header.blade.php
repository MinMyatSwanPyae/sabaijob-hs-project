<body>
    <div class="bg-pink-500 text-black">
        <div class="max-w-7xl mx-auto flex justify-between items-center h-20">
            <div class="font-bold text-lg">Sabai Job</div>
            <ul class="flex gap-x-6">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <!-- Admin-specific link -->
                        <li><a href="/admin/vacancies">Vacancies</a></li>
                        <li><a href="/admin/companies">My Company</a></li>

                    @else
                        <!-- Normal user link -->
                        <li><a href="/vacancies">Vacancies</a></li>
                        <li><a href="/companies">Companies</a></li>
                        <li>My Application</li>
                    @endif
                @else
                    <!-- Guest link (default public view) -->
                    <li><a href="/vacancies">Vacancies</a></li>
                    <li><a href="/companies">Companies</a></li>
                @endauth
                <li>Contact us</li>
            </ul>

            @auth
            <div class="flex items-center gap-x-4">
                <!-- Display user's name -->
                <span>{{ Auth::user()->name }}</span>

                <!-- Logout button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-white bg-red-500 px-3 py-1 rounded hover:bg-red-600">Logout</button>
                </form>
            </div>
            @endauth

            @guest
            <div>
                <a href="{{ route('login') }}" class="text-white">Login</a>
            </div>
            @endguest
        </div>
    </div>
</body>
