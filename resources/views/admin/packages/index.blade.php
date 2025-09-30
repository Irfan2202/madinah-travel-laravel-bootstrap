@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-3">Daftar Paket</h3>
                <a href="{{ route('packages.create') }}" class="btn btn-primary mb-3">
                    <i class="bi bi-plus-circle"></i> Tambah Paket Baru
                </a>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Paket Perjalanan</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Paket</th>
                                    <th>Durasi</th>
                                    <th>Rating Hotel</th>
                                    <th>Harga (QUAD)</th>
                                    <th>Kuota</th>
                                    <th>Kota Berangkat</th>
                                    <th>Maskapai & Rute</th>
                                    <th>Tanggal Berangkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $package->title }}</strong>
                                        </td>
                                        <td>{{ $package->duration_days }} Hari</td>
                                        <td>
                                            @for ($i = 0; $i < $package->hotel_stars; $i++)
                                                ⭐
                                            @endfor
                                        </td>
                                        <td>Rp {{ number_format($package->price_quad, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge text-bg-info">Total: {{ $package->total_seats }}</span><br>
                                            @if ($package->available_seats > 0)
                                                <span class="badge text-bg-success">Tersisa:
                                                    {{ $package->available_seats }}</span>
                                            @else
                                                <span class="badge text-bg-danger">Penuh</span>
                                            @endif
                                        </td>
                                        <td>{{ $package->departure_location }}</td>
                                        <td>
                                            <strong>{{ $package->airline }}</strong><br>
                                            <small class="text-muted">{{ $package->flight_route }}</small>
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($package->departure_date)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('packages.edit', $package->id) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('packages.destroy', $package->id) }}"
                                                class="btn btn-sm btn-danger" title="Hapus"
                                                onclick="event.preventDefault();
        if(confirm('Apakah Anda yakin ingin menghapus paket ini?')) {
            document.getElementById('delete-form-{{ $package->id }}').submit();
        }">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $package->id }}"
                                                action="{{ route('packages.destroy', $package->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Belum ada data paket.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
