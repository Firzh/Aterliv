@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Role</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b capitalize">{{ $user->role }}</td>
                    <td class="py-2 px-4 border-b flex gap-2">
                        <!-- Tombol toggle role -->
                        <form action="{{ route('admin.users.toggleAdmin', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin mengubah role user ini?')">
                            @csrf
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">
                                {{ $user->role === 'admin' ? 'Jadikan User' : 'Jadikan Admin' }}
                            </button>
                        </form>

                        <!-- Tombol hapus -->
                        @if(Auth::user()->role === 'admin' && $user->id !== Auth::id())
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                Hapus User
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach

        </tbody>
    </table>
</div>
@endsection
