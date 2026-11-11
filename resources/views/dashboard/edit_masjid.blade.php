
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Masjid | SIDADU AGAMA</title>

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
            max-width: 850px;
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

        .form-card {
            background: white;
            margin-top: 25px;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        }

        .form-title {
            color: #075c3b;
            font-size: 20px;
            margin-bottom: 7px;
        }

        .form-description {
            color: #839087;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            color: #365542;
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .required {
            color: #d04438;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce8df;
            border-radius: 9px;
            background: #fbfdfb;
            font-family: inherit;
            font-size: 14px;
            color: #263b2e;
            outline: none;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #08784d;
            box-shadow: 0 0 0 3px rgba(8,120,77,0.09);
            background: white;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .readonly-box {
            background: #edf6ef !important;
            color: #08784d !important;
            font-weight: 600;
            cursor: not-allowed;
        }

        .help-text {
            color: #829087;
            font-size: 12px;
            margin-top: 8px;
        }

        .desa-info {
            background: #fffaf0;
            border: 1px solid #f0dfb2;
            border-left: 4px solid #d6a83e;
            padding: 13px 15px;
            border-radius: 8px;
            color: #725d2e;
            font-size: 12px;
            line-height: 1.6;
            margin-top: 10px;
        }

        .error-box {
            background: #fff0ee;
            border: 1px solid #f2c5c0;
            color: #a8322a;
            padding: 15px 18px;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .error-box strong {
            display: block;
            margin-bottom: 8px;
        }

        .error-box ul {
            padding-left: 20px;
            line-height: 1.8;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #edf1ed;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-back {
            background: #edf6ef;
            color: #08784d;
        }

        .btn-back:hover {
            background: #dcefe1;
        }

        .btn-save {
            background: #08784d;
            color: white;
        }

        .btn-save:hover {
            background: #075c3b;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
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

            .form-card {
                padding: 22px 18px;
            }

            .form-actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
                text-align: center;
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

        <div class="role-label">OPERATOR DESA</div>
    </header>

    <main class="main">

        <section class="welcome">
            <h1>Edit Data Masjid</h1>
            <p>
                Selamat datang, <strong>{{ $user->nama_lengkap }}</strong>.
                Silakan perbarui informasi masjid dengan data yang benar.
            </p>
            <div class="gold-line"></div>
        </section>

        <section class="form-card">

            <h2 class="form-title">Formulir Perubahan Data Masjid</h2>
            <p class="form-description">
                Periksa kembali informasi masjid sebelum menyimpan perubahan.
                Kolom bertanda <span class="required">*</span> wajib diisi.
            </p>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa kembali data yang Anda masukkan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/operator-desa/masjid/' . $masjid->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_masjid">
                        Nama Masjid <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_masjid"
                        name="nama_masjid"
                        value="{{ old('nama_masjid', $masjid->nama_masjid) }}"
                        maxlength="150"
                        placeholder="Masukkan nama masjid"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="alamat">
                        Alamat Masjid <span class="required">*</span>
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        placeholder="Masukkan alamat lengkap masjid"
                        required
                    >{{ old('alamat', $masjid->alamat) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="desa">Desa</label>

                    <input
                        type="text"
                        id="desa"
                        class="readonly-box"
                        value="{{ $masjid->desa->nama_desa ?? 'Desa tidak ditemukan' }}"
                        readonly
                    >

                    <div class="desa-info">
                        <strong>Informasi:</strong>
                        Desa tidak dapat diubah oleh Operator Desa.
                        Perubahan wilayah hanya dapat dilakukan oleh pihak
                        yang memiliki kewenangan.
                    </div>
                </div>

                <div class="form-actions">

                    <a href="{{ url('/operator-desa/masjid') }}"
                       class="btn btn-back">
                        ← Kembali ke Data Masjid
                    </a>

                    <button type="submit" class="btn btn-save">
                        ✓ Simpan Perubahan
                    </button>

                </div>

            </form>

        </section>

    </main>

    @include('layouts.footer')

</body>
</html>
