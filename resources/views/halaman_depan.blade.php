<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIDADU AGAMA | Sistem Informasi Pendataan Terpadu Keagamaan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --hijau: #075e43;
            --hijau-tua: #064632;
            --hijau-muda: #0b8b61;
            --emas: #d4af37;
            --putih: #ffffff;
            --teks: #1158cb;
            --abu: #64748b;
            --latar: #f1f8f5;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--teks);
            background: var(--latar);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* HEADER */

        .header {
            background: var(--hijau);
            color: white;
            position: relative;
            z-index: 10;
        }

        .navbar {
            max-width: 1200px;
            margin: auto;
            padding: 18px 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .logo-masjid {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
        }

        .logo-masjid svg {
            width: 100%;
            height: 100%;
        }

        .brand h1 {
            font-size: 23px;
            line-height: 1.3;
            letter-spacing: 1px;
            color: var(--emas);
        }

        .brand p {
            font-size: 12px;
            color: #d1fae5;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
            color: white;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-menu a:hover {
            color: var(--emas);
        }

        .nav-login {
            background: var(--emas);
            color: var(--hijau-tua) !important;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .nav-login:hover {
            background: #f0d46a;
        }

        /* HERO */

        .hero {
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(212, 175, 55, .15),
                    transparent 35%
                ),
                linear-gradient(135deg, #075e43, #08764f);

            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 50%;
            right: -150px;
            top: -180px;
        }

        .hero-inner {
            max-width: 1200px;
            margin: auto;
            padding: 85px 25px 100px;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            align-items: center;
            gap: 50px;
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-block;
            color: #f5d76e;
            border: 1px solid rgba(245,215,110,.5);
            padding: 7px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 22px;
        }

        .hero h2 {
            font-size: clamp(32px, 4vw, 50px);
            line-height: 1.2;
            margin-bottom: 20px;
            max-width: 650px;
        }

        .hero h2 span {
            color: #f5d76e;
        }

        .hero-description {
            max-width: 580px;
            color: #d9f3e7;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 23px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-emas {
            background: var(--emas);
            color: var(--hijau-tua);
        }

        .btn-emas:hover {
            background: #f0d46a;
            transform: translateY(-2px);
        }

        .btn-outline {
            color: white;
            border: 1px solid rgba(255,255,255,.5);
        }

        .btn-outline:hover {
            background: rgba(255,255,255,.1);
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .masjid-illustration {
            width: 100%;
            max-width: 390px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .masjid-illustration svg {
            width: 100%;
            max-height: 300px;
            filter: drop-shadow(0 15px 25px rgba(0,0,0,.15));
        }

        /* SECTION */

        .section {
            max-width: 1200px;
            margin: auto;
            padding: 75px 25px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading .eyebrow {
            color: var(--hijau-muda);
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-size: 30px;
            color: var(--hijau-tua);
            margin-bottom: 12px;
        }

        .section-heading p {
            max-width: 650px;
            margin: auto;
            color: var(--abu);
            font-size: 14px;
        }

        /* CEK NIK */

        .cek-section {
            margin-top: -45px;
            position: relative;
            z-index: 2;
        }

        .cek-card {
            max-width: 850px;
            margin: auto;
            background: white;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 15px 45px rgba(15, 70, 50, .12);
            border: 1px solid #e2eee8;
        }

        .cek-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .cek-icon {
            width: 52px;
            height: 52px;
            background: #e5f5ec;
            color: var(--hijau);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 25px;
        }

        .cek-heading h2 {
            font-size: 22px;
            color: var(--hijau-tua);
        }

        .cek-heading p {
            font-size: 13px;
            color: var(--abu);
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .info {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fde68a;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 9px;
            color: #334155;
        }

        .nik-input {
            width: 100%;
            padding: 15px 17px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 16px;
            outline: none;
            transition: .2s;
            background: #fff;
        }

        .nik-input:focus {
            border-color: var(--hijau-muda);
            box-shadow: 0 0 0 4px rgba(11,139,97,.1);
        }

        .input-help {
            font-size: 12px;
            color: var(--abu);
            margin-top: 8px;
        }

        .btn-cek {
            width: 100%;
            margin-top: 20px;
            padding: 15px;
            border: none;
            border-radius: 9px;
            background: var(--hijau);
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn-cek:hover {
            background: var(--hijau-tua);
            transform: translateY(-1px);
        }

        /* HASIL PENGECEKAN */

        .hasil {
            margin-top: 25px;
            padding: 22px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            border-radius: 12px;
        }

        .hasil h3 {
            color: #065f46;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .baris {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 11px 0;
            border-bottom: 1px solid #d1fae5;
            font-size: 14px;
        }

        .baris strong {
            min-width: 100px;
            color: #065f46;
        }

        .baris:last-child {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            background: #d1fae5;
            color: #065f46;
            font-size: 12px;
            font-weight: 700;
        }

        /* LAYANAN */

        .layanan-section {
            background: white;
        }

        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .layanan-card {
            background: #f8fcf9;
            border: 1px solid #e2eee8;
            border-radius: 14px;
            padding: 28px;
            transition: .25s;
        }

        .layanan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15,70,50,.08);
            border-color: #b6dfc9;
        }

        .layanan-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5f5ec;
            border-radius: 12px;
            font-size: 25px;
            margin-bottom: 18px;
        }

        .layanan-card h3 {
            color: var(--hijau-tua);
            font-size: 17px;
            margin-bottom: 10px;
        }

        .layanan-card p {
            color: var(--abu);
            font-size: 13px;
            line-height: 1.8;
        }

        /* ALUR */

        .alur-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            position: relative;
        }

        .alur-card {
            text-align: center;
            padding: 25px 15px;
            background: white;
            border: 1px solid #e2eee8;
            border-radius: 12px;
        }

        .alur-number {
            width: 45px;
            height: 45px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--hijau);
            color: white;
            font-size: 18px;
            font-weight: 800;
        }

        .alur-card h3 {
            color: var(--hijau-tua);
            font-size: 15px;
            margin-bottom: 8px;
        }

        .alur-card p {
            color: var(--abu);
            font-size: 12px;
        }

        /* FOOTER */

        .footer {
            background: var(--hijau-tua);
            color: #d1fae5;
            padding: 30px 20px;
            text-align: center;
        }

        .footer strong {
            color: white;
        }

        .footer p {
            font-size: 13px;
        }

        .footer-line {
            width: 60px;
            height: 3px;
            background: var(--emas);
            border-radius: 10px;
            margin: 0 auto 15px;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {
            .navbar {
                flex-wrap: wrap;
            }

            .nav-menu {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 18px;
            }

            .hero-inner {
                grid-template-columns: 1fr;
                padding-top: 60px;
                text-align: center;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-visual {
                display: none;
            }

            .layanan-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .alur-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 550px) {
            .navbar {
                padding: 15px;
            }

            .brand h1 {
                font-size: 18px;
            }

            .brand p {
                font-size: 10px;
            }

            .logo-masjid {
                width: 45px;
                height: 45px;
            }

            .nav-menu {
                gap: 13px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .nav-login {
                padding: 7px 13px;
            }

            .hero-inner {
                padding: 55px 20px 75px;
            }

            .hero h2 {
                font-size: 32px;
            }

            .hero-description {
                font-size: 14px;
            }

            .section {
                padding: 55px 18px;
            }

            .cek-card {
                padding: 22px 18px;
            }

            .cek-heading h2 {
                font-size: 18px;
            }

            .section-heading h2 {
                font-size: 24px;
            }

            .layanan-grid,
            .alur-grid {
                grid-template-columns: 1fr;
            }

            .baris {
                flex-direction: column;
                gap: 3px;
            }
        }
    </style>
</head>

<body>

{{-- HEADER --}}
<header class="header">
    <nav class="navbar">

        <a href="/" class="brand">
            <div class="logo-masjid">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 100 100"
                     fill="none">

                    <path d="M20 48 C20 28 35 15 50 15 C65 15 80 28 80 48"
                          fill="#ffffff"/>

                    <path d="M50 5 C44 10 44 17 50 22 C42 21 38 15 40 9 C42 5 46 3 50 5Z"
                          fill="#d4af37"/>

                    <path d="M10 38 H25 V80 H10 Z"
                          fill="#ffffff"/>

                    <path d="M7 38 L17.5 25 L28 38 Z"
                          fill="#d4af37"/>

                    <path d="M75 38 H90 V80 H75 Z"
                          fill="#ffffff"/>

                    <path d="M72 38 L82.5 25 L93 38 Z"
                          fill="#d4af37"/>

                    <path d="M20 48 H80 V80 H20 Z"
                          fill="#ffffff"/>

                    <path d="M40 80 V65 C40 58 45 55 50 55 C55 55 60 58 60 65 V80 Z"
                          fill="#075e43"/>

                    <path d="M5 82 H95"
                          stroke="#d4af37"
                          stroke-width="4"
                          stroke-linecap="round"/>
                </svg>
            </div>

            <div>
                <h1>SIDADU AGAMA</h1>
                <p>Sistem Informasi Pendataan Terpadu Keagamaan</p>
            </div>
        </a>

        <div class="nav-menu">
            <a href="#beranda">Beranda</a>
            <a href="#tentang">Tentang</a>
            <a href="#layanan">Layanan</a>
            <a href="/login" class="nav-login">Login</a>
        </div>

    </nav>
</header>


{{-- HERO --}}
<section class="hero" id="beranda">
    <div class="hero-inner">

        <div>
            <span class="hero-label">
                LAYANAN INFORMASI KEAGAMAAN
            </span>

            <h2>
                Pendataan Terpadu
                <span>Pengurus Masjid</span>
            </h2>

            <p class="hero-description">
                Sistem informasi untuk mendukung pendataan,
                verifikasi, dan pengelolaan insentif pengurus
                masjid secara terpadu, transparan, dan akuntabel.
            </p>

            <div class="hero-actions">
                <a href="#cek-data" class="btn btn-emas">
                    Cek Status Pengurus
                </a>

                <a href="#tentang" class="btn btn-outline">
                    Pelajari Layanan
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="masjid-illustration">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 400 300"
                     fill="none">

                    <circle cx="200" cy="150" r="130"
                            fill="#ffffff" opacity=".07"/>

                    <path d="M55 260 H345"
                          stroke="#d4af37"
                          stroke-width="5"
                          stroke-linecap="round"/>

                    {{-- Menara kiri --}}
                    <rect x="75" y="105" width="45" height="155"
                          rx="5" fill="#ffffff"/>

                    <path d="M65 105 L97 55 L130 105 Z"
                          fill="#d4af37"/>

                    <rect x="88" y="130" width="18" height="50"
                          rx="9" fill="#075e43"/>

                    {{-- Menara kanan --}}
                    <rect x="280" y="105" width="45" height="155"
                          rx="5" fill="#ffffff"/>

                    <path d="M270 105 L302 55 L335 105 Z"
                          fill="#d4af37"/>

                    <rect x="293" y="130" width="18" height="50"
                          rx="9" fill="#075e43"/>

                    {{-- Bangunan --}}
                    <rect x="110" y="165" width="180" height="95"
                          fill="#ffffff"/>

                    {{-- Kubah --}}
                    <path d="M115 165 C115 80 285 80 285 165 Z"
                          fill="#0b8b61"/>

                    <path d="M115 165 C115 80 285 80 285 165"
                          stroke="#d4af37"
                          stroke-width="4"/>

                    {{-- Bulan sabit di puncak kubah --}}
<path d="M200 22
         A16 16 0 1 0 200 54
         A12 12 0 0 1 200 22 Z"
      fill="#d4af37"/>

                    {{-- Pintu --}}
                    <path d="M170 260 V210 C170 185 230 185 230 210 V260 Z"
                          fill="#075e43"/>

                    {{-- Jendela --}}
                    <rect x="125" y="195" width="25" height="35"
                          rx="12" fill="#d4af37"/>

                    <rect x="250" y="195" width="25" height="35"
                          rx="12" fill="#d4af37"/>

                </svg>
            </div>
        </div>

    </div>
</section>


{{-- CEK DATA --}}
<section class="section cek-section" id="cek-data">

    <div class="cek-card">

        <div class="cek-heading">
            <div class="cek-icon">⌕</div>

            <div>
                <h2>Pengecekan Data Pengurus</h2>
                <p>Periksa status pendaftaran data pengurus masjid.</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert error">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('info'))
            <div class="alert info">
                {{ session('info') }}
            </div>
        @endif

        <form action="{{ route('cek.pengurus') }}" method="POST">
            @csrf

            <label for="nik" class="form-label">
                Nomor Induk Kependudukan (NIK)
            </label>

            <input
    type="text"
    id="nik"
    name="nik"
    class="nik-input"
    maxlength="16"
    minlength="16"
    pattern="[0-9]{16}"
    inputmode="numeric"
    autocomplete="off"
    placeholder="Masukkan 16 digit NIK"
    value="{{ old('nik') }}"
    title="NIK harus terdiri dari tepat 16 digit angka"
    oninvalid="this.setCustomValidity('NIK harus terdiri dari tepat 16 digit angka.')"
    oninput="this.setCustomValidity(''); this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
    required
>

            <p class="input-help">
                Masukkan NIK sesuai KTP. NIK terdiri dari 16 digit angka.
            </p>

            <button type="submit" class="btn-cek">
                CEK DATA PENGURUS
            </button>
        </form>

        {{-- HASIL PENGECEKAN --}}
        @isset($pengurus)

            <div class="hasil">

                <h3>✓ Data Pengurus Ditemukan</h3>

                <div class="baris">
                    <strong>Nama</strong>
                    <span>{{ $pengurus->nama_lengkap }}</span>
                </div>

                <div class="baris">
                    <strong>Masjid</strong>
                    <span>
                        {{ $pengurus->masjid->nama_masjid ?? '-' }}
                    </span>
                </div>

                <div class="baris">
                    <strong>Desa</strong>
                    <span>
                        {{ $pengurus->masjid->desa->nama_desa ?? '-' }}
                    </span>
                </div>

                <div class="baris">
                    <strong>Jabatan</strong>
                    <span>{{ $pengurus->peran }}</span>
                </div>

                <div class="baris">
                    <strong>Status</strong>
                    <span class="status">
                        {{ $pengurus->status }}
                    </span>
                </div>

            </div>

        @endisset

    </div>

</section>


{{-- TENTANG --}}
<section class="section" id="tentang">

    <div class="section-heading">
        <p class="eyebrow">Tentang SIDADU AGAMA</p>

        <h2>Pengelolaan Data yang Terpadu</h2>

        <p>
            SIDADU AGAMA mendukung pengelolaan data pengurus masjid
            melalui proses pendataan dan verifikasi yang terstruktur.
        </p>
    </div>

    <div class="layanan-grid">

        <div class="layanan-card">
            <div class="layanan-icon">▤</div>

            <h3>Pendataan Terpadu</h3>

            <p>
                Pengumpulan data pengurus masjid dalam satu sistem
                informasi yang terintegrasi.
            </p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon">✓</div>

            <h3>Verifikasi Berjenjang</h3>

            <p>
                Data pengurus diperiksa melalui proses verifikasi
                oleh Admin Kecamatan.
            </p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon">◎</div>

            <h3>Informasi Status</h3>

            <p>
                Pengurus dapat mengecek status data yang telah
                dimasukkan ke dalam sistem.
            </p>
        </div>

    </div>

</section>


{{-- ALUR LAYANAN --}}
<section class="layanan-section" id="layanan">

    <div class="section">

        <div class="section-heading">
            <p class="eyebrow">Proses Layanan</p>

            <h2>Alur Pendataan dan Insentif</h2>

            <p>
                Berikut tahapan umum pengelolaan data pengurus
                dalam sistem SIDADU AGAMA.
            </p>
        </div>

        <div class="alur-grid">

            <div class="alur-card">
                <div class="alur-number">1</div>

                <h3>Pendataan</h3>

                <p>
                    Operator Desa memasukkan data pengurus masjid.
                </p>
            </div>

            <div class="alur-card">
                <div class="alur-number">2</div>

                <h3>Verifikasi</h3>

                <p>
                    Admin Kecamatan memeriksa data yang diajukan.
                </p>
            </div>

            <div class="alur-card">
                <div class="alur-number">3</div>

                <h3>Persetujuan</h3>

                <p>
                    Data yang disetujui diteruskan ke Bagian Kesra.
                </p>
            </div>

            <div class="alur-card">
                <div class="alur-number">4</div>

                <h3>Pencairan</h3>

                <p>
                    Bagian Kesra memproses pencairan insentif.
                </p>
            </div>

        </div>

    </div>

</section>


{{-- FOOTER --}}
<footer class="footer">

    <div class="footer-line"></div>

    <p>
        © {{ date('Y') }}
        <strong>SIDADU AGAMA | BangJP</strong>
    </p>

    <p>
        Sistem Informasi Pendataan Terpadu Keagamaan
    </p>

</footer>


</body>
</html>