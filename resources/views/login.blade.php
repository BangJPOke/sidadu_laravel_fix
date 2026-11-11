
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | SIDADU AGAMA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px 15px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #f4f7f6);
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 38px;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(0, 70, 45, .12);
            border: 1px solid #e4eee8;
        }

        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #e8f5e9;
            border-radius: 50%;
        }

        .logo svg {
            width: 55px;
            height: 55px;
        }

        .judul {
            text-align: center;
            margin-bottom: 28px;
        }

        .judul h1 {
            color: #075e43;
            font-size: 27px;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .judul p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        .garis-emas {
            width: 55px;
            height: 3px;
            background: #d4af37;
            margin: 13px auto 0;
            border-radius: 10px;
        }

        .pesan-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            background: white;
            transition: .2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #08764f;
            box-shadow: 0 0 0 3px rgba(8, 118, 79, .10);
        }

        .password-wrapper {
            display: flex;
            gap: 8px;
        }

        .password-wrapper input {
            flex: 1;
            min-width: 0;
        }

        .btn-lihat {
            width: 48px;
            flex-shrink: 0;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #f8fafc;
            color: #075e43;
            font-size: 19px;
            cursor: pointer;
        }

        .btn-lihat:hover {
            background: #e8f5e9;
        }

        .checkbox-operator {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 14px;
            background: #eaf6ef;
            border: 1px solid #cce8d7;
            border-radius: 9px;
            margin-bottom: 20px;
            transition: .2s;
        }

        .checkbox-operator:has(input:checked) {
            border-color: #08764f;
            background: #e0f2e8;
        }

        .checkbox-operator input {
            width: 18px;
            height: 18px;
            accent-color: #08764f;
            cursor: pointer;
        }

        .checkbox-operator label {
            cursor: pointer;
            color: #075e43;
            font-weight: 700;
            font-size: 13px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #08764f;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #064632;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(7, 94, 67, .18);
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 17px;
            border-top: 1px solid #edf2ee;
            font-size: 12px;
            color: #64748b;
        }

        .footer strong {
            color: #075e43;
        }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #08764f;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .kembali:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 28px 22px;
            }

            .judul h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 100 100"
             fill="none">

            <path d="M20 48 C20 28 35 15 50 15 C65 15 80 28 80 48"
                  fill="#08764f"/>

            <path d="M50 5 C44 10 44 17 50 22 C42 21 38 15 40 9 C42 5 46 3 50 5Z"
                  fill="#d4af37"/>

            <path d="M10 38 H25 V80 H10 Z"
                  fill="#08764f"/>

            <path d="M7 38 L17.5 25 L28 38 Z"
                  fill="#d4af37"/>

            <path d="M75 38 H90 V80 H75 Z"
                  fill="#08764f"/>

            <path d="M72 38 L82.5 25 L93 38 Z"
                  fill="#d4af37"/>

            <path d="M20 48 H80 V80 H20 Z"
                  fill="#08764f"/>

            <path d="M40 80 V65 C40 58 45 55 50 55 C55 55 60 58 60 65 V80 Z"
                  fill="white"/>

            <path d="M5 82 H95"
                  stroke="#d4af37"
                  stroke-width="4"
                  stroke-linecap="round"/>
        </svg>
    </div>

    <div class="judul">
        <h1>SIDADU AGAMA</h1>
        <p>Sistem Informasi Pendataan Terpadu Keagamaan</p>
        <div class="garis-emas"></div>
    </div>

    @if (session('error'))
        <div class="pesan-error">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="pesan-error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>

            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                placeholder="Masukkan username"
                autocomplete="username"
                required
                autofocus
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >

                <button
                    type="button"
                    class="btn-lihat"
                    onclick="togglePassword()"
                    id="btnLihat"
                    title="Lihat password"
                    aria-label="Lihat password"
                >
                    👁
                </button>
            </div>
        </div>

        <div class="checkbox-operator">
            <input
                type="checkbox"
                id="operatorDesa"
                name="operator_desa"
                value="1"
                onchange="pilihOperator()"
                {{ old('role') == 'operator_desa' ? 'checked' : '' }}
            >

            <label for="operatorDesa">
                Masuk sebagai Operator Desa
            </label>
        </div>

        <div class="form-group">
            <label for="role">Masuk sebagai</label>

            <select name="role" id="role" required>
                <option value="">-- Pilih Role --</option>

                <option value="operator_desa"
                    {{ old('role') == 'operator_desa' ? 'selected' : '' }}>
                    Operator Desa
                </option>

                <option value="admin_Kecamatan"
                    {{ old('role') == 'admin_Kecamatan' ? 'selected' : '' }}>
                    Admin Kecamatan
                </option>

                <option value="bagian_kesra"
                    {{ old('role') == 'bagian_kesra' ? 'selected' : '' }}>
                    Bagian Kesra (Admin Kabupaten)
                </option>
            </select>
        </div>

        <button type="submit" class="btn-login">
            MASUK KE SISTEM
        </button>

    </form>

    <a href="/" class="kembali">
        ← Kembali ke Halaman Utama
    </a>

    <div class="footer">
        © {{ date('Y') }} <strong>SIDADU AGAMA | BangJP</strong>
    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const tombol = document.getElementById('btnLihat');

        if (password.type === 'password') {
            password.type = 'text';
            tombol.textContent = '🙈';
            tombol.title = 'Sembunyikan password';
            tombol.setAttribute('aria-label', 'Sembunyikan password');
        } else {
            password.type = 'password';
            tombol.textContent = '👁';
            tombol.title = 'Lihat password';
            tombol.setAttribute('aria-label', 'Lihat password');
        }
    }

    function pilihOperator() {
        const checkbox = document.getElementById('operatorDesa');
        const role = document.getElementById('role');

        if (checkbox.checked) {
            role.value = 'operator_desa';
        } else if (role.value === 'operator_desa') {
            role.value = '';
        }
    }

    document.getElementById('role').addEventListener('change', function () {
        document.getElementById('operatorDesa').checked =
            this.value === 'operator_desa';
    });
</script>

</body>
</html>
