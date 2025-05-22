@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Riwayat Penukaran Reward</h1>

    <table class="w-full text-sm border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Reward</th>
                <th class="p-2 border">Poin Digunakan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayats as $item)
                <tr>
                    <td class="p-2 border">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="p-2 border">{{ $item->reward->nama }}</td>
                    <td class="p-2 border">{{ $item->reward->poin_diperlukan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">Belum ada penukaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
