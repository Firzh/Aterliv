<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Kiri: Hamburger + Logo --}}
            <div class="flex items-center w-auto gap-2"> {{-- Removed w-2/12, letting content define width --}}
                <div class="md:hidden"> {{-- Changed from lg:hidden to md:hidden for standard mobile breakpoint --}}
                    <button onclick="toggleGuestMobileNav()"
                            class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"> {{-- Added focus ring --}}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <a href="{{ route('home') }}"
                   class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors duration-300"> {{-- Increased font size, bold, blue color, and hover effect --}}
                    Återliv
                </a>
            </div>

            {{-- Tengah: Link navigasi (desktop) --}}
            <div class="hidden md:flex justify-center items-center flex-grow gap-8"> {{-- Used flex-grow to take available space --}}
                <a href="{{ route('home') }}"
                   class="text-sm font-medium transition-colors duration-300
                   {{ request()->routeIs('home') ? 'text-blue-700 font-bold' : 'text-gray-600 hover:text-blue-500' }}"> {{-- Tailwind classes for active/inactive/hover --}}
                    Dashboard
                </a>

                <a href="{{ route('artikel') }}"
                   class="text-sm font-medium transition-colors duration-300
                   {{ request()->routeIs('artikel') ? 'text-blue-700 font-bold' : 'text-gray-600 hover:text-blue-500' }}"> {{-- Tailwind classes for active/inactive/hover --}}
                    Artikel
                </a>
            </div>

            {{-- Kanan: Tombol Login & Register (desktop) --}}
            <div class="hidden md:flex justify-end items-center w-auto gap-4"> {{-- Removed w-2/12, letting content define width --}}
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-semibold text-blue-600 border border-blue-500 rounded-md
                          hover:bg-blue-50 hover:border-blue-600 transition-all duration-300 transform hover:scale-105"> {{-- Stylish blue button --}}
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md
                          hover:bg-blue-700 transition-all duration-300 transform hover:scale-105"> {{-- Solid blue button --}}
                    Register
                </a>
            </div>
        </div>
    </div>

    <div id="guestMobileNav" class="hidden md:hidden px-4 pt-3 pb-4 border-t border-gray-200 space-y-2"> {{-- Changed from lg:hidden to md:hidden --}}
        <a href="{{ route('home') }}"
           class="block text-sm px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-200">
            Dashboard
        </a>
        <a href="{{ route('artikel') }}"
           class="block text-sm px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-200">
            Artikel
        </a>
        <a href="{{ url('/login-admin') }}" {{-- Assuming this is a developer login, keeping it here for now --}}
           class="block text-sm px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors duration-200">
            Developer
        </a>
        <hr class="border-gray-200 my-2"> {{-- Added a separator for clarity --}}
        <a href="{{ route('login') }}"
           class="block text-sm px-4 py-2 text-blue-600 font-semibold hover:bg-blue-50 rounded-md transition-colors duration-200">
            Login
        </a>
        <a href="{{ route('register') }}"
           class="block text-sm px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md transition-colors duration-200">
            Register
        </a>
    </div>
</nav>

<script>
    function toggleGuestMobileNav() {
        const menu = document.getElementById('guestMobileNav');
        menu.classList.toggle('hidden');
    }
</script>