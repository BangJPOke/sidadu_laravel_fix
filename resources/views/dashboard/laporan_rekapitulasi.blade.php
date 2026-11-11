
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Rekapitulasi Insentif - SIDADU</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 25px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2, h3 {
            color: #245b38;
        }

        .ringkasan {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .card {
            padding: 20px;
            background: #edf5ef;
            border-left: 5px solid #245b38;
            border-radius: 8px;
        }

        .card strong {
            display: block;
            font-size: 25px;
            color: #245b38;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #245b38;
            color: white;
        }

        .kembali {
            display: inline-block;
            margin: 10px 0 20px;
            color: #245b38;
        }

        .total {
            font-weight: bold;
            color: #245b38;
        }

        .cetak, .filter button {
            background: #245b38;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter {
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            gap: 12px;
            background: #f4f6f9;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0 25px;
        }

        .filter div {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter select {
            padding: 9px;
            min-width: 140px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .container {
                box-shadow: none;
            }

            .kembali, .cetak, .filter {
                display: none;
            }
        }
    </style>
</head>

<body>

<a href="{{ url('/dashboard/bagian-kesra') }}"
   style="
       display: inline-block;
       background: #198754;
       color: white;
       padding: 10px 18px;
       border-radius: 6px;
       text-decoration: none;
       font-weight: bold;
       margin-bottom: 20px;
   ">
    ← Kembali ke Dashboard
</a>
<a href="{{ route('bagian-kesra.laporan.pdf', [
    'bulan' => $bulan,
    'tahun' => $tahun,
    'kecamatan_id' => $kecamatanId,
    'desa_id' => $desaId
]) }}"
   class="cetak"
   style="display:inline-block; text-decoration:none;">
    Download PDF
</a>

<a href="{{ route('bagian-kesra.laporan.xlsx', [
    'bulan' => $bulan,
    'tahun' => $tahun,
    'kecamatan_id' => $kecamatanId,
    'desa_id' => $desaId
]) }}"
   class="cetak"
   style="display:inline-block; text-decoration:none;">
    Download Excel (.xlsx)
</a>

    <h3>Filter Periode Laporan</h3>

    
<form class="filter" method="GET"
      action="{{ url('/bagian-kesra/laporan-rekapitulasi') }}">

    <div>
        <label for="bulan">Pilih Bulan</label>
        <select name="bulan" id="bulan">
            @foreach(range(1, 12) as $angkaBulan)
                <option value="{{ $angkaBulan }}"
                    {{ (int) $bulan === $angkaBulan ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::create()->month($angkaBulan)->translatedFormat('F') }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="tahun">Pilih Tahun</label>
        <select name="tahun" id="tahun">
            @foreach(range(now()->year - 5, now()->year + 1) as $angkaTahun)
                <option value="{{ $angkaTahun }}"
                    {{ (int) $tahun === $angkaTahun ? 'selected' : '' }}>
                    {{ $angkaTahun }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="kecamatan_id">Pilih Kecamatan</label>
        <select name="kecamatan_id" id="kecamatan_id">
            <option value="">-- Semua Kecamatan --</option>
            @foreach($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}"
                    {{ (string) $kecamatanId === (string) $kecamatan->id ? 'selected' : '' }}>
                    {{ $kecamatan->nama_kecamatan }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="desa_id">Pilih Desa</label>
        <select name="desa_id" id="desa_id">
            <option value="">-- Semua Desa --</option>
            @foreach($desas as $desa)
                <option value="{{ $desa->id }}"
                    {{ (string) $desaId === (string) $desa->id ? 'selected' : '' }}>
                    {{ $desa->nama_desa }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Tampilkan Laporan</button>
</form>


    <h3>Ringkasan Data Pengurus</h3>

    <p>
        Periode:
        <strong>
            {{ \Carbon\Carbon::create()->month((int) $bulan)->translatedFormat('F') }}
            {{ $tahun }}
        </strong>
    </p>

    <div class="ringkasan">

        <div class="card">
            Total Pengurus
            <strong>{{ $totalPengurus }}</strong>
        </div>

        <div class="card">
            Sudah Disetujui
            <strong>{{ $totalDisetujui }}</strong>
        </div>

        <div class="card">
            Sudah Dicairkan
            <strong>{{ $totalDicairkan }}</strong>
        </div>

        <div class="card">
            Menunggu Verifikasi
            <strong>{{ $totalMenunggu }}</strong>
        </div>

        <div class="card">
            Ditolak
            <strong>{{ $totalDitolak }}</strong>
        </div>

    </div>

    
<h3>Rekapitulasi Pencairan Bulanan</h3>

<div class="ringkasan">
    <div class="card">
        Jumlah Pengurus Dicairkan Bulan Ini
        <strong>{{ $totalDicairkan }}</strong>
    </div>

    <div class="card">
        Total Dana Bulanan
        <strong>
            Rp {{ number_format((float) $totalNominalDicairkan, 0, ',', '.') }}
        </strong>
    </div>
</div>

<h3>Rekapitulasi Pencairan Tahunan</h3>

<div class="ringkasan">
    <div class="card">
        Jumlah Pengurus Dicairkan Tahun Ini
        <strong>{{ $totalDicairkanTahunan }}</strong>
    </div>

    <div class="card">
        Total Dana Tahunan
        <strong>
            Rp {{ number_format((float) $totalNominalTahunan, 0, ',', '.') }}
        </strong>
    </div>
</div>

<h3>Rekapitulasi Seluruh Pencairan</h3>

<div class="ringkasan">
    <div class="card">
        Total Seluruh Pengurus Dicairkan
        <strong>{{ $totalSeluruhPencairan }}</strong>
    </div>

    <div class="card">
        Total Seluruh Dana Dicairkan
        <strong>
            Rp {{ number_format((float) $totalSeluruhDana, 0, ',', '.') }}
        </strong>
    </div>
</div>

<h3>Rekapitulasi Pencairan Berdasarkan Kecamatan</h3>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Kecamatan</th>
            <th>Jumlah Pengurus Dicairkan</th>
            <th>Total Dana Dicairkan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rekapKecamatan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kecamatan }}</td>
                <td>{{ $item->jumlah_pengurus }}</td>
                <td class="total">
                    Rp {{ number_format((float) $item->total_dicairkan, 0, ',', '.') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center">
                    Belum ada pencairan pada periode ini.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<h3>Rekapitulasi Pencairan Berdasarkan Desa</h3>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Kecamatan</th>
            <th>Nama Desa</th>
            <th>Jumlah Pengurus Dicairkan</th>
            <th>Total Dana Dicairkan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rekapDesa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kecamatan }}</td>
                <td>{{ $item->nama_desa }}</td>
                <td>{{ $item->jumlah_pengurus }}</td>
                <td class="total">
                    Rp {{ number_format((float) $item->total_dicairkan, 0, ',', '.') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center">
                    Belum ada pencairan pada periode ini.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<h3>Rekapitulasi Berdasarkan Peran</h3>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Peran Pengurus</th>
                <th>Jumlah Pengurus Dicairkan</th>
                <th>Total Dana Dicairkan</th>
            </tr>
        </thead>

        <tbody>
            @forelse($rekapPeran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->peran }}</td>
                    <td>{{ $item->jumlah_pengurus }}</td>
                    <td class="total">
                        Rp {{ number_format((float) $item->total_dicairkan, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center">
                        Belum ada pencairan pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const kecamatanSelect = document.getElementById('kecamatan_id');
    const desaSelect = document.getElementById('desa_id');

    const semuaDesa = @json($desas);
    const desaTerpilih = @json($desaId);

    function tampilkanDesa() {
        const kecamatanId = kecamatanSelect.value;

        desaSelect.innerHTML = '<option value="">-- Semua Desa --</option>';

        semuaDesa.forEach(function (desa) {
            if (
                kecamatanId === '' ||
                String(desa.kecamatan_id) === String(kecamatanId)
            ) {
                const option = document.createElement('option');
                option.value = desa.id;
                option.textContent = desa.nama_desa;

                if (String(desa.id) === String(desaTerpilih)) {
                    option.selected = true;
                }

                desaSelect.appendChild(option);
            }
        });
    }

    kecamatanSelect.addEventListener('change', function () {
        tampilkanDesa();
    });

    // Tampilkan desa sesuai kecamatan saat halaman pertama dibuka
    tampilkanDesa();
});
</script>


</body>
</html>
