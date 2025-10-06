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
                        <table class="table table-hover text-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Nama Paket</th>
                                    <th>Deskripsi</th>
                                    <th>Pemandu</th>
                                    <th>Hotel Makkah</th>
                                    <th>Hotel Madinah</th>
                                    <th>Durasi</th>
                                    <th>Rating Hotel</th>
                                    <th>Kuota</th>
                                    <th>Kota Berangkat</th>
                                    <th>Maskapai &amp; Rute</th>
                                    <th>Hari &amp; Tanggal Berangkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @if ($package->image)
                                                <img src="{{ asset('storage/' . $package->image) }}"
                                                    alt="{{ $package->title }}" width="80" class="rounded">
                                            @else
                                                <small class="text-muted">-</small>
                                            @endif
                                        </td>

                                        <td><strong>{{ $package->title }}</strong></td>

                                        <td>
                                            {{ $package->description ? \Illuminate\Support\Str::limit($package->description, 80) : '-' }}
                                        </td>

                                        <td>{{ $package->guide_name ?? '-' }}</td>
                                        <td>{{ $package->hotel_makkah ?? '-' }}</td>
                                        <td>{{ $package->hotel_madinah ?? '-' }}</td>

                                        <td>{{ $package->duration_days }} Hari</td>

                                        <td>
                                            @if ($package->hotel_stars && $package->hotel_stars > 0)
                                                @for ($i = 0; $i < $package->hotel_stars; $i++)
                                                    ⭐
                                                @endfor
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            <span class="badge text-bg-info">Total: {{ $package->total_pax }}</span><br>
                                            @if ($package->available_pax > 0)
                                                <span class="badge text-bg-success">Tersisa:
                                                    {{ $package->available_pax }}</span>
                                            @else
                                                <span class="badge text-bg-danger">Penuh</span>
                                            @endif
                                        </td>

                                        <td>{{ $package->departure_location ?? '-' }}</td>

                                        <td>
                                            <strong>{{ $package->airline ?? '-' }}</strong><br>
                                            <small class="text-muted">{{ $package->flight_route ?? '-' }}</small>
                                        </td>

                                        <td>
                                            {{ $package->departure_day ?? '-' }}<br>
                                            {{ \Carbon\Carbon::parse($package->departure_date)->format('d M Y') }}
                                        </td>

                                        <td>
                                            <a href="{{ route('packages.show', $package->id) }}"
                                                class="btn btn-sm btn-primary" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('packages.edit', $package->id) }}"
                                                class="btn btn-sm btn-success" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a href="#" class="btn btn-sm btn-danger" title="Hapus"
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
                                        <td colspan="14" class="text-center">Belum ada data paket.</td>
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
