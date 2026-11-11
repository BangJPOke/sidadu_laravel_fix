<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Akun Admin Kecamatan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 25px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #198754;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #198754;
            color: white;
        }

        input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 7px;
        }

        button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 9px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            border-radius: 5px;
        }

        .error {
            color: #dc3545;
            font-size: 13px;
        }

        .kembali {
            display: inline-block;
            margin-bottom: 15px;
            color: #198754;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ url('/dashboard/bagian-kesra') }}" class="kembali">
        ← Kembali ke Dashboard Bagian Kesra
    </a>

    <h2>Kelola Akun Admin Kecamatan</h2>

    <p>
        Halaman ini digunakan untuk melihat username dan mengatur ulang
        password akun Admin Kecamatan.
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Username</th>
                <th>ID Kecamatan</th>
                <th>Reset Password</th>
            </tr>
        </thead>

        <tbody>
            @forelse($akunKecamatan as $akun)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $akun->nama_lengkap }}</td>

                    <td>{{ $akun->username }}</td>

                    <td>{{ $akun->kecamatan_id }}</td>

                    <td>
                        <form
                            action="{{ route('kesra.reset-password-kecamatan') }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin mereset password akun ini?');"
                        >
                            @csrf

                            <input
                                type="hidden"
                                name="user_id"
                                value="{{ $akun->id }}"
                            >

                            <input
                                type="password"
                                name="password_baru"
                                placeholder="Password baru"
                                minlength="8"
                                required
                            >

                            <input
                                type="password"
                                name="password_baru_confirmation"
                                placeholder="Ulangi password baru"
                                minlength="8"
                                required
                            >

                            <button type="submit">
                                Reset Password
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Belum ada akun Admin Kecamatan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>