
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen Pengurus - SIDADU</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: #f3f6f4;
            color: #26352c;
        }

        .container {
            max-width: 1050px;
            margin: auto;
        }

        .header {
            background: #176b43;
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 22px;
        }

        .header h2 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            opacity: .9;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        .card h3 {
            color: #176b43;
            margin-top: 0;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5eee8;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .data-item {
            padding: 10px;
            background: #f7faf8;
            border-radius: 8px;
        }

        .data-item small {
            display: block;
            color: #68776d;
            margin-bottom: 6px;
        }

        .data-item strong {
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 7px 14px;
            background: #dff4e6;
            color: #176b43;
            border-radius: 20px;
            font-weight: bold;
        }

        .documents {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .document {
            border: 1px solid #e0e8e2;
            padding: 18px;
            border-radius: 10px;
        }

        .document h4 {
            margin-top: 0;
            color: #176b43;
        }

        .document a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #176b43;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .document a:hover {
            background: #105333;
        }

        .not-found {
            color: #a33b32;
            background: #fff0ee;
            padding: 10px;
            border-radius: 6px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .btn-back {
            display: inline-block;
            background: #176b43;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
        }

        @media(max-width: 650px) {
            body {
                padding: 12px;
            }

            .data-grid,
            .documents {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <h2>Detail Pengurus Masjid</h2>
        <p>Pemeriksaan identitas dan kelengkapan dokumen Bagian Kesra</p>
    </div>

    <div class="card">
        <h3>Identitas Pengurus</h3>

        <div class="data-grid">
            <div class="data-item">
                <small>Nama Lengkap</small>
                <strong>{{ $pengurus->nama_lengkap }}</strong>
            </div>

            <div class="data-item">
                <small>NIK</small>
                <strong>{{ $pengurus->nik }}</strong>
            </div>

            <div class="data-item">
                <small>Tanggal Lahir</small>
                <strong>{{ $pengurus->tgl_lahir }}</strong>
            </div>

            <div class="data-item">
                <small>Alamat</small>
                <strong>{{ $pengurus->alamat }}</strong>
            </div>

            <div class="data-item">
                <small>Pendidikan</small>
                <strong>{{ $pengurus->pendidikan }}</strong>
            </div>

            <div class="data-item">
                <small>Jabatan</small>
                <strong>{{ $pengurus->peran }}</strong>
            </div>

            <div class="data-item">
                <small>Nomor Rekening BJB</small>
                <strong>{{ $pengurus->norek_bjb }}</strong>
            </div>

            <div class="data-item">
                <small>Nama Masjid</small>
                <strong>{{ $pengurus->masjid->nama_masjid ?? '-' }}</strong>
            </div>

            <div class="data-item">
                <small>Desa</small>
                <strong>{{ $pengurus->masjid->desa->nama_desa ?? '-' }}</strong>
            </div>

            <div class="data-item">
                <small>Status Pengurus</small>
                <span class="status">{{ $pengurus->status }}</span>
            </div>

            <div class="data-item">
                <small>Nominal Insentif</small>
                <strong>{{ $pengurus->nominal_insentif ?? 'Belum ditetapkan' }}</strong>
            </div>
        </div>
    </div>

    <div class="card">
        <h3>Kelengkapan Dokumen Pengurus</h3>

        <div class="documents">

            @php
                $dokumen = [
                    'file_ktp' => 'Kartu Tanda Penduduk (KTP)',
                    'file_kk' => 'Kartu Keluarga (KK)',
                    'file_sk' => 'Surat Keputusan (SK) Pengangkatan',
                    'file_bank' => 'Buku Rekening Bank BJB',
                ];
            @endphp

            @foreach($dokumen as $kolom => $judul)
                <div class="document">
                    <h4>{{ $judul }}</h4>

                    @if($pengurus->$kolom)
                        <p>Dokumen telah diunggah.</p>

                        <a href="{{ asset('storage/' . $pengurus->$kolom) }}"
                           target="_blank"
                           rel="noopener">
                            Lihat Dokumen
                        </a>
                    @else
                        <div class="not-found">
                            Dokumen belum diunggah.
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
    </div>

    <div class="actions">
        <a href="{{ url('/bagian-kesra/pengurus-disetujui') }}"
           class="btn-back">
            ← Kembali ke Data Pengurus Disetujui
        </a>
    </div>

</div>
</body>
</html>
