<nav class="shadow-sm bg-white">
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
            <div class="hidden md:flex justify-center items-center flex-grow gap-8"> {{-- Changed w-8/12 to flex-grow --}}
                <a href="{{ route('user.home') }}"
                   class="text-sm font-medium hover:text-blue-700 transition-colors duration-200"
                   style="color: {{ request()->routeIs('user.home') ? '#1d4ed8' : '#4b5563' }};">
                    Dashboard
                </a>

                <a href="{{ route('pages.komunitas') }}"
                   class="text-sm font-medium hover:text-blue-700 transition-colors duration-200"
                   style="color: {{ request()->routeIs('pages.komunitas') ? '#1d4ed8' : '#4b5563' }};">
                    Komunitas
                </a>

                {{-- Consolidated Dropdown --}}
                <div class="relative">
                    @php
                        $isAksiActive = request()->routeIs(['pages.kalkulator', 'pages.kontribusi', 'pages.reward', 'pages.jemput.create','views.prodcuts.index']);
                    @endphp
                    <button onclick="toggleAksiDropdown()"
                            class="flex items-center gap-1 text-sm font-medium hover:text-blue-700 transition-colors duration-200"
                            style="color: {{ $isAksiActive ? '#1d4ed8' : '#4b5563' }};">
                        Aksi Lingkungan
                        <svg class="w-4 h-4 transform transition-transform duration-200" id="aksiDropdownArrow" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div id="aksiDropdownMenu"
                         class="hidden absolute left-1/2 -translate-x-1/2 mt-2 w-48 bg-white rounded-md shadow-lg py-2 border border-gray-200 z-50 origin-top transform scale-95 opacity-0 transition-all duration-200 ease-out">
                        <a href="{{ route('pages.kalkulator.index') }}" {{-- Changed route to pages.kalkulator --}}
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Hitung Emisi
                        </a>
                        <a href="{{ route('pages.kontribusi') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Kontribusi Saya
                        </a>
                        <a href="{{ route('reward.index') }}" {{-- Changed route to pages.reward --}}
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Tukar Reward
                        </a>
                        <a href="{{ route('pages.jemput.store') }}" {{-- Changed route to pages.jemput --}}
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Penjemputan Sampah
                        </a>
                        <a href="{{ route('products.index') }}" {{-- Changed route to pages.jemput --}}
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Produk
                        </a>
                    </div>
                </div>
                {{-- End Consolidated Dropdown --}}

                @if(Auth::user() && Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-sm font-medium hover:text-blue-700 transition-colors duration-200"
                       style="color: {{ request()->routeIs('admin.dashboard') ? '#1d4ed8' : '#4b5563' }};">
                        Admin Panel
                    </a>
                @endif
            </div>

            <!-- Kolom 3: Dropdown User -->
            <div class="hidden md:flex justify-end items-center w-2/12 gap-4">
                <div class="relative">
                    <button onclick="toggleUserDropdown()" class="flex items-center gap-1 text-sm text-gray-600 font-medium hover:text-blue-700 transition-colors duration-200">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 transform transition-transform duration-200" id="userDropdownArrow" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div id="userDropdownMenu"
                         class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 border border-gray-200 z-50 origin-top-right transform scale-95 opacity-0 transition-all duration-200 ease-out">
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
        <div id="mobileNavMenu" class="md:hidden hidden mt-2 pb-4 space-y-2 px-2 bg-white rounded-b-md shadow-md">
            <a href="{{ route('user.home') }}"
               class="block text-sm font-medium py-2 px-3 rounded-md hover:bg-gray-100 transition-colors duration-200"
               style="color: {{ request()->routeIs('user.home') ? '#1d4ed8' : '#4b5563' }};">
                Dashboard
            </a>
            <a href="{{ route('pages.komunitas') }}"
               class="block text-sm font-medium py-2 px-3 rounded-md hover:bg-gray-100 transition-colors duration-200"
               style="color: {{ request()->routeIs('pages.komunitas') ? '#1d4ed8' : '#4b5563' }};">
                Komunitas
            </a>

            {{-- Consolidated Dropdown for Mobile --}}
            <div>
                <button onclick="toggleMobileAksiDropdown()"
                        class="flex items-center justify-between w-full text-left text-sm font-medium py-2 px-3 rounded-md hover:bg-gray-100 transition-colors duration-200"
                        style="color: {{ $isAksiActive ? '#1d4ed8' : '#4b5563' }};">
                    <span>Aksi Lingkungan</span>
                    <svg class="w-4 h-4 transform transition-transform duration-200" id="mobileAksiDropdownArrow" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="mobileAksiDropdownMenu" class="hidden pl-4 space-y-1">
                    <a href="{{ route('pages.kalkulator.index') }}"
                       class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                        Hitung Emisi
                    </a>
                    <a href="{{ route('pages.kontribusi') }}"
                       class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                        Kontribusi Saya
                    </a>
                    <a href="{{ route('reward.index') }}"
                       class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                        Tukar Reward
                    </a>
                    <a href="{{ route('pages.jemput.index') }}"
                       class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                        Penjemputan Sampah
                    </a>
                </div>
            </div>
            {{-- End Consolidated Dropdown for Mobile --}}

            @if(Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                   class="block text-sm font-medium py-2 px-3 rounded-md hover:bg-gray-100 transition-colors duration-200"
                   style="color: {{ request()->routeIs('admin.dashboard') ? '#1d4ed8' : '#4b5563' }};">
                    Admin Panel
                </a>
            @endif

            <!-- User specific links in mobile menu -->
            <div class="border-t border-gray-200 pt-2 mt-2">
                <a href="{{ route('profile.edit') }}"
                   class="block text-sm text-gray-700 py-2 px-3 rounded-md hover:bg-gray-100">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left py-2 px-3 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // General function to toggle dropdowns with scale and opacity
    function toggleDropdown(menuId, arrowId) {
        const menu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);

        menu.classList.toggle('hidden');
        menu.classList.toggle('scale-95');
        menu.classList.toggle('opacity-0');
        menu.classList.toggle('scale-100');
        menu.classList.toggle('opacity-100');

        if (arrow) {
            arrow.classList.toggle('rotate-180');
        }
    }

    // Specific toggles for each dropdown
    function toggleUserDropdown() {
        toggleDropdown('userDropdownMenu', 'userDropdownArrow');
    }

    function toggleAksiDropdown() {
        toggleDropdown('aksiDropdownMenu', 'aksiDropdownArrow');
    }

    function toggleMobileNav() {
        const menu = document.getElementById('mobileNavMenu');
        menu.classList.toggle('hidden');
        // Close any open mobile dropdowns when main mobile nav is closed
        if (menu.classList.contains('hidden')) {
            const mobileAksiMenu = document.getElementById('mobileAksiDropdownMenu');
            const mobileAksiArrow = document.getElementById('mobileAksiDropdownArrow');
            if (!mobileAksiMenu.classList.contains('hidden')) {
                mobileAksiMenu.classList.add('hidden');
                mobileAksiArrow.classList.remove('rotate-180');
            }
        }
    }

    function toggleMobileAksiDropdown() {
        const menu = document.getElementById('mobileAksiDropdownMenu');
        const arrow = document.getElementById('mobileAksiDropdownArrow');
        menu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }


    // Close dropdowns when clicked outside
    document.addEventListener('click', function(event) {
        // User Dropdown
        const userBtn = event.target.closest('[onclick="toggleUserDropdown()"]');
        const userMenu = document.getElementById('userDropdownMenu');
        if (!userBtn && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden', 'scale-95', 'opacity-0');
            userMenu.classList.remove('scale-100', 'opacity-100');
            document.getElementById('userDropdownArrow').classList.remove('rotate-180');
        }

        // Aksi Dropdown (Desktop)
        const aksiBtn = event.target.closest('[onclick="toggleAksiDropdown()"]');
        const aksiMenu = document.getElementById('aksiDropdownMenu');
        if (!aksiBtn && !aksiMenu.contains(event.target)) {
            aksiMenu.classList.add('hidden', 'scale-95', 'opacity-0');
            aksiMenu.classList.remove('scale-100', 'opacity-100');
            document.getElementById('aksiDropdownArrow').classList.remove('rotate-180');
        }

        // Mobile Nav (handled by toggleMobileNav itself)
        const mobileNavButton = event.target.closest('[onclick="toggleMobileNav()"]');
        const mobileNavMenu = document.getElementById('mobileNavMenu');
        if (!mobileNavButton && !mobileNavMenu.contains(event.target) && !mobileNavMenu.classList.contains('hidden')) {
            // This case is handled by the toggleMobileNav logic when it's closed
            // No need for additional action here, as it would conflict.
        }

        // Mobile Aksi Dropdown
        const mobileAksiBtn = event.target.closest('[onclick="toggleMobileAksiDropdown()"]');
        const mobileAksiMenu = document.getElementById('mobileAksiDropdownMenu');
        if (!mobileAksiBtn && !mobileAksiMenu.contains(event.target) && !mobileAksiMenu.classList.contains('hidden')) {
            mobileAksiMenu.classList.add('hidden');
            document.getElementById('mobileAksiDropdownArrow').classList.remove('rotate-180');
        }
    });
</script>
