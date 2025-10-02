@extends('layouts.app')


@section('content')
    <div class="container mb-5 py-5">

        <h1 class="fw-bold">{{ $package->title }}</h1>

        <p class="text-muted">{{ $package->description }}</p>


        <h3 class="mt-4 mb-5">Pilih Jadwal Keberangkatan</h3>

        <div class="row g-3">

            @foreach ($schedules as $schedule)
                @php

                    $isAlmostFull = $schedule->available_seats <= 5;

                    $isFull = $schedule->available_seats <= 0;

                @endphp


                <div class="col-md-4">

                    <label class="w-100" for="schedule-{{ $schedule->id }}">

                        <input type="radio" name="schedule_id" value="{{ $schedule->id }}" class="d-none schedule-radio"
                            id="schedule-{{ $schedule->id }}" {{ $isFull ? 'disabled' : '' }}>


                        <div
                            class="card schedule-card h-100 p-3 rounded position-relative {{ $isFull ? 'bg-light text-muted' : '' }}">

                            <h5 class="fw-bold mb-1">

                                {{ \Carbon\Carbon::parse($schedule->departure_date)->format('d F Y') }}

                            </h5>

                            <p class="mb-1 text-truncate">{{ $schedule->route }}</p>


                            @if ($isFull)
                                <small class="text-danger fw-bold">Penuh</small>

                                <span class="badge bg-danger">Penuh</span>
                            @else
                                <small class="text-success">

                                    Sisa **{{ $schedule->available_seats }}** dari {{ $schedule->total_seats }} seat

                                </small>

                                @if ($isAlmostFull)
                                    <span class="badge bg-warning text-dark">Hampir Penuh</span>
                                @endif
                            @endif


                        </div>

                    </label>

                </div>
            @endforeach

        </div>

        <div id="booking-section" class="mt-5 text-center" style="display:none;">
            <a href="#" id="booking-link" class="btn btn-gold btn-lg shadow-lg">Booking Sekarang</a>
        </div>

        <script>
            document.querySelectorAll('.schedule-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Tampilkan tombol booking
                    document.getElementById('booking-section').style.display = 'block';

                    // Dapatkan ID jadwal yang dipilih
                    const selectedScheduleId = this.value;

                    // **Ubah URL pada tombol Booking Sekarang**
                    const packageId = {{ $package->id }}; // Pastikan variabel $package tersedia
                    const bookingLink = document.getElementById('booking-link');
                    // Mengarahkan ke route pemesanan dengan schedule_id dan package_id sebagai query parameter
                    bookingLink.href = `/orders/create?schedule=${selectedScheduleId}&package=${packageId}`;

                    // Opsional: Logika untuk mengatur kelas "checked" secara visual
                    // ... kode visual
                });
            });
        </script>
    @endsection
