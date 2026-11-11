
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Operator Desa - SIDADU</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f7f2;
            color: #26352b;
        }

        .header {
            background: linear-gradient(135deg, #064e3b, #08734f);
            color: white;
            padding: 25px 7%;
            border-bottom: 5px solid #d4af37;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .header p {
            margin: 0;
            color: #e5f3e9;
        }

        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            border-top: 4px solid #d4af37;
        }

        .card h2 {
            margin-top: 0;
            color: #065f46;
            font-size: 21px;
        }

        .info {
            background: #ecfdf5;
            border-left: 4px solid #d4af37;
            padding: 13px 16px;
            margin-bottom: 25px;
            border-radius: 6px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #14532d;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5ce;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            background: #fff;
            transition: 0.2s;
        }

        input:focus, select:focus {
            border-color: #07804f;
            box-shadow: 0 0 0 3px rgba(7,128,79,0.12);
        }

        small {
            display: block;
            color: #718078;
            margin-top: 7px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-error p {
            margin: 4px 0;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-save {
            background: #08734f;
            color: white;
            border-bottom: 3px solid #d4af37;
        }

        .btn-save:hover {
            background: #065f46;
        }

        .btn-back {
            background: #e5eee8;
            color: #14532d;
        }

        .btn-back:hover {
            background: #d1e4d7;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #718078;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 22px 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .card {
                padding: 22px 18px;
            }

            .actions .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header class="header">
    <h1>SIDADU</h1>
    <p>Sistem Informasi Dana dan Administrasi Umum</p>
</header>

<div class="container">

    <div class="card">

        <h2>Edit Operator Desa</h2>

        <div class="info">
            <strong>Admin Kecamatan:</strong>
            {{ $user->nama_lengkap }}
        </div>

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data berikut:</strong>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin-kecamatan.operator.update', $operator->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Lengkap Operator</label>
                <input type="text"
                       name="nama_lengkap"
                       value="{{ old('nama_lengkap', $operator->nama_lengkap) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text"
                       name="username"
                       value="{{ old('username', $operator->username) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password">
                <small>Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="form-group">
                <label>Desa</label>
                <select name="desa_id" required>
                    @foreach ($desa as $item)
                        <option value="{{ $item->id }}"
                            {{ old('desa_id', $operator->desa_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-save">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin-kecamatan.operator.index') }}"
                   class="btn btn-back">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

<div class="footer">
    © {{ date('Y') }} SIDADU - Sistem Informasi Dana dan Administrasi Umum
</div>

</body>
</html>
