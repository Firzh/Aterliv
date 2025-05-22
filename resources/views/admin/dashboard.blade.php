<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Configuration') }}
        </h2>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Message --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 text-lg font-semibold">
                    {{ __("Welcome Admin!") }}
                </div>
            </div>

            {{-- Statistik singkat --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">Total Users</h3>
                    <p class="text-3xl text-blue-600">{{ $totalUsers ?? '0' }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">Total Penjemputan</h3>
                    <p class="text-3xl text-green-600">{{ $totalOrders ?? '0' }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-2">Pending Approvals</h3>
                    <p class="text-3xl text-red-600">{{ $pendingApprovals ?? '0' }}</p>
                </div>
            </div>

            {{-- Daftar aktivitas terbaru --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Recent Activities</h3>
                @if(isset($activities) && count($activities) > 0)
                    <ul class="list-disc list-inside text-gray-700">
                        @foreach ($activities as $activity)
                            <li>{{ $activity->description }} — <small class="text-gray-500">{{ $activity->created_at->diffForHumans() }}</small></li>
                        @endforeach
                    </ul>
                @else
                    <p>No recent activities found.</p>
                @endif
            </div>

            {{-- Navigasi cepat --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.users.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">Manage Users</a>
                    <a href="{{ route('admin.products.index') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Manage Products</a>
                    <a href="{{ route('admin.penjemputan.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">Manage Penjemputan</a>
                </div>
            </div>

        </div>
    </div>
    </x-slot>
</x-app-layout>
