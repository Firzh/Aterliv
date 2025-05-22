@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Permintaan Penjemputan</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('jemput.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_penjemputan">Tanggal</label>
            <input type="date" name="tanggal_penjemputan" id="tanggal_penjemputan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kota">Kota</label>
            <input type="text" name="kota" id="kota" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="waktu_penjemputan">Waktu Penjemputan</label>
            <input type="time" name="waktu_penjemputan" id="waktu_penjemputan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jenis_sampah">Jenis Sampah</label>
            <select name="jenis_sampah" id="jenis_sampah" class="form-control" required>
                <option value="" disabled selected>Pilih Jenis Sampah</option>
                @foreach ($jenisSampah as $js)
                    <option value="{{ $js->nama }}">{{ $js->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="perkiraan_berat">Perkiraan Berat (kg)</label>
            <input type="number" name="perkiraan_berat" id="perkiraan_berat" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="catatan">Catatan (opsional)</label>
            <textarea name="catatan" id="catatan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
    </form>

</div>
@endsection
