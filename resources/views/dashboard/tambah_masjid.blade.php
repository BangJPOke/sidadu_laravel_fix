
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Masjid | SIDADU AGAMA</title>

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

        .btn-logout {
            background: white;
            color: #bd3c32;
            border: 1px solid #f0c8c4;
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .nav-menu form {
            margin: 0;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h2 {
            color: #075b43;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #718078;
            font-size: 14px;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.06);
            border-top: 4px solid #d5ad48;
        }

        .form-card h3 {
            color: #075b43;
            margin-bottom: 8px;
            font-size: 19px;
        }

        .description {
            color: #87928c;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 9px;
            color: #315344;
        }

        input, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce6e0;
            border-radius: 9px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: 0.2s;
            background: #fcfefd;
        }

        input:focus, textarea:focus {
            border-color: #087653;
            box-shadow: 0 0 0 3px rgba(8,118,83,0.10);
        }

        textarea {
            resize: vertical;
            min-height: 115px;
        }

        .readonly {
            background: #edf5f0;
            color: #527060;
            cursor: not-allowed;
        }

        .field-info {
            color: #7b8981;
            font-size: 12px;
            margin-top: 8px;
            line-height: 1.5;
        }

        .alert-error {
            background: #fff0ee;
            color: #b83227;
            border: 1px solid #f3c8c3;
            border-radius: 9px;
            padding: 15px 20px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .alert-error ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn {
            display: inline-block;
            padding: 12px 21px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            background: #087653;
            color: white;
        }

        .btn-primary:hover {
            background: #075b43;
        }

        .btn-secondary {
            background: #edf3ef;
            color: #315344;
        }

        .btn-secondary:hover {
            background: #dfeae3;
        }

        .footer {
            text-align: center;
            padding: 25px 15px;
            color: #89958e;
            font-size: 12px;
            margin-top: 35px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 17px 5%;
            }

            .container {
                margin-top: 25px;
            }

            .form-card {
                padding: 22px 18px;
            }

            .welcome h2 {
                font-size: 21px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                text-align: center;
                width: 100%;
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
            <div class="role-label">OPERATOR DESA</div>

            <form action="{{ url('/logout') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                @csrf
                <button type="submit" class="btn-logout">↪ Logout</button>
            </form>
        </div>
    </header>

    <main class="container">

        <div class="welcome">
            <h2>Tambah Data Masjid</h2>
            <p>Selamat datang, {{ $user->nama_lengkap }}. Silakan lengkapi formulir berikut.</p>
        </div>

        <section class="form-card">
            <h3>Formulir Data Masjid</h3>
            <p class="description">
                Masukkan informasi masjid dengan benar dan lengkap.
            </p>

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Data belum berhasil disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/operator-desa/masjid') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_masjid">Nama Masjid</label>
                    <input
                        type="text"
                        id="nama_masjid"
                        name="nama_masjid"
                        value="{{ old('nama_masjid') }}"
                        maxlength="150"
                        placeholder="Contoh: Masjid Jami Al-Ikhlas"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Masjid</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        placeholder="Masukkan alamat lengkap masjid"
                        required
                    >{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Desa</label>
                    <input
                        type="text"
                        class="readonly"
                        value="{{ $desas->first()->nama_desa ?? 'Desa belum tersedia' }}"
                        readonly
                    >
                    <p class="field-info">
                        <span>ⓘ</span> Masjid akan otomatis terdaftar pada desa akun Operator Desa.
                        Nama desa tidak dapat diubah melalui formulir ini.
                    </p>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        ✓ Simpan Masjid
                    </button>

                    <a href="{{ url('/operator-desa/masjid') }}" class="btn btn-secondary">
                        ← Kembali ke Data Masjid
                    </a>
                </div>
            </form>
        </section>

    </main>

    <footer class="footer">
        © {{ date('Y') }} SIDADU AGAMA | BangJP
    </footer>

</body>
</html>
