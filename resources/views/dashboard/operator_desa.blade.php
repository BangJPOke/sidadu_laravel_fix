
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Operator Desa | SIDADU AGAMA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f7f4;
            color: #263b2e;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(135deg, #075c3b, #08784d);
            color: white;
            padding: 20px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            background: #ffffff;
            color: #08784d;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .brand h2 {
            font-size: 21px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 11px;
            color: #d9f4e5;
            margin-top: 3px;
        }

        .role-label {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 13px;
        }

        .main {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
            flex: 1;
        }

        .welcome {
            background: linear-gradient(120deg, #08784d, #0b9660);
            color: white;
            padding: 35px;
            border-radius: 18px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 22px rgba(8,120,77,0.15);
        }

        .welcome::after {
            content: "✦";
            position: absolute;
            right: 45px;
            top: -35px;
            font-size: 170px;
            color: rgba(255,255,255,0.08);
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .welcome p {
            font-size: 15px;
            line-height: 1.7;
            color: #e4fff0;
            max-width: 650px;
            position: relative;
            z-index: 1;
        }

        .gold-line {
            width: 65px;
            height: 4px;
            background: #e9c46a;
            border-radius: 5px;
            margin-top: 20px;
        }

        .section-title {
            margin: 35px 0 18px;
        }

        .section-title h2 {
            color: #075c3b;
            font-size: 21px;
            margin-bottom: 6px;
        }

        .section-title p {
            color: #718078;
            font-size: 13px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-decoration: none;
            color: inherit;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            display: flex;
            align-items: flex-start;
            gap: 18px;
            transition: 0.25s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            border-color: #b7d9c3;
            box-shadow: 0 9px 22px rgba(8,120,77,0.11);
        }

        .menu-icon {
            width: 55px;
            height: 55px;
            flex-shrink: 0;
            background: #e8f5ec;
            color: #08784d;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .menu-info h3 {
            color: #075c3b;
            font-size: 16px;
            margin: 3px 0 8px;
        }

        .menu-info p {
            color: #758279;
            font-size: 13px;
            line-height: 1.6;
        }

        .menu-arrow {
            margin-left: auto;
            color: #c49a37;
            font-size: 22px;
            align-self: center;
        }

        .info-box {
            margin-top: 30px;
            padding: 20px 23px;
            background: #fffaf0;
            border: 1px solid #f0dfb2;
            border-left: 5px solid #d6a83e;
            border-radius: 10px;
            color: #6d592c;
            font-size: 13px;
            line-height: 1.8;
        }

        .logout-area {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .logout {
            display: inline-block;
            padding: 11px 22px;
            background: #fff;
            border: 1px solid #f0c8c4;
            border-radius: 9px;
            color: #bd3c32;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .logout:hover {
            background: #fff0ee;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 17px 5%;
            }

            .brand h2 {
                font-size: 17px;
            }

            .main {
                width: 92%;
                margin: 22px auto;
            }

            .welcome {
                padding: 26px 22px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .menu-card {
                padding: 20px;
            }

            .role-label {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="brand">
            <div class="brand-icon">🕌</div>
            <div>
                <h2>SIDADU AGAMA</h2>
                <p>Sistem Informasi Pendataan Terpadu Keagamaan</p>
            </div>
        </div>

        <div class="role-label">
            OPERATOR DESA
        </div>
    </header>

    <main class="main">

        <section class="welcome">
            <h1>Dashboard Operator Desa</h1>
            <p>
                Selamat datang di halaman Operator Desa.
                Kelola data masjid dan pengurus masjid di desa Anda
                melalui sistem SIDADU AGAMA.
            </p>
            <div class="gold-line"></div>
        </section>

        <section>
            <div class="section-title">
                <h2>Pengelolaan Data Masjid</h2>
                <p>Kelola informasi dan data masjid di wilayah desa Anda.</p>
            </div>

            <div class="menu-grid">

                <a class="menu-card" href="{{ url('/operator-desa/masjid') }}">
                    <div class="menu-icon">🕌</div>
                    <div class="menu-info">
                        <h3>Data Masjid</h3>
                        <p>Lihat dan kelola daftar data masjid yang telah terdaftar.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

                <a class="menu-card" href="{{ url('/operator-desa/masjid/tambah') }}">
                    <div class="menu-icon">➕</div>
                    <div class="menu-info">
                        <h3>Tambah Masjid</h3>
                        <p>Tambahkan data masjid baru ke dalam sistem.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

            </div>
        </section>

        <section>
            <div class="section-title">
                <h2>Pengelolaan Pengurus Masjid</h2>
                <p>Kelola pengajuan dan riwayat data pengurus masjid.</p>
            </div>

            <div class="menu-grid">

                <a class="menu-card" href="{{ url('/operator-desa/pengurus/tambah') }}">
                    <div class="menu-icon">👥</div>
                    <div class="menu-info">
                        <h3>Tambah Pengurus Masjid</h3>
                        <p>Masukkan data pengurus masjid untuk diajukan proses verifikasi.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

                <a class="menu-card" href="{{ url('/operator-desa/riwayat-pengurus') }}">
                    <div class="menu-icon">📋</div>
                    <div class="menu-info">
                        <h3>Riwayat Pengajuan Pengurus</h3>
                        <p>Pantau status pengajuan pengurus masjid yang telah dikirim.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

            </div>
        </section>

        <div class="info-box">
            <strong>Informasi:</strong><br>
            Silakan gunakan menu di atas untuk mengelola data masjid
            dan pengurus masjid di desa Anda. Pastikan data yang dimasukkan
            sudah benar sebelum diajukan untuk proses verifikasi.
        </div>

        <div class="logout-area">
    <form action="{{ url('/logout') }}" method="POST"
          onsubmit="return confirm('Apakah Anda yakin ingin keluar dari aplikasi?')">
        @csrf

        <button type="submit" class="logout">
            ↪ Keluar dari Sistem
        </button>
    </form>
</div>

    </main>

    @include('layouts.footer')

</body>
</html>
