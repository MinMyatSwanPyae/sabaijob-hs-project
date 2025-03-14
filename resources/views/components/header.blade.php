<head> <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> </head>

<body>
    <header class="bg-pink-500 text-white shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center h-20 px-6">
            <!-- Logo -->
            <div class="text-2xl font-extrabold tracking-wide">
                <a href="/" class="hover:text-gray-200 transition">Sabai Job</a>
            </div>

            <!-- Navigation Links -->
            <nav class="hidden md:flex gap-x-6 text-lg font-semibold">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="/admin/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                        <a href="/admin/companies" class="hover:text-gray-200 transition">My Company</a>
                    @else
                        <a href="/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                        <a href="/companies" class="hover:text-gray-200 transition">Companies</a>
                        <a href="/applications" class="hover:text-gray-200 transition">My Applications</a>
                    @endif
                @else
                    <a href="/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                    <a href="/companies" class="hover:text-gray-200 transition">Companies</a>
                @endauth
            </nav>

            <!-- User Dropdown & Logout Button -->
            @auth
                <div class="relative">
                    <button id="userDropdownBtn" class="flex items-center gap-x-2 text-lg font-semibold hover:text-gray-200">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div id="userDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white text-gray-800 shadow-lg rounded-md hidden">
                        <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-lg font-semibold hover:text-gray-200 transition">Login</a>
            @endguest

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden flex items-center">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-pink-600 py-3 px-6">
            <nav class="flex flex-col gap-y-3">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="/admin/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                        <a href="/admin/companies" class="hover:text-gray-200 transition">My Company</a>
                    @else
                        <a href="/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                        <a href="/companies" class="hover:text-gray-200 transition">Companies</a>
                        <a href="/applications" class="hover:text-gray-200 transition">My Applications</a>
                    @endif
                @else
                    <a href="/vacancies" class="hover:text-gray-200 transition">Vacancies</a>
                    <a href="/companies" class="hover:text-gray-200 transition">Companies</a>
                @endauth
            </nav>
        </div>
    </header>

    <script>
        // Toggle User Dropdown
        document.getElementById('userDropdownBtn')?.addEventListener('click', function() {
            document.getElementById('userDropdownMenu').classList.toggle('hidden');
        });

        // Toggle Mobile Menu
        document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>

</body>

