@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="container-fluid py-4">
            <h3 class="mb-4">Edit Paket: {{ $package->title }}</h3>

            <form action="{{ route('packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">Nama Paket</label>
                                    <input type="text" name="title" value="{{ old('title', $package->title) }}"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" rows="4">{{ old('description', $package->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Pemandu</label>
                                    <input type="text" name="guide_name"
                                        value="{{ old('guide_name', $package->guide_name) }}" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hotel Makkah</label>
                                        <input type="text" name="hotel_makkah"
                                            value="{{ old('hotel_makkah', $package->hotel_makkah) }}" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hotel Madinah</label>
                                        <input type="text" name="hotel_madinah"
                                            value="{{ old('hotel_madinah', $package->hotel_madinah) }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Berangkat</label>
                                        <input type="date" name="departure_date"
                                            value="{{ old('departure_date', $package->departure_date) }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Pulang</label>
                                        <input type="date" name="return_date"
                                            value="{{ old('return_date', $package->return_date) }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Durasi (hari)</label>
                                        <input type="number" name="duration_days"
                                            value="{{ old('duration_days', $package->duration_days) }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Rating Hotel</label>
                                        <input type="number" name="hotel_stars"
                                            value="{{ old('hotel_stars', $package->hotel_stars) }}" class="form-control"
                                            min="1" max="5" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Hari Keberangkatan</label>
                                        <input type="text" name="departure_day"
                                            value="{{ old('departure_day', $package->departure_day) }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Total Kuota</label>
                                        <input type="number" name="total_pax"
                                            value="{{ old('total_pax', $package->total_pax) }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kuota Tersedia</label>
                                        <input type="number" name="available_pax"
                                            value="{{ old('available_pax', $package->available_pax) }}"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kota Keberangkatan</label>
                                    <input type="text" name="departure_location"
                                        value="{{ old('departure_location', $package->departure_location) }}"
                                        class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Maskapai</label>
                                        <input type="text" name="airline"
                                            value="{{ old('airline', $package->airline) }}" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Rute Penerbangan</label>
                                        <input type="text" name="flight_route"
                                            value="{{ old('flight_route', $package->flight_route) }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">URL Gambar</label>
                                    <input type="text" name="image" value="{{ old('image', $package->image) }}"
                                        class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-save"></i> Update Paket
                                </button>
                                <a href="{{ route('packages.index') }}" class="btn btn-secondary">Kembali</a>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
