
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengurus | SIDADU AGAMA</title>

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
        }

        .container {
            max-width: 950px;
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
            margin-bottom: 25px;
        }

        .section-title {
            color: #075b43;
            font-size: 18px;
            padding-bottom: 13px;
            margin-bottom: 22px;
            border-bottom: 1px solid #e5eee8;
        }

        .section-description {
            color: #87928c;
            font-size: 13px;
            margin-top: -12px;
            margin-bottom: 22px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 9px;
            color: #315344;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce6e0;
            border-radius: 9px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            background: #fcfefd;
            transition: 0.2s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #087653;
            box-shadow: 0 0 0 3px rgba(8,118,83,0.10);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"] {
            padding: 10px;
            background: #f8fbf9;
        }

        .file-info {
            color: #7b8981;
            font-size: 12px;
            margin-bottom: 20px;
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
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
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
            margin-top: 30px;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 17px 5%;
            }

            .container {
                margin-top: 25px;
            }

            .form-card {
                padding: 22px 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
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
            <h2>Form Pendaftaran Pengurus Masjid</h2>
            <p>Selamat datang, {{ $user->nama_lengkap }}. Silakan lengkapi data pengurus dengan benar.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Data belum berhasil disimpan. Periksa kembali:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/operator-desa/pengurus') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <section class="form-card">
                <h3 class="section-title">01. Data Masjid</h3>
                <p class="section-description">
                    Pilih masjid tempat pengurus menjalankan tugas.
                </p>

                <div class="form-group">
                    <label for="masjid_id">Nama Masjid</label>
                    <select name="masjid_id" id="masjid_id" required>
                        <option value="">-- Pilih Masjid --</option>

                        @foreach ($masjids as $masjid)
                            <option value="{{ $masjid->id }}"
                                {{ old('masjid_id') == $masjid->id ? 'selected' : '' }}>
                                {{ $masjid->nama_masjid }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </section>

            <section class="form-card">
                <h3 class="section-title">02. Identitas Pengurus</h3>
                <p class="section-description">
                    Masukkan identitas pribadi calon pengurus sesuai dokumen resmi.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                               value="{{ old('nama_lengkap') }}"
                               placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK (16 Digit)</label>
                        <input type="text" id="nik" name="nik"
                               maxlength="16" inputmode="numeric"
                               value="{{ old('nik') }}"
                               placeholder="Masukkan 16 digit NIK" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir"
                               value="{{ old('tgl_lahir') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" id="pendidikan" name="pendidikan"
                               value="{{ old('pendidikan') }}"
                               placeholder="Contoh: SMA / S1" required>
                    </div>

                    <div class="form-group">
                        <label for="norek_bjb">Nomor Rekening BJB</label>
                        <input type="text" id="norek_bjb" name="norek_bjb"
                               value="{{ old('norek_bjb') }}"
                               placeholder="Masukkan nomor rekening" required>
                    </div>

                    <div class="form-group">
                        <label for="peran">Peran / Jabatan Pengurus</label>
                        <select name="peran" id="peran" required>
                            <option value="">-- Pilih Jabatan --</option>

                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan }}"
                                    {{ old('peran') == $jabatan ? 'selected' : '' }}>
                                    {{ $jabatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat"
                              placeholder="Masukkan alamat lengkap pengurus"
                              required>{{ old('alamat') }}</textarea>
                </div>
            </section>

            <section class="form-card">
                <h3 class="section-title">03. Dokumen Pendukung</h3>
                <p class="section-description">
                    Unggah dokumen pendukung calon pengurus.
                </p>

                <p class="file-info">
                    Format dokumen: JPG, JPEG, PNG, atau PDF.
                    Maksimal 2 MB per file.
                </p>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="file_ktp">File KTP</label>
                        <input type="file" id="file_ktp" name="file_ktp"
                               accept=".jpg,.jpeg,.png,.pdf">
                    </div>

                    <div class="form-group">
                        <label for="file_kk">File KK</label>
                        <input type="file" id="file_kk" name="file_kk"
                               accept=".jpg,.jpeg,.png,.pdf">
                    </div>

                    <div class="form-group">
                        <label for="file_sk">File SK Pengurus</label>
                        <input type="file" id="file_sk" name="file_sk"
                               accept=".jpg,.jpeg,.png,.pdf">
                    </div>

                    <div class="form-group">
                        <label for="file_bank">File Buku Rekening</label>
                        <input type="file" id="file_bank" name="file_bank"
                               accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>
            </section>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    ✓ Daftarkan Pengurus
                </button>

                <a href="{{ url('/dashboard/operator-desa') }}"
                   class="btn btn-secondary">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </form>

    </main>

    <footer class="footer">
        © {{ date('Y') }} SIDADU AGAMA | BangJP
    </footer>

</body>
</html>
