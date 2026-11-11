<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengurus Masjid Kecamatan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h2, p {
            text-align: center;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
        }

        th {
            background: #075e43;
            color: white;
            text-align: center;
        }

        td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <h2>DATA PENGURUS MASJID</h2>
    <p>Laporan Admin Kecamatan</p>
    <p>Dicetak pada: {{ now()->format('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Pengurus</th>
                <th>NIK</th>
                <th>Nama Masjid</th>
                <th>Desa</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($pengurus as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->masjid->nama_masjid ?? '-' }}</td>
                    <td>{{ $item->masjid->desa->nama_desa ?? '-' }}</td>
                    <td>{{ $item->peran ?? '-' }}</td>
                    <td>{{ $item->status ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">
                        Belum ada data pengurus.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>