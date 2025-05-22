@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Permintaan Penjemputan Sampah</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('jemputan.create') }}" class="btn btn-success">+ Buat Permintaan Baru</a>
        </div>

        @if($penjemputan->isEmpty())
            <p>Belum ada permintaan penjemputan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jenis Sampah</th>
                            <th>Perkiraan Berat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjemputan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tanggal_penjemputan }}</td>
                                <td>{{ $item->waktu_penjemputan }}</td>
                                <td>{{ $item->jenis_sampah }}</td>
                                <td>{{ $item->perkiraan_berat }} kg</td>
                                <td>
                                    <span class="badge
                                        @if($item->status === 'menunggu') bg-warning
                                        @elseif($item->status === 'diproses') bg-primary
                                        @elseif($item->status === 'selesai') bg-success
                                        @else bg-danger
                                        @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
