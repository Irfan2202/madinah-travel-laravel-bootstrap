@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-4">Edit Paket: {{ $package->title }}</h3>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Paket</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('packages.update', $package->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Nama Paket <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title', $package->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price_quad" class="form-label">Harga (Per Pax - QUAD) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="price_quad"
                                        class="form-control @error('price_quad') is-invalid @enderror" id="price_quad"
                                        value="{{ old('price_quad', $package->price_quad) }}" required min="0">
                                    @error('price_quad')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="price_triple" class="form-label">Harga (Per Pax - Triple)</label>
                                    <input type="number" name="price_triple"
                                        class="form-control @error('price_triple') is-invalid @enderror" id="price_triple"
                                        value="{{ old('price_triple', $package->price_triple) }}" min="0">
                                    @error('price_triple')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price_double" class="form-label">Harga (Per Pax - Double)</label>
                                    <input type="number" name="price_double"
                                        class="form-control @error('price_double') is-invalid @enderror" id="price_double"
                                        value="{{ old('price_double', $package->price_double) }}" min="0">
                                    @error('price_double')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="hotel_stars" class="form-label">Rating Hotel (Bintang)</label>
                                    <input type="number" name="hotel_stars"
                                        class="form-control @error('hotel_stars') is-invalid @enderror" id="hotel_stars"
                                        value="{{ old('hotel_stars', $package->hotel_stars) }}" min="1"
                                        max="5">
                                    @error('hotel_stars')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="duration_days" class="form-label">Durasi (Hari) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="duration_days"
                                        class="form-control @error('duration_days') is-invalid @enderror" id="duration_days"
                                        value="{{ old('duration_days', $package->duration_days) }}" required
                                        min="1">
                                    @error('duration_days')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Gambar Utama (Kosongkan jika tidak
                                        diubah)</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" id="image"
                                        accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if ($package->image)
                                        <small class="form-text text-muted">Gambar saat ini:
                                            {{ basename($package->image) }}</small>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4">
                            <h5 class="mb-3 text-secondary">Kuota & Jadwal</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="total_seats" class="form-label">Total Seat <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="total_seats"
                                        class="form-control @error('total_seats') is-invalid @enderror" id="total_seats"
                                        value="{{ old('total_seats', $package->total_seats) }}" required min="1">
                                    @error('total_seats')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="available_seats" class="form-label">Available Seat <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="available_seats"
                                        class="form-control @error('available_seats') is-invalid @enderror"
                                        id="available_seats"
                                        value="{{ old('available_seats', $package->available_seats) }}" required
                                        min="0">
                                    @error('available_seats')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="airline" class="form-label">Maskapai</label>
                                    <input type="text" name="airline"
                                        class="form-control @error('airline') is-invalid @enderror" id="airline"
                                        value="{{ old('airline', $package->airline) }}">
                                    @error('airline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="flight_route" class="form-label">Rute Penerbangan</label>
                                    <input type="text" name="flight_route"
                                        class="form-control @error('flight_route') is-invalid @enderror"
                                        id="flight_route" value="{{ old('flight_route', $package->flight_route) }}">
                                    @error('flight_route')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="departure_location" class="form-label">Kota Keberangkatan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="departure_location"
                                        class="form-control @error('departure_location') is-invalid @enderror"
                                        id="departure_location"
                                        value="{{ old('departure_location', $package->departure_location) }}" required>
                                    @error('departure_location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="departure_date" class="form-label">Tanggal Berangkat <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="departure_date"
                                        class="form-control @error('departure_date') is-invalid @enderror"
                                        id="departure_date"
                                        value="{{ old('departure_date', \Carbon\Carbon::parse($package->departure_date)->format('Y-m-d')) }}"
                                        required>
                                    @error('departure_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="notes_optional" class="form-label">Catatan Tambahan (Opsional)</label>
                                    <textarea name="notes_optional" class="form-control" id="notes_optional" rows="3">{{ old('notes_optional', $package->notes_optional ?? '') }}</textarea>
                                    @error('notes_optional')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Update Paket
                                </button>
                                <a href="{{ route('packages.index') }}" class="btn btn-secondary ms-2">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
