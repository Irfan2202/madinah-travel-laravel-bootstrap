@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="fw-bold">{{ $package->title }}</h1>
        <p class="text-muted">{{ $package->description }}</p>

        <h3 class="mt-4 mb-3">Pilih Jadwal Keberangkatan</h3>
        <div class="row g-3">
            @foreach ($schedules as $schedule)
                @php
                    $isAlmostFull = $schedule->available_seats <= 5;
                    $isFull = $schedule->available_seats <= 0;
                @endphp

                <div class="col-md-4">
                    <label class="w-100">
                        <input type="radio" name="schedule_id" value="{{ $schedule->id }}" class="d-none schedule-radio">
                        <div class="card schedule-card h-100 p-3 border rounded cursor-pointer">
                            <h5 class="fw-bold mb-1">
                                {{ \Carbon\Carbon::parse($schedule->departure_date)->format('d F Y') }}
                            </h5>
                            <p class="mb-1">{{ $schedule->route }}</p>
                            <small class="text-muted">
                                Sisa {{ $schedule->available_seats }} dari {{ $schedule->total_seats }} seat
                            </small>
                            @if ($isFull)
                                <span class="badge bg-danger ms-2">Penuh</span>
                            @elseif($isAlmostFull)
                                <span class="badge bg-warning ms-2">Hampir Penuh</span>
                            @endif
                        </div>
                    </label>
                </div>
            @endforeach
        </div>

        <div id="booking-section" class="mt-4" style="display:none;">
            <a href="#" class="btn btn-primary">Booking Sekarang</a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.schedule-radio').forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('booking-section').style.display = 'block';
            });
        });
    </script>
@endsection
