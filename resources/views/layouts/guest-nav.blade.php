<nav class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Flex layout: 15% - 70% - 15% -->
        <div class="flex items-center justify-between h-16">

            {{-- Kiri: Hamburger + Logo --}}
            <div class="flex items-center w-2/12 gap-2">
                <!-- Hamburger (untuk mobile) -->
                <div class="lg:hidden">
                    <button onclick="toggleGuestMobileNav()"
                            class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <a href="{{ route('home') }}"
                   class="text-lg font-semibold text-gray-700"
                   style="text-decoration: none;">
                    Återliv
                </a>
            </div>

            {{-- Tengah: Link navigasi --}}
            <div class="hidden md:flex justify-center items-center w-8/12 gap-8">
                <a href="{{ route('home') }}"
                   class="text-sm font-medium"
                   style="color: {{ request()->routeIs('home') ? '#1d4ed8' : '#4b5563' }}; text-decoration: none;">
                    Dashboard
                </a>

                <a href="{{ route('artikel') }}"
                   class="text-sm font-medium"
                   style="color: {{ request()->routeIs('artikel') ? '#1d4ed8' : '#4b5563' }}; text-decoration: none;">
                    Artikel
                </a>        
            </div>

            {{-- Kanan: Tombol Login & Register --}}
            <div class="hidden md:flex justify-end items-center w-2/12 gap-4">
                <a href="{{ route('login') }}"
                   style="padding: 6px 10px; font-size: 14px; color: #4b5563; text-decoration: none; border: 1px solid #d1d5db; border-radius: 6px;">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   style="padding: 6px 10px; font-size: 14px; color: white; background-color: #4f46e5; text-decoration: none; border-radius: 6px;">
                    Register
                </a>                 
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="guestMobileNav" class="hidden lg:hidden px-4 pt-3 pb-4 border-t border-gray-200 space-y-2">
        <a href="{{ route('home') }}"
           class="block text-sm px-4 py-2 text-gray-700"
           style="text-decoration: none;">
            Dashboard
        </a>
        <a href="{{ route('artikel') }}"
           class="block text-sm px-4 py-2 text-gray-700"
           style="text-decoration: none;">
            Artikel
        </a>
        <a href="{{ url('/login-admin') }}"
           class="block text-sm px-4 py-2 text-gray-700"
           style="text-decoration: none;">
            Developer
        </a>        
        <a href="{{ route('login') }}"
           class="block text-sm px-4 py-2 text-gray-700"
           style="text-decoration: none;">
            Login
        </a>
        <a href="{{ route('register') }}"
           class="block text-sm px-4 py-2 text-gray-700"
           style="text-decoration: none;">
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
