
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Operator Desa | SIDADU AGAMA</title>

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
            max-width: 850px;
            margin: 32px auto;
            flex: 1;
        }

        .welcome {
            background: linear-gradient(120deg, #08784d, #0b9660);
            color: white;
            padding: 28px 30px;
            border-radius: 16px;
            box-shadow: 0 7px 20px rgba(8,120,77,.13);
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 25px;
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
            margin-top: 14px;
            font-size: 13px;
            color: #f5e8bd;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 14px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
        }

        .card h2 {
            color: #075c3b;
            font-size: 20px;
            margin-bottom: 7px;
        }

        .card-description {
            color: #758279;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 23px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 17px;
            font-size: 13px;
        }

        .alert-error {
            background: #fff0ee;
            color: #b42318;
            border: 1px solid #f2c5c0;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            color: #315b40;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d9e5dc;
            border-radius: 8px;
            background: #fcfefd;
            color: #263b2e;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #08784d;
            box-shadow: 0 0 0 3px rgba(8,120,77,.10);
            background: white;
        }

        .form-group input::placeholder {
            color: #a0aaa3;
        }

        .field-error {
            color: #bd3c32;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-note {
            background: #fffaf0;
            border: 1px solid #f0dfb2;
            border-left: 4px solid #d6a83e;
            border-radius: 8px;
            padding: 13px 15px;
            color: #6d592c;
            font-size: 12px;
            line-height: 1.7;
            margin: 22px 0;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn-simpan {
            background: #08784d;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn-simpan:hover {
            background: #075c3b;
            transform: translateY(-2px);
        }

        .btn-kembali {
            display: inline-block;
            background: #edf5ef;
            color: #176534;
            border: 1px solid #d4e6d8;
            padding: 11px 16px;
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

            .nav-right {
                width: 100%;
                justify-content: space-between;
            }

            .main {
                width: 94%;
                margin: 22px auto;
            }

            .welcome {
                padding: 23px 20px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .card {
                padding: 19px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-actions a,
            .form-actions button {
                text-align: center;
                width: 100%;
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
        <h1>Tambah Operator Desa</h1>
        <p>
            Buat akun Operator Desa baru untuk membantu pengelolaan
            data masjid dan pengurus masjid di wilayah kecamatan Anda.
        </p>

        <div class="gold-line"></div>

        <div class="admin-info">
            Admin Kecamatan: <strong>{{ $user->nama_lengkap }}</strong>
        </div>
    </section>

    <section class="card">

        <h2>Formulir Operator Desa</h2>
        <p class="card-description">
            Silakan lengkapi seluruh informasi berikut untuk membuat akun Operator Desa.
        </p>

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data yang Anda masukkan:</strong>
                @foreach ($errors->all() as $error)
                    <p style="margin-top: 6px;">• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin-kecamatan.operator.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap Operator</label>
                <input
                    type="text"
                    id="nama_lengkap"
                    name="nama_lengkap"
                    value="{{ old('nama_lengkap') }}"
                    placeholder="Masukkan nama lengkap operator"
                    required
                >
                @error('nama_lengkap')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Buat username untuk login"
                    required
                >
                @error('username')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password akun"
                    required
                >
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desa_id">Pilih Desa</label>
                <select name="desa_id" id="desa_id" required>
                    <option value="">-- Pilih Desa --</option>

                    @foreach ($desa as $item)
                        <option value="{{ $item->id }}"
                            {{ old('desa_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_desa }}
                        </option>
                    @endforeach
                </select>
                @error('desa_id')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-note">
                <strong>Informasi:</strong><br>
                Pastikan desa yang dipilih sudah benar. Akun Operator Desa
                akan digunakan untuk mengelola data masjid dan pengurus
                sesuai wilayah desa yang ditentukan.
            </div>

            <div class="form-actions">
                <a class="btn-kembali" href="{{ route('admin-kecamatan.operator.index') }}">
                    ← Kembali ke Daftar Operator
                </a>

                <button type="submit" class="btn-simpan">
                    ✓ Simpan Operator
                </button>
            </div>

        </form>
    </section>

</main>

<footer class="footer">
    © {{ date('Y') }} SIDADU AGAMA | BangJP
</footer>

</body>
</html>
