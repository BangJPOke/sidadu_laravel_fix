
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kecamatan | SIDADU AGAMA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f7f5;
            color: #263b32;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(120deg, #075b43, #087653);
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.10);
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand span {
            display: block;
            color: #e7c66b;
            font-size: 11px;
            letter-spacing: 2px;
            margin-top: 5px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .role-label {
            font-size: 12px;
            font-weight: bold;
            color: #f4df9c;
        }

        .nav-menu form {
            margin: 0;
        }

        .btn-logout {
            background: white;
            color: #bd3c32;
            border: 1px solid #f0c8c4;
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .welcome {
            background: linear-gradient(120deg, #087653, #075b43);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(7,91,67,0.13);
        }

        .welcome h2 {
            font-size: 25px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #d9eee3;
            font-size: 14px;
            line-height: 1.6;
        }

        .welcome .gold-line {
            width: 65px;
            height: 4px;
            background: #e7c66b;
            border-radius: 5px;
            margin-bottom: 17px;
        }

        .section-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 5px 22px rgba(0,0,0,0.045);
            border-top: 4px solid #d5ad48;
        }

        .section-title {
            color: #075b43;
            font-size: 18px;
            margin-bottom: 9px;
        }

        .section-description {
            color: #849188;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .notification-alert {
            background: #fff5df;
            border: 1px solid #f1d99d;
            border-radius: 10px;
            padding: 17px;
            margin-bottom: 20px;
        }

        .notification-alert strong {
            color: #95630b;
            font-size: 14px;
        }

        .notification-alert p {
            color: #856404;
            font-size: 13px;
            margin-top: 6px;
        }

        .notification-empty {
            background: #e8f5ed;
            border: 1px solid #cce7d5;
            color: #17683a;
            border-radius: 10px;
            padding: 17px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            background: #075b43;
            color: white;
            padding: 14px;
            text-align: left;
            font-size: 12px;
            white-space: nowrap;
        }

        td {
            padding: 13px 14px;
            border-bottom: 1px solid #edf1ee;
            font-size: 13px;
            color: #52645a;
        }

        tbody tr:hover {
            background: #f7fbf8;
        }

        .number {
            text-align: center;
            width: 55px;
        }

        .status {
            display: inline-block;
            background: #fff2cc;
            color: #856404;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .menu-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 22px;
            background: #f8fbf9;
            border: 1px solid #e4eee7;
            border-radius: 12px;
            text-decoration: none;
            transition: 0.2s;
        }

        .menu-card:hover {
            background: #edf6f0;
            border-color: #9bc9aa;
            transform: translateY(-3px);
        }

        .menu-icon {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            background: #e2f1e7;
            color: #087653;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .menu-text h3 {
            color: #075b43;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .menu-text p {
            color: #849188;
            font-size: 12px;
            line-height: 1.5;
        }

        .menu-arrow {
            margin-left: auto;
            color: #087653;
            font-size: 20px;
        }

        .empty-state {
            text-align: center;
            padding: 25px;
            color: #849188;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #89958e;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 17px 5%;
            }

            .container {
                margin-top: 25px;
            }

            .welcome {
                padding: 24px 20px;
            }

            .welcome h2 {
                font-size: 21px;
            }

            .section-card {
                padding: 19px 15px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .menu-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="brand">
            SIDADU AGAMA
            <span>SISTEM INFORMASI PENDATAAN TERPADU KEAGAMAAN</span>
        </div>

        <div class="nav-menu">
            <div class="role-label">ADMIN KECAMATAN</div>

            <form action="{{ url('/logout') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                @csrf
                <button type="submit" class="btn-logout">↪ Logout</button>
            </form>
        </div>
    </header>

    <main class="container">

        <section class="welcome">
            <div class="gold-line"></div>
            <h2>Dashboard Admin Kecamatan</h2>
            <p>
                Selamat datang, {{ $user->nama_lengkap }}.
                Kelola verifikasi pengurus masjid dan data Operator Desa
                di wilayah kecamatan Anda.
            </p>
        </section>

        <!-- NOTIFIKASI PENGURUS BARU -->
        <section class="section-card">

            <h3 class="section-title">🔔 Notifikasi Pengurus Baru</h3>
            <p class="section-description">
                Informasi pengajuan pengurus masjid yang menunggu verifikasi.
            </p>

            @if ($jumlahNotifikasi > 0)

                <div class="notification-alert">
                    <strong>⚠ Ada {{ $jumlahNotifikasi }} pengajuan menunggu verifikasi.</strong>
                    <p>Silakan periksa data pengurus berikut dan lakukan verifikasi.</p>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th class="number">No.</th>
                                <th>Nama Pengurus</th>
                                <th>Masjid</th>
                                <th>Desa</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notifikasiPengurus as $pengurus)
                                <tr>
                                    <td class="number">{{ $loop->iteration }}</td>
                                    <td><strong>{{ $pengurus->nama_lengkap }}</strong></td>
                                    <td>{{ $pengurus->masjid->nama_masjid ?? '-' }}</td>
                                    <td>{{ $pengurus->masjid->desa->nama_desa ?? '-' }}</td>
                                    <td>
                                        <span class="status">Menunggu Verifikasi</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="notification-empty">
                    ✓ Tidak ada pengajuan pengurus baru yang menunggu verifikasi.
                </div>

            @endif

        </section>

        <!-- MENU PENGELOLAAN -->
        <section class="section-card">

            <h3 class="section-title">Menu Pengelolaan</h3>
            <p class="section-description">
                Pilih menu berikut untuk mengelola data di wilayah kecamatan Anda.
            </p>

            <div class="menu-grid">

                <a href="{{ url('/admin-kecamatan/pengurus') }}" class="menu-card">
                    <div class="menu-icon">✓</div>
                    <div class="menu-text">
                        <h3>Verifikasi Pengurus Masjid</h3>
                        <p>Lihat, periksa, dan verifikasi data pengurus masjid.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

                <a href="{{ url('/admin-kecamatan/operator-desa') }}" class="menu-card">
                    <div class="menu-icon">👥</div>
                    <div class="menu-text">
                        <h3>Pengelolaan Operator Desa</h3>
                        <p>Tambah, lihat, edit, dan hapus akun Operator Desa.</p>
                    </div>
                    <div class="menu-arrow">›</div>
                </a>

            </div>

        </section>

        <!-- DAFTAR DESA -->
        <section class="section-card">

            <h3 class="section-title">Daftar Desa Wilayah Kecamatan Anda</h3>
            <p class="section-description">
                Daftar desa yang berada dalam wilayah kerja kecamatan Anda.
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="number">No.</th>
                            <th>Nama Desa</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($desas as $desa)
                            <tr>
                                <td class="number">{{ $loop->iteration }}</td>
                                <td><strong>{{ $desa->nama_desa }}</strong></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    <div class="empty-state">
                                        Belum ada desa terdaftar.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>

    </main>

    @include('layouts.footer')

</body>
</html>
