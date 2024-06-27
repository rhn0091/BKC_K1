<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - BKC</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container-2">
        <div class="container-4">
            <img src="{{ asset('assets/images/wikrama.png') }}" alt="Logo" class="image">
            <span class="ruangbk">BKC</span>
        </div>
        <div class="container-6">
            <a href="/" class="beranda">Beranda</a>
            <a href="#" class="tentang-kami">Tentang Kami</a>
            <div class="button-1">
                <a href="{{ route('kontak') }}" class="kontak">Kontak</a>
            </div>
        </div>
    </div>
    <main class="main-content">
        <div class="contact-section">
            <h1>Kontak Pengembang</h1>
            <p>Jika Anda memiliki pertanyaan atau memerlukan bantuan, jangan ragu untuk menghubungi kami melalui informasi kontak di bawah ini:</p>
            <ul class="contact-info">
                <li>Email: <a href="mailto:dev@bkc.com">dev@bkc.com</a></li>
                <li>Telepon: <a href="tel:+621234567890">+62 123 4567 890</a></li>
                <li>Alamat: Jl. Pendidikan No. 45, Jakarta, Indonesia</li>
            </ul>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 BKC. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
