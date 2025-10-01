<section id="packages" class="section-packages " id="packages">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-4 fw-bold mb-4">
                    Pilihan Paket <span class="text-gold">Haji & Umroh</span>
                </h2>
                <p class="lead text">
                    Tersedia berbagai pilihan paket yang disesuaikan dengan kebutuhan dan budget Anda.
                    Semua paket sudah termasuk visa, tiket, hotel, dan bimbingan spiritual.
                </p>
            </div>
        </div>
        <div class="row g-4 mb-5">
            @forelse ($packages as $package)
                @include('pages.packages.card', ['package' => $package])
            @empty
                <div class="col-12 text-center">
                    <p class="lead">Maaf, belum ada paket yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-light border-0 p-4 text-center">
                    <h4 class="fw-bold mb-3">Butuh Paket Kustomisasi?</h4>
                    <p class="text-muted mb-4">
                        Kami juga melayani paket khusus sesuai permintaan Anda. Hubungi tim kami untuk
                        konsultasi dan penawaran terbaik.
                    </p>
                    <button class="btn btn-outline-gold">
                        Konsultasi Gratis
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
