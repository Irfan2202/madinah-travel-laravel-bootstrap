<div class="col-lg-4">
    <div class="card package-card h-100">
        <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1572358899655-f63ece97bfa5?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDk1ODB8MHwxfHNlYXJjaHwxfHxNYWRpbmFoJTIwbW9zcXVlfGVufDB8fHx8MTc1ODA5MjMyOXww&ixlib=rb-4.1.0&q=85"
                class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $package->title }}">
            <div class="position-absolute top-0 start-0 m-3">
                <small class="badge bg-primary">
                    <i class="bi bi-calendar-event me-1"></i>
                    {{ $package->duration_days }} Hari
                </small>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title fw-bold">{{ $package->title }}</h5>
            <p class="card-text text-muted">
                Paket {{ $package->title }} dengan fasilitas yang nyaman
            </p>
            <ul class="list-unstyled mb-4">
                <li class="mb-1">
                    <i class="bi bi-check text-gold me-2"></i>
                    Hotel bintang {{ $package->hotel_stars }} di Makkah & Madinah
                </li>
                <li class="mb-1">
                    <i class="bi bi-check text-gold me-2"></i>
                    Berangkat dari: **{{ $package->departure_location }}**
                </li>
                <li class="mb-1">
                    <i class="bi bi-check text-gold me-2"></i>
                    Maskapai: **{{ $package->airline ?? 'Tidak disebutkan' }}**
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <small class="text-muted">Mulai dari (Quad)</small>
                    <div class="h4 fw-bold text-dark">
                        Rp {{ number_format($package->price_quad, 0, ',', '.') }}
                    </div>
                    <small class="text-muted">per jamaah</small>
                </div>
                <div class="text-end">
                    <small class="text-gold">
                        <i class="bi bi-people me-1"></i>
                        Tersisa: **{{ $package->available_seats }}**
                    </small>
                    <br>
                    <small class="text-muted">
                        Berangkat: **{{ \Carbon\Carbon::parse($package->departure_date)->format('d M Y') }}**
                    </small>
                </div>
            </div>

            <button class="btn btn-outline-dark w-100"
                onclick="bookPackage('{{ $package->title }}', '{{ $package->duration_days }} Hari', 'Rp {{ number_format($package->price_quad, 0, ',', '.') }}')">
                Pesan Sekarang via WhatsApp
            </button>
        </div>
    </div>
</div>
