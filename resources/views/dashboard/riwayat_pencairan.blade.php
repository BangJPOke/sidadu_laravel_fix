
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pencairan Insentif</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 25px;
        }

        .container {
            max-width: 1400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            overflow-x: auto;
        }

        h2 {
            color: #245b38;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 1100px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #245b38;
            color: white;
        }

        .status {
            background: #d4edda;
            color: #155724;
            padding: 5px 9px;
            border-radius: 5px;
            font-weight: bold;
        }

        .nominal {
            font-weight: bold;
            color: #245b38;
        }

        .kembali {
            display: inline-block;
            margin-top: 10px;
            color: #245b38;
        }
        .filter-form {
    margin-top: 25px;
    padding: 20px;
    background: #f4f6f9;
    border-radius: 8px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

.filter-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

.filter-form input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.filter-form button,
.filter-form .reset {
    display: inline-block;
    padding: 10px 18px;
    border: none;
    border-radius: 5px;
    background: #245b38;
    color: white;
    text-decoration: none;
    cursor: pointer;
}

.filter-form .reset {
    background: #777;
}
    </style>
</head>

<body>

<div class="container">

    <h2>Riwayat Pencairan Insentif</h2>

    <p>Daftar pengurus masjid yang telah dicairkan insentifnya oleh Bagian Kesra.</p>

    <a class="kembali" href="{{ url('/dashboard/bagian-kesra') }}">
        Kembali ke Dashboard
    </a>
    <form method="GET" action="{{ url('/bagian-kesra/riwayat-pencairan') }}" class="filter-form">

    <div>
        <label>Nama Pengurus atau NIK</label>
        <input type="text" name="cari"
            value="{{ request('cari') }}"
            placeholder="Masukkan nama atau NIK">
    </div>

    <div>
        <label>Nama Masjid</label>
        <input type="text" name="masjid"
            value="{{ request('masjid') }}"
            placeholder="Masukkan nama masjid">
    </div>

    <div>
        <label>Nama Desa</label>
        <input type="text" name="desa"
            value="{{ request('desa') }}"
            placeholder="Masukkan nama desa">
    </div>

    <div>
        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai"
            value="{{ request('tanggal_mulai') }}">
    </div>

    <div>
        <label>Tanggal Sampai</label>
        <input type="date" name="tanggal_sampai"
            value="{{ request('tanggal_sampai') }}">
    </div>

    <div style="display:flex; align-items:end; gap:10px;">
        <button type="submit">Cari</button>
        <a href="{{ url('/bagian-kesra/riwayat-pencairan') }}" class="reset">Reset</a>
    </div>

</form>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pengurus</th>
                <th>NIK</th>
                <th>Masjid</th>
                <th>Desa</th>
                <th>Peran</th>
                <th>Nominal Insentif</th>
                <th>Tanggal Pencairan</th>
                <th>Jam Pencairan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pengurus as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->masjid->nama_masjid ?? '-' }}</td>
                    <td>{{ $item->masjid->desa->nama_desa ?? '-' }}</td>
                    <td>{{ $item->peran }}</td>

                    <td class="nominal">
                        Rp {{ number_format((float) $item->nominal_insentif, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $item->tanggal_pencairan
                            ? \Carbon\Carbon::parse($item->tanggal_pencairan)->format('d-m-Y')
                            : 'Tanggal belum tercatat' }}
                    </td>

                    <td>
                        {{ $item->jam_pencairan
                            ? \Carbon\Carbon::parse($item->jam_pencairan)->format('H:i:s')
                            : 'Jam belum tercatat' }}
                    </td>

                    <td>
                        <span class="status">{{ $item->status }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" style="text-align:center">
                        Belum ada riwayat pencairan insentif.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
