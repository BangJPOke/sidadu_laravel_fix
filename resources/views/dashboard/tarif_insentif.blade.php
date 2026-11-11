
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Tarif Insentif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 25px;
        }
        .container {
            max-width: 850px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h2 {
            color: #176b3a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #176b3a;
            color: white;
        }
        input {
            width: 90%;
            padding: 9px;
        }
        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            border: none;
            border-radius: 5px;
            background: #176b3a;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Pengaturan Nominal Insentif Pengurus Masjid</h2>
    <p>Atur nominal insentif berdasarkan jabatan. Jabatan yang sama akan menggunakan nominal yang sama.</p>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <p style="color:red">{{ $errors->first() }}</p>
    @endif

    <form action="{{ url('/bagian-kesra/tarif-insentif') }}" method="POST">
        @csrf

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jabatan</th>
                    <th>Nominal Insentif (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarif as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>
                            <input
                                type="number"
                                name="tarif[{{ $item->id }}]"
                                value="{{ $item->nominal }}"
                                min="0"
                                step="1000"
                                required
                            >
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Simpan Tarif Insentif</button>
    </form>

    <a href="{{ url('/dashboard/bagian-kesra') }}" class="kembali">Kembali ke Dashboard</a>

</div>
</body>
</html>
