
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masjid | SIDADU AGAMA</title>

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
            padding: 19px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            background: white;
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
            font-size: 12px;
        }

        .main {
            width: 90%;
            max-width: 1150px;
            margin: 35px auto;
            flex: 1;
        }

        .welcome {
            background: linear-gradient(120deg, #08784d, #0b9660);
            color: white;
            padding: 30px;
            border-radius: 17px;
            box-shadow: 0 8px 22px rgba(8,120,77,0.13);
        }

        .welcome h1 {
            font-size: 26px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #e4fff0;
            font-size: 14px;
            line-height: 1.7;
        }

        .gold-line {
            width: 65px;
            height: 4px;
            background: #e9c46a;
            border-radius: 5px;
            margin-top: 17px;
        }

        .summary {
            margin-top: 25px;
            background: white;
            padding: 23px;
            border-radius: 14px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .summary-icon {
            width: 58px;
            height: 58px;
            background: #e8f5ec;
            color: #08784d;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
        }

        .summary-label {
            color: #758279;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .summary-number {
            font-size: 27px;
            color: #075c3b;
            font-weight: 700;
        }

        .content-card {
            background: white;
            margin-top: 25px;
            border-radius: 15px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        .card-header {
            padding: 23px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            border-bottom: 1px solid #edf1ed;
        }

        .card-header h2 {
            color: #075c3b;
            font-size: 19px;
            margin-bottom: 5px;
        }

        .card-header p {
            color: #839087;
            font-size: 12px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            font-family: inherit;
        }

        .btn-add {
            background: #08784d;
            color: white;
        }

        .btn-add:hover {
            background: #075c3b;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        thead {
            background: #edf6ef;
        }

        th {
            padding: 16px 18px;
            color: #075c3b;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid #edf1ed;
            font-size: 13px;
            color: #526257;
        }

        tbody tr:hover {
            background: #f8fcf9;
        }

        .number {
            color: #08784d;
            font-weight: 700;
        }

        .masjid-name {
            color: #075c3b;
            font-weight: 600;
        }

        .desa-label {
            display: inline-block;
            background: #e8f5ec;
            color: #08784d;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .action {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit {
            background: #e8f5ec;
            color: #08784d;
            padding: 8px 12px;
        }

        .btn-edit:hover {
            background: #d3ebda;
        }

        .btn-delete {
            background: #fff0ee;
            color: #bd3c32;
            padding: 8px 12px;
        }

        .btn-delete:hover {
            background: #ffe0dc;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .empty h3 {
            color: #075c3b;
            margin-bottom: 8px;
        }

        .empty p {
            color: #839087;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .alert-success {
            background: #e8f7ed;
            border: 1px solid #b9e3c5;
            color: #17663c;
            padding: 14px 18px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn-back {
            background: white;
            color: #08784d;
            border: 1px solid #cfe3d4;
        }

        .btn-back:hover {
            background: #e8f5ec;
        }

        .logout-form {
            margin: 0;
        }

        .btn-logout {
            background: #fff0ee;
            color: #bd3c32;
            border: 1px solid #f0c8c4;
        }

        .btn-logout:hover {
            background: #ffe0dc;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 16px 5%;
            }

            .brand h2 {
                font-size: 17px;
            }

            .main {
                width: 92%;
                margin: 22px auto;
            }

            .welcome {
                padding: 24px 21px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .card-header .btn {
                width: 100%;
                text-align: center;
            }

            .navigation {
                align-items: stretch;
                flex-direction: column;
            }

            .navigation .btn {
                text-align: center;
            }

            .logout-form,
            .logout-form button {
                width: 100%;
            }
        }
        .nav-menu {
    display: flex;
    align-items: center;
    gap: 12px;
}

.nav-menu form {
    margin: 0;
}

.btn-logout {
    background: #fff;
    color: #bd3c32;
    border: 1px solid #f0c8c4;
    padding: 9px 16px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    font-family: inherit;
    transition: 0.2s;
}

.btn-logout:hover {
    background: #fff0ee;
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

       <div class="nav-menu">
    <div class="role-label">OPERATOR DESA</div>

    <form action="{{ url('/logout') }}" method="POST"
          onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
        @csrf
        <button type="submit" class="btn-logout">
            ↪ Logout
        </button>
    </form>
</div>
    </header>

    <main class="main">

        <section class="welcome">
            <h1>Data Masjid Desa</h1>
            <p>
                Selamat datang, <strong>{{ $user->nama_lengkap }}</strong>.
                Kelola dan pantau data masjid yang terdaftar di desa Anda.
            </p>
            <div class="gold-line"></div>
        </section>

        @if (session('success'))
            <div class="alert-success" style="margin-top: 20px;">
                ✓ {{ session('success') }}
            </div>
        @endif

        <section class="summary">
            <div class="summary-icon">🕌</div>
            <div>
                <div class="summary-label">Total Masjid Terdaftar</div>
                <div class="summary-number">{{ $masjids->count() }}</div>
            </div>
        </section>

        <section class="content-card">

            <div class="card-header">
                <div>
                    <h2>Daftar Masjid di Desa Anda</h2>
                    <p>Informasi masjid yang telah dimasukkan ke dalam sistem.</p>
                </div>

                <a class="btn btn-add"
                   href="{{ url('/operator-desa/masjid/tambah') }}">
                    + Tambah Data Masjid
                </a>
            </div>

            @if ($masjids->isEmpty())

                <div class="empty">
                    <div class="empty-icon">🕌</div>
                    <h3>Belum Ada Data Masjid</h3>
                    <p>Silakan tambahkan data masjid pertama di desa Anda.</p>

                    <a class="btn btn-add"
                       href="{{ url('/operator-desa/masjid/tambah') }}">
                        + Tambah Masjid Sekarang
                    </a>
                </div>

            @else

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Masjid</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($masjids as $masjid)
                                <tr>
                                    <td class="number">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="masjid-name">
                                        {{ $masjid->nama_masjid }}
                                    </td>

                                    <td>
                                        {{ $masjid->alamat }}
                                    </td>

                                    <td>
                                        <span class="desa-label">
                                            {{ $masjid->desa->nama_desa ?? 'Desa tidak ditemukan' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action">
                                            <a class="btn btn-edit"
                                               href="{{ url('/operator-desa/masjid/' . $masjid->id . '/edit') }}">
                                                Edit
                                            </a>

                                            <form
                                                action="{{ url('/operator-desa/masjid/' . $masjid->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Yakin ingin menghapus data masjid ini?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-delete">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif

        </section>

        <div class="navigation">
            <a class="btn btn-back"
               href="{{ url('/dashboard/operator-desa') }}">
                ← Kembali ke Dashboard
            </a>

            
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>
