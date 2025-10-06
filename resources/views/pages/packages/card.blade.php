<div class="col-md-4 mb-4">
    <div class="card shadow-sm border-0 h-100">
        @if ($package->image)
            <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top" alt="{{ $package->title }}">
        @endif

        <div class="card-body">
            <h5 class="card-title text-primary fw-bold">
                {{ strtoupper($package->title) }} <br>
                <small class="text-muted">({{ \Carbon\Carbon::parse($package->departure_date)->format('d F') }})</small>
            </h5>

            <ul class="list-unstyled small mb-3 mt-3">
                <li class="mb-1">
                    <i class="bi bi-calendar-week me-2 text-secondary"></i>
                    <strong>Jadwal Berangkat:</strong> {{ $package->departure_day ?? '-' }}
                </li>
                <li class="mb-1">
                    <i class="bi bi-clock me-2 text-secondary"></i>
                    <strong>Durasi:</strong> {{ $package->duration_days }} Hari
                </li>
                <li class="mb-1">
                    <i class="bi bi-building me-2 text-secondary"></i>
                    <strong>Kelas Hotel:</strong>
                    @for ($i = 0; $i < $package->hotel_stars; $i++)
                        ⭐
                    @endfor
                </li>
                <li class="mb-1">
                    <i class="bi bi-people me-2 text-secondary"></i>
                    <strong>Total Seat:</strong> {{ $package->total_pax }} pax
                </li>
                <li class="mb-1">
                    <i class="bi bi-person-check me-2 text-secondary"></i>
                    <strong>Available Seat:</strong>
                    <span class="fw-bold">{{ $package->available_pax }} pax</span>
                </li>
                <li class="mb-1">
                    <i class="bi bi-geo-alt me-2 text-secondary"></i>
                    <strong>Berangkat dari:</strong> {{ strtoupper($package->departure_location) }}
                </li>
                <li class="mb-1">
                    <i class="bi bi-airplane me-2 text-secondary"></i>
                    <strong>Maskapai:</strong> {{ $package->airline ?? '-' }}
                </li>
            </ul>

            <a href="{{ route('packages.detail', $package->id) }}" class="btn btn-warning w-100 fw-semibold">
                Lihat Detail
            </a>
        </div>
    </div>
</div>
