@extends('layouts.app') {{-- Sesuaikan jika kamu pakai layout lain --}}

@section('content')
<div class="container">
    <h2 class="mb-4">Produk Kami</h2>

    {{-- Pesan sukses atau error --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tampilkan poin user --}}
    <div class="mb-3">
        <h5>Saldo Poin Anda: <strong>{{ auth()->user()->reward_points }} Poin</strong></h5>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>{{ $product->poin_harga }} Poin</strong></p>

                        @if (auth()->user()->reward >= $product->poin_harga)
                            <form method="POST" action="{{ route('produk.tukar_poin', $product->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">Tukar Sekarang</button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100" disabled>Poin Tidak Cukup</button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
