@extends('layouts.admin')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <h3 class="mb-3">Daftar Paket</h3>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Paket Haji & Umrah</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Nama Paket</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Kuota</th>
                                    <th>Kota Berangkat</th>
                                    <th>Tanggal</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $package->image }}" alt="{{ $package->name }}"
                                                class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <strong>{{ $package->name }}</strong><br>
                                            <small>{{ $package->hotel_madinah }} / {{ $package->hotel_makkah }}</small>
                                        </td>
                                        <td>{{ $package->duration }}</td>
                                        <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge text-bg-info">Total: {{ $package->total_quota }}</span><br>
                                            @if ($package->remaining_quota > 0)
                                                <span class="badge text-bg-success">Tersisa:
                                                    {{ $package->remaining_quota }}</span>
                                            @else
                                                <span class="badge text-bg-danger">Penuh</span>
                                            @endif
                                        </td>
                                        <td>{{ $package->departure_city }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($package->departure_date)->format('d M Y') }}
                                            <br>–<br>
                                            {{ \Carbon\Carbon::parse($package->return_date)->format('d M Y') }}
                                        </td>
                                        <td>{{ $package->guide_name }}</td>
                                        <td>
                                            @if ($package->is_popular)
                                                <span class="badge text-bg-warning">Populer</span>
                                            @else
                                                <span class="badge text-bg-secondary">Reguler</span>
                                            @endif
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
        }"><i
                                                    class="bi bi-trash"></i>
                                            </a>`
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
                                        <td colspan="11" class="text-center">Belum ada data paket.</td>
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
