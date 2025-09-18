<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Madinah Travel - Haji & Umroh Terpercaya</title>
    <meta name="description"
        content="Al-Madinah Travel melayani perjalanan haji dan umroh dengan fasilitas premium dan bimbingan spiritual terbaik. Hubungi kami untuk konsultasi gratis.">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-bs-theme="light">

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // WhatsApp and Phone Functions
        const PHONE_NUMBER = '62085721122232';
        const WHATSAPP_URL = `https://api.whatsapp.com/send?phone=${PHONE_NUMBER}&text=`;

        function contactWhatsApp() {
            const message = encodeURIComponent(
                'Assalamualaikum, saya tertarik dengan paket umroh dan haji Al-Madinah Travel. Mohon informasi lebih lanjut.'
            );
            window.open(WHATSAPP_URL + message, '_blank');
        }

        function callPhone() {
            window.open(`tel:+${PHONE_NUMBER}`, '_self');
        }

        function sendEmail() {
            window.open('mailto:info@almadinahtravel.com', '_self');
        }

        function bookPackage(packageName, duration, price) {
            const message = encodeURIComponent(
                `Assalamualaikum, saya tertarik dengan paket ${packageName} - ${duration} dengan harga ${price}. Mohon informasi lebih lanjut mengenai:\n\n1. Jadwal keberangkatan terdekat\n2. Syarat dan ketentuan\n3. Cara pembayaran\n4. Detail itinerary\n\nTerima kasih.`
            );
            window.open(WHATSAPP_URL + message, '_blank');
        }

        function customConsultation() {
            const message = encodeURIComponent(
                'Assalamualaikum, saya ingin konsultasi mengenai paket kustomisasi haji/umroh. Mohon informasi lebih lanjut.'
            );
            window.open(WHATSAPP_URL + message, '_blank');
        }

        // Contact Form Handler
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            const whatsappMessage = encodeURIComponent(
                `Assalamualaikum, saya ${name} (${email}). ${message}`
            );

            window.open(WHATSAPP_URL + whatsappMessage, '_blank');

            // Reset form
            this.reset();
            alert('Terima kasih! Anda akan diarahkan ke WhatsApp untuk melanjutkan percakapan.');
        });

        // Dark Mode Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        themeToggle.addEventListener('click', function() {
            const currentTheme = html.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            html.setAttribute('data-bs-theme', newTheme);

            if (newTheme === 'dark') {
                themeIcon.className = 'bi bi-sun-fill';
            } else {
                themeIcon.className = 'bi bi-moon-fill';
            }

            localStorage.setItem('theme', newTheme);
        });

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-bs-theme', savedTheme);
        if (savedTheme === 'dark') {
            themeIcon.className = 'bi bi-sun-fill';
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-sm');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white', 'shadow-sm');
                navbar.classList.add('bg-transparent');
            }
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>

</html>
