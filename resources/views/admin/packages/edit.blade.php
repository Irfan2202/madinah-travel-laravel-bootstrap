@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Paket: {{ $package->name }}</h3>

    <form action="{{ route('packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <!-- Nama Paket -->
                <div class="mb-3">
                    <label class="form-label">Nama Paket</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required>
                </div>

                <!-- Durasi -->
                <div class="mb-3">
                    <label class="form-label">Durasi</label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration', $package->duration) }}" required>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control">{{ old('description', $package->description) }}</textarea>
                </div>

                <!-- Hotel Madinah -->
                <div class="mb-3">
                    <label class="form-label">Hotel Madinah</label>
                    <input type="text" name="hotel_madinah" class="form-control" value="{{ old('hotel_madinah', $package->hotel_madinah) }}">
                </div>

                <!-- Hotel Makkah -->
                <div class="mb-3">
                    <label class="form-label">Hotel Makkah</label>
                    <input type="text" name="hotel_makkah" class="form-control" value="{{ old('hotel_makkah', $package->hotel_makkah) }}">
                </div>

                <!-- Maskapai -->
                <div class="mb-3">
                    <label class="form-label">Maskapai</label>
                    <input type="text" name="airline" class="form-control" value="{{ old('airline', $package->airline) }}">
                </div>

                <!-- Transportasi -->
                <div class="mb-3">
                    <label class="form-label">Transportasi</label>
                    <input type="text" name="transportation" class="form-control" value="{{ old('transportation', $package->transportation) }}">
                </div>

                <!-- URL Gambar -->
                <div class="mb-3">
                    <label class="form-label">URL Gambar</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image', $package->image) }}">
                </div>
            </div>

            <div class="col-md-6">
                <!-- Total Kuota -->
                <div class="mb-3">
                    <label class="form-label">Total Kuota</label>
                    <input type="number" name="total_quota" class="form-control" value="{{ old('total_quota', $package->total_quota) }}">
                </div>

                <!-- Sisa Kuota -->
                <div class="mb-3">
                    <label class="form-label">Sisa Kuota</label>
                    <input type="number" name="remaining_quota" class="form-control" value="{{ old('remaining_quota', $package->remaining_quota) }}">
                </div>

                <!-- Visa -->
                <div class="mb-3">
                    <label class="form-label">Jenis Visa</label>
                    <input type="text" name="visa_type" class="form-control" value="{{ old('visa_type', $package->visa_type) }}">
                </div>

                <!-- Tipe Kamar -->
                <div class="mb-3">
                    <label class="form-label">Tipe Kamar</label>
                    <input type="text" name="room_type" class="form-control" value="{{ old('room_type', $package->room_type) }}">
                </div>

                <!-- Makan -->
                <div class="mb-3">
                    <label class="form-label">Makan</label>
                    <input type="text" name="meal_type" class="form-control" value="{{ old('meal_type', $package->meal_type) }}">
                </div>

                <!-- Kota Berangkat -->
                <div class="mb-3">
                    <label class="form-label">Kota Berangkat</label>
                    <input type="text" name="departure_city" class="form-control" value="{{ old('departure_city', $package->departure_city) }}">
                </div>

                <!-- Tanggal Berangkat -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Berangkat</label>
                    <input type="date" name="departure_date" class="form-control" value="{{ old('departure_date', $package->departure_date) }}">
                </div>

                <!-- Tanggal Pulang -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Pulang</label>
                    <input type="date" name="return_date" class="form-control" value="{{ old('return_date', $package->return_date) }}">
                </div>

                <!-- Pembimbing -->
                <div class="mb-3">
                    <label class="form-label">Pembimbing</label>
                    <input type="text" name="guide_name" class="form-control" value="{{ old('guide_name', $package->guide_name) }}">
                </div>

                <!-- Populer -->
                <div class="form-check mb-3">
                    <input type="checkbox" name="is_popular" class="form-check-input" id="popularCheck" {{ old('is_popular', $package->is_popular) ? 'checked' : '' }}>
                    <label class="form-check-label" for="popularCheck">Paket Populer</label>
                </div>

                <!-- Catatan -->
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes" class="form-control">{{ old('notes', $package->notes) }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update Paket</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
