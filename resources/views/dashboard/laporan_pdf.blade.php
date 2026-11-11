<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Laporan Insentif SIDADU</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h2, p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #333;
            padding: 7px;
            text-align: left;
        }

        th {
            background: #245b38;
            color: white;
        }

        .total {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2>LAPORAN REKAPITULASI INSENTIF PENGURUS MASJID</h2>

    <p>Sistem Informasi Dana Masjid (SIDADU)</p>

    <p>
        Periode:
        {{ \Carbon\Carbon::create()->month((int) $bulan)->translatedFormat('F') }}
        {{ $tahun }}
    </p>

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
                    <td>
                        Rp {{ number_format((float) $item->nominal_insentif, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $item->tanggal_pencairan
                            ? \Carbon\Carbon::parse($item->tanggal_pencairan)->format('d-m-Y')
                            : '-' }}
                    </td>
                    <td>
    {{ $item->tanggal_pencairan
        ? \Carbon\Carbon::parse($item->tanggal_pencairan)->format('d-m-Y')
        : '-' }}
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center">
                        Belum ada pencairan pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="total">
        Jumlah Pengurus Dicairkan: {{ $totalPengurus }}
    </p>

    <p class="total">
        Total Dana Dicairkan:
        Rp {{ number_format((float) $totalDana, 0, ',', '.') }}
    </p>

</body>
</html>