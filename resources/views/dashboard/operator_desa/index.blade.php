
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Operator Desa | SIDADU AGAMA</title>

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
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,.12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            background: white;
            color: #08784d;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .brand h2 {
            font-size: 20px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 11px;
            color: #d9f4e5;
            margin-top: 3px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .role-label {
            color: #f4e4ae;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-logout {
            background: white;
            color: #08784d;
            border: none;
            padding: 10px 17px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .main {
            width: 92%;
            max-width: 1200px;
            margin: 32px auto;
            flex: 1;
        }

        .welcome {
            background: linear-gradient(120deg, #08784d, #0b9660);
            color: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 7px 20px rgba(8,120,77,.13);
            margin-bottom: 25px;
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

        .admin-info {
            margin-top: 15px;
            font-size: 13px;
            color: #f5e8bd;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .card-header h2 {
            color: #075c3b;
            font-size: 20px;
        }

        .card-header p {
            color: #758279;
            font-size: 13px;
            margin-top: 6px;
        }

        .btn-tambah {
            display: inline-block;
            background: #08784d;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-tambah:hover {
            background: #075c3b;
            transform: translateY(-2px);
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 17px;
            font-size: 13px;
        }

        .alert-success {
            background: #e4f5e8;
            color: #176534;
            border: 1px solid #bce3c6;
        }

        .alert-error {
            background: #fff0ee;
            color: #b42318;
            border: 1px solid #f2c5c0;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
        }

        thead {
            background: #075c3b;
            color: white;
        }

        th {
            padding: 14px 13px;
            text-align: left;
            font-size: 13px;
            white-space: nowrap;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #e8eee9;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #f6faf7;
        }

        .operator-name {
            font-weight: 700;
            color: #185b35;
        }

        .username {
            background: #edf5ef;
            color: #176534;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            display: inline-block;
        }

        .desa {
            color: #596b60;
        }

        .aksi {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit {
            display: inline-block;
            background: #fff6dc;
            color: #8a650d;
            border: 1px solid #ead28b;
            text-decoration: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .btn-edit:hover {
            background: #f8e9b9;
        }

        .btn-hapus {
            background: #fff0ee;
            color: #bd3c32;
            border: 1px solid #f0c8c4;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #ffe0dc;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .empty-state h3 {
            color: #185b35;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #829087;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .bottom-nav {
            margin-top: 22px;
        }

        .btn-kembali {
            display: inline-block;
            background: #edf5ef;
            color: #176534;
            border: 1px solid #d4e6d8;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .btn-kembali:hover {
            background: #dceee0;
        }

        .footer {
            text-align: center;
            padding: 23px 15px;
            color: #829087;
            font-size: 12px;
            margin-top: 20px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 15px 4%;
            }

            .brand h2 {
                font-size: 17px;
            }

            .brand p {
                font-size: 10px;
            }

            .main {
                width: 94%;
                margin: 22px auto;
            }

            .welcome {
                padding: 24px 20px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .card {
                padding: 17px;
            }

            .card-header {
                align-items: flex-start;
            }

            .nav-right {
                width: 100%;
                justify-content: space-between;
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

    <div class="nav-right">
        <span class="role-label">ADMIN KECAMATAN</span>

        <form action="{{ url('/logout') }}" method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
            @csrf
            <button type="submit" class="btn-logout">↪ Logout</button>
        </form>
    </div>
</header>

<main class="main">

    <section class="welcome">
        <h1>Kelola Operator Desa</h1>
        <p>
            Kelola akun Operator Desa yang berada di wilayah kecamatan Anda.
            Tambahkan akun baru, perbarui informasi, atau hapus akun yang tidak diperlukan.
        </p>

        <div class="gold-line"></div>

        <div class="admin-info">
            Admin Kecamatan: <strong>{{ $user->nama_lengkap }}</strong>
        </div>
    </section>

    <section class="card">

        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-header">
            <div>
                <h2>Daftar Operator Desa</h2>
                <p>Daftar akun Operator Desa yang terdaftar di kecamatan Anda.</p>
            </div>

            <a class="btn-tambah" href="{{ route('admin-kecamatan.operator.create') }}">
                + Tambah Operator Desa
            </a>
        </div>

        @if ($operator->isEmpty())

            <div class="empty-state">
                <div class="empty-icon">👥</div>
                <h3>Belum Ada Operator Desa</h3>
                <p>Belum ada akun Operator Desa yang terdaftar di kecamatan Anda.</p>

                <a class="btn-tambah" href="{{ route('admin-kecamatan.operator.create') }}">
                    + Tambahkan Operator Desa
                </a>
            </div>

        @else

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Operator</th>
                            <th>Username</th>
                            <th>Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($operator as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="operator-name">
                                    {{ $item->nama_lengkap }}
                                </td>

                                <td>
                                    <span class="username">
                                        {{ $item->username }}
                                    </span>
                                </td>

                                <td class="desa">
                                    {{ $item->desa->nama_desa ?? '-' }}
                                </td>

                                <td>
                                    <div class="aksi">
                                        <a class="btn-edit"
                                           href="{{ route('admin-kecamatan.operator.edit', $item->id) }}">
                                            ✎ Edit
                                        </a>

                                        <form action="{{ route('admin-kecamatan.operator.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus akun operator ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-hapus">
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

        <div class="bottom-nav">
            <a class="btn-kembali" href="{{ url('/dashboard/admin-kecamatan') }}">
                ← Kembali ke Dashboard
            </a>
        </div>

    </section>

</main>

<footer class="footer">
    © {{ date('Y') }} SIDADU AGAMA | BangJP
</footer>

</body>
</html>
