@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="container-fluid py-4">
            <h3 class="mb-4">Tambah Paket Baru</h3>

            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama Paket</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Pemandu</label>
                                    <input type="text" name="guide_name" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hotel Makkah</label>
                                        <input type="text" name="hotel_makkah" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Hotel Madinah</label>
                                        <input type="text" name="hotel_madinah" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Berangkat</label>
                                        <input type="date" name="departure_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Pulang</label>
                                        <input type="date" name="return_date" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Durasi (hari)</label>
                                        <input type="number" name="duration_days" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Rating Hotel</label>
                                        <input type="number" name="hotel_stars" class="form-control" min="1"
                                            max="5" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Hari Keberangkatan</label>
                                        <input type="text" name="departure_day" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Total Kuota</label>
                                        <input type="number" name="total_pax" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kuota Tersedia</label>
                                        <input type="number" name="available_pax" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kota Keberangkatan</label>
                                    <input type="text" name="departure_location" class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Maskapai</label>
                                        <input type="text" name="airline" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Rute Penerbangan</label>
                                        <input type="text" name="flight_route" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">URL Gambar</label>
                                    <input type="text" name="image" class="form-control"
                                        placeholder="contoh: uploads/package1.jpg">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Paket
                                </button>
                                <a href="{{ route('packages.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
