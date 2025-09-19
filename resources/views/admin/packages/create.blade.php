@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-4">Tambah Paket Baru</h3>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Paket</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Paket</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama paket">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <input type="number" name="price" class="form-control" id="price"
                                        placeholder="Harga paket">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">Durasi</label>
                                    <input type="text" name="duration" class="form-control" id="duration"
                                        placeholder="Contoh: 9 Hari">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="hotel_madinah" class="form-label">Hotel Madinah</label>
                                    <input type="text" name="hotel_madinah" class="form-control" id="hotel_madinah">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="hotel_makkah" class="form-label">Hotel Makkah</label>
                                    <input type="text" name="hotel_makkah" class="form-control" id="hotel_makkah">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="airline" class="form-label">Maskapai</label>
                                    <input type="text" name="airline" class="form-control" id="airline">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="transportation" class="form-label">Transportasi</label>
                                    <input type="text" name="transportation" class="form-control" id="transportation">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="total_quota" class="form-label">Total Kuota</label>
                                    <input type="number" name="total_quota" class="form-control" id="total_quota">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="remaining_quota" class="form-label">Sisa Kuota</label>
                                    <input type="number" name="remaining_quota" class="form-control" id="remaining_quota">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="visa_type" class="form-label">Jenis Visa</label>
                                    <input type="text" name="visa_type" class="form-control" id="visa_type">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="room_type" class="form-label">Tipe Kamar</label>
                                    <input type="text" name="room_type" class="form-control" id="room_type">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="meal_type" class="form-label">Jenis Makan</label>
                                    <input type="text" name="meal_type" class="form-control" id="meal_type">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="departure_city" class="form-label">Kota Keberangkatan</label>
                                    <input type="text" name="departure_city" class="form-control"
                                        id="departure_city">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="departure_date" class="form-label">Tanggal Berangkat</label>
                                    <input type="date" name="departure_date" class="form-control"
                                        id="departure_date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="return_date" class="form-label">Tanggal Pulang</label>
                                    <input type="date" name="return_date" class="form-control" id="return_date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="guide_name" class="form-label">Nama Pembimbing</label>
                                    <input type="text" name="guide_name" class="form-control" id="guide_name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="is_popular" class="form-label">Status Populer</label>
                                    <select name="is_popular" id="is_popular" class="form-control">
                                        <option value="0">Reguler</option>
                                        <option value="1">Populer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan</label>
                                <textarea name="notes" class="form-control" id="notes" rows="3"></textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('packages.index') }}" class="btn btn-secondary">
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
