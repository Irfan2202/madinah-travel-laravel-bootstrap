@extends('layouts.app')

@section('content')
    <section class="section-package-detail py-5">
        <div class="container">
            {{-- Header --}}
            <div class="row mb-5">
                <div class="col-lg-6">
                    @if ($package->image)
                        <img src="{{ asset('storage/' . $package->image) }}" class="img-fluid rounded shadow"
                            alt="{{ $package->title }}">
                    @endif
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold text-primary mb-3">{{ strtoupper($package->title) }}</h2>
                    <p class="text-muted mb-4">{{ $package->description }}</p>

                    <ul class="list-unstyled">
                        <li><strong>Jadwal Berangkat:</strong> {{ $package->departure_day }}
                            ({{ \Carbon\Carbon::parse($package->departure_date)->format('d F Y') }})</li>
                        <li><strong>Durasi:</strong> {{ $package->duration_days }} Hari</li>
                        <li><strong>Hotel Makkah:</strong> {{ $package->hotel_makkah ?? '-' }}</li>
                        <li><strong>Hotel Madinah:</strong> {{ $package->hotel_madinah ?? '-' }}</li>
                        <li><strong>Kelas Hotel:</strong> {{ $package->hotel_stars }} ⭐</li>
                        <li><strong>Maskapai:</strong> {{ $package->airline ?? '-' }}</li>
                        <li><strong>Rute Penerbangan:</strong> {{ $package->flight_route ?? '-' }}</li>
                        <li><strong>Guide:</strong> {{ $package->guide_name ?? '-' }}</li>
                    </ul>
                </div>
            </div>

            {{-- Harga --}}
            <div class="row mt-4">
                <div class="col-12 text-center mb-4">
                    <h3 class="fw-bold text-gold">Harga Paket</h3>
                    <p class="text-muted">Harga berlaku untuk semua paket (global)</p>
                </div>

                @foreach ($prices as $price)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body">
                                <h5 class="fw-bold text-uppercase mb-2">{{ $price->type }}</h5>
                                <h4 class="text-primary fw-bold mb-3">
                                    Rp {{ number_format($price->price, 0, ',', '.') }}
                                </h4>
                                <p class="small text-muted">Per orang, sudah termasuk visa, tiket, hotel, dan pembimbing.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol --}}
            <div class="text-center mt-5">
                <a href="#" class="btn btn-warning px-4 py-2">Pesan Sekarang</a>
            </div>
        </div>
    </section>
@endsection
