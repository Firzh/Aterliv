<nav class="border-b border-gray-100 shadow-sm min-w-380">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Kolom 1: Logo + Hamburger -->
            <div class="flex items-center flex-shrink-0 gap-2 min-w-0">
                <div class="lg:hidden">
                    <button onclick="toggleMobileNav()" class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <a href="{{ route('user.home') }}"
                   class="flex items-center gap-2 text-base md:text-lg font-semibold text-gray-700 truncate whitespace-nowrap overflow-hidden">
                    <img src="{{ asset('images/LATERLIV.png') }}" alt="Logo" class="h-12 w-12 object-contain">
                    Återliv
                </a>
            </div>

            <!-- Kolom 2: Navigasi Desktop -->
            <div class="hidden md:flex justify-center items-center w-8/12 gap-8">
                <a href="{{ route('user.home') }}"
                   class="text-sm font-medium"
                   style="color: {{ request()->routeIs('user.home') ? '#1d4ed8' : '#4b5563' }};">
                    Dashboard
                </a>

                <a href="{{ route('pages.komunitas') }}"
                   class="text-sm font-medium"
                   style="color: {{ request()->routeIs('pages.komunitas') ? '#1d4ed8' : '#4b5563' }};">
                    Komunitas
                </a>

                <a href="{{ route('pages.statistik') }}"
                   class="text-sm font-medium"
                   style="color: {{ request()->routeIs('pages.statistik') ? '#1d4ed8' : '#4b5563' }};">
                    Statistik
                </a>

                @if(Auth::user() && Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-sm font-medium"
                       style="color: {{ request()->routeIs('admin.dashboard') ? '#1d4ed8' : '#4b5563' }};">
                        Admin Panel
                    </a>
                @endif
            </div>

            <!-- Kolom 3: Dropdown User -->
            <div class="hidden md:flex justify-end items-center w-2/12 gap-4">
                <div class="relative">
                    <button onclick="toggleUserDropdown()" class="flex items-center gap-1 text-sm text-gray-600 font-medium">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div id="userDropdownMenu"
                         class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 border border-gray-200 z-50">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                        </a>
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Admin Dashboard
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigasi Mobile -->
        <div id="mobileNavMenu" class="md:hidden hidden mt-2 space-y-2 px-2">
            <a href="{{ route('user.home') }}"
               class="block text-sm font-medium py-2"
               style="color: {{ request()->routeIs('user.home') ? '#1d4ed8' : '#4b5563' }};">
                Dashboard
            </a>
            <a href="{{ route('pages.komunitas') }}"
               class="block text-sm font-medium py-2"
               style="color: {{ request()->routeIs('pages.komunitas') ? '#1d4ed8' : '#4b5563' }};">
                Komunitas
            </a>
            <a href="{{ route('pages.statistik') }}"
               class="block text-sm font-medium py-2"
               style="color: {{ request()->routeIs('pages.statistik') ? '#1d4ed8' : '#4b5563' }};">
                Statistik
            </a>
            @if(Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                   class="block text-sm font-medium py-2"
                   style="color: {{ request()->routeIs('admin.dashboard') ? '#1d4ed8' : '#4b5563' }};">
                    Admin Panel
                </a>
            @endif

            <!-- Opsional: Tambahkan dropdown user di mobile jika ingin -->
            <a href="{{ route('profile.edit') }}"
               class="block text-sm text-gray-700 py-2">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit"
                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Log Out
            </button>
            </form>
        </div>
    </div>
</nav>

<script>
    function toggleUserDropdown() {
        const menu = document.getElementById('userDropdownMenu');
        menu.classList.toggle('hidden');
    }

    function toggleMobileNav() {
        const menu = document.getElementById('mobileNavMenu');
        menu.classList.toggle('hidden');
    }

    // Close dropdowns when clicked outside
    document.addEventListener('click', function(event) {
        const userBtn = event.target.closest('[onclick="toggleUserDropdown()"]');
        const userMenu = document.getElementById('userDropdownMenu');
        if (!userBtn && !event.target.closest('#userDropdownMenu')) {
            userMenu.classList.add('hidden');
        }
    });
</script>
