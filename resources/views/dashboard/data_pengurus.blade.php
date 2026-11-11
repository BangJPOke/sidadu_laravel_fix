
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pengurus | SIDADU AGAMA</title>

    
</head>

<style>
/* =================================================_ */
/* THEME: HIJAU & EMAS (EMERALD & GOLD)                */
/* =================================================_ */

:root {
    --primary-green: #064e3b;      /* Hijau Tua / Emerald Gelap */
    --accent-green: #047857;       /* Hijau Sedang */
    --light-green: #ecfdf5;        /* Hijau Sangat Muda (Background Zebra) */
    --gold: #d97706;               /* Emas / Kuning Kecoklatan yang Elegan */
    --gold-light: #fef3c7;         /* Emas Muda */
    --gold-hover: #b45309;         /* Emas Gelap untuk Hover */
    --text-main: #1f2937;          /* Teks Utama */
    --text-muted: #6b7280;         /* Teks Sekunder */
    --border-color: #e5e7eb;       /* Warna Garis / Border */
    --white: #ffffff;
}

/* Base Body & Container Adjustments */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f9fafb;
    color: var(--text-main);
    margin: 0;
    padding: 0;
}

/* Navbar dengan Nuansa Hijau & Aksen Emas */
.navbar {
    background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
    color: var(--white);
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 3px solid var(--gold);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.brand {
    font-size: 1.25rem;
    font-weight: bold;
    letter-spacing: 0.5px;
}

.brand span {
    display: block;
    font-size: 0.75rem;
    color: var(--gold-light);
    font-weight: normal;
}

.role-label {
    background-color: var(--gold);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: bold;
    display: inline-block;
    margin-right: 1rem;
}

/* Container Utama */
.container {
    max-width: 1400px;
    margin: 2rem auto;
    padding: 0 1.5rem;
}

/* Welcome & Summary Card */
.welcome h2 {
    color: var(--primary-green);
    margin-bottom: 0.25rem;
}

.summary-card {
    background: var(--white);
    border-left: 5px solid var(--gold);
    padding: 1.25rem;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    margin: 1.5rem 0;
}

.summary-number {
    font-size: 2rem;
    font-weight: bold;
    color: var(--primary-green);
}

.section-title {
    color: var(--primary-green);
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 0.5rem;
    margin-top: 2rem;
}

/* =================================================_ */
/* STYLING TABEL ELEGAN                                */
/* =================================================_ */

.table-responsive {
    width: 100%;
    overflow-x: auto;
    background: var(--white);
    border-radius: 10px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    margin-top: 1rem;
    border: 1px solid var(--border-color);
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.9rem;
}

.data-table th {
    background-color: var(--primary-green);
    color: var(--white);
    padding: 12px 16px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    border-bottom: 3px solid var(--gold);
}

.data-table td {
    padding: 12px 16px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
}

.data-table tbody tr:hover {
    background-color: var(--light-green);
}

/* Styling Elemen di Dalam Tabel */
.text-muted {
    color: var(--text-muted);
    font-size: 0.8rem;
}

.badge-role {
    background-color: var(--gold-light);
    color: #92400e;
    padding: 2px 8px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 0.8rem;
}

/* List Dokumen di Tabel */
.document-list-table {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.8rem;
}

.document-list-table li {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 2px;
}

.document-list-table a {
    color: var(--accent-green);
    text-decoration: none;
    font-weight: 600;
}

.document-list-table a:hover {
    text-decoration: underline;
    color: var(--gold-hover);
}

.not-uploaded {
    color: #dc2626;
    font-size: 0.75rem;
}

/* Status Badge */
.status {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: bold;
    display: inline-block;
}

.status.Menunggu {
    background-color: var(--gold-light);
    color: #b45309;
}

.status.Disetujui {
    background-color: #d1fae5;
    color: #065f46;
}

.status.Ditolak {
    background-color: #fee2e2;
    color: #991b1b;
}

.rejection-note-small {
    font-size: 0.75rem;
    color: #b91c1c;
    margin-top: 4px;
    background: #fef2f2;
    padding: 4px;
    border-radius: 4px;
}

/* Form Verifikasi Inline dalam Tabel */
.verification-form-inline {
    display: flex;
    flex-direction: column;
    gap: 6px;
    min-width: 180px;
}

.input-catatan {
    width: 100%;
    padding: 6px 8px;
    font-size: 0.8rem;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    resize: vertical;
    max-height: 60px;
}

.input-catatan:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 0 2px rgba(217, 119, 6, 0.2);
}

.button-group-inline {
    display: flex;
    gap: 4px;
}

/* Tombol Aksi */
.btn {
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.75rem;
    font-weight: bold;
    transition: background 0.2s;
}

.btn-approve {
    background-color: var(--accent-green);
    color: var(--white);
    flex: 1;
}

.btn-approve:hover {
    background-color: var(--primary-green);
}

.btn-reject {
    background-color: #dc2626;
    color: var(--white);
    flex: 1;
}

.btn-reject:hover {
    background-color: #b91c1c;
}

.btn-logout {
    background-color: transparent;
    border: 1px solid var(--gold-light);
    color: var(--white);
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
}

.btn-logout:hover {
    background-color: var(--gold);
    border-color: var(--gold);
}

.btn-back {
    display: inline-block;
    background-color: var(--primary-green);
    color: var(--white);
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 1.5rem;
}

.btn-back:hover {
    background-color: var(--accent-green);
}

/* Alert Notifications */
.alert {
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.alert-success {
    background-color: #d1fae5;
    color: #065f46;
    border-left: 4px solid #10b981;
}

.alert-error {
    background-color: #fee2e2;
    color: #991b1b;
    border-left: 4px solid #ef4444;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 3rem;
    background: var(--white);
    border-radius: 8px;
    border: 1px solid var(--border-color);
}

.empty-state .symbol {
    font-size: 3rem;
    margin-bottom: 1rem;
}

</style>

<body>

    <header class="navbar">
        <div class="brand">
            SIDADU AGAMA
            <span>SISTEM INFORMASI PENDATAAN TERPADU KEAGAMAAN</span>
        </div>

        <div class="nav-menu">
            <div class="role-label">ADMIN KECAMATAN</div>

            <form action="{{ url('/logout') }}" method="POST"
                  onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
                @csrf
                <button type="submit" class="btn-logout">↪ Logout</button>
            </form>
        </div>
    </header>

    <main class="container">

        <div class="welcome">
            <h2>Verifikasi Data Pengurus Masjid</h2>
            <p>
                Admin Kecamatan: {{ $user->nama_lengkap }}.
                Periksa identitas dan dokumen pengurus sebelum mengambil keputusan.
            </p>
        </div>

        <div class="summary-card">
    <div>
        <h3>Daftar Pengajuan Pengurus</h3>
        <p>Jumlah seluruh data pengurus yang ditampilkan.</p>
    </div>

    <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
        <div class="summary-number">{{ $pengurus->count() }}</div>

        <a href="{{ route('admin-kecamatan.pengurus.pdf') }}"
           style="
               display: inline-block;
               background: #087653;
               color: white;
               padding: 10px 16px;
               border-radius: 8px;
               text-decoration: none;
               font-size: 13px;
               font-weight: bold;
           ">
            ↓ Download PDF
        </a>
    </div>
</div>

        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Periksa kembali data berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3 class="section-title">Daftar Data Pengurus</h3>

        @if ($pengurus->isEmpty())

            <div class="empty-state">
                <div class="symbol">📋</div>
                <h3>Belum Ada Data Pengurus</h3>
                <p>Belum ada data pengurus masjid yang didaftarkan pada wilayah Anda.</p>
            </div>

        @else

            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama & NIK</th>
                            <th>Masjid & Desa</th>
                            <th>TTL & Pendidikan</th>
                            <th>Jabatan & Rekening BJB</th>
                            <th>Dokumen Pendukung</th>
                            <th>Status & Catatan</th>
                            <th>Aksi / Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurus as $index => $item)
                            <tr>
                                <!-- Nomor -->
                                <td>{{ $index + 1 }}</td>

                                <!-- Nama & NIK -->
                                <td>
                                    <strong>{{ $item->nama_lengkap }}</strong><br>
                                    <small class="text-muted">NIK: {{ $item->nik }}</small><br>
                                    <small class="text-muted">{{ $item->alamat }}</small>
                                </td>

                                <!-- Masjid & Desa -->
                                <td>
                                    <strong>{{ $item->masjid->nama_masjid ?? '-' }}</strong><br>
                                    <small class="text-muted">Desa: {{ $item->masjid->desa->nama_desa ?? '-' }}</small>
                                </td>

                                <!-- TTL & Pendidikan -->
                                <td>
                                    {{ $item->tgl_lahir }}<br>
                                    <small class="text-muted">Pendidikan: {{ $item->pendidikan }}</small>
                                </td>

                                <!-- Jabatan & Rekening -->
                                <td>
                                    <span class="badge-role">{{ $item->peran }}</span><br>
                                    <small class="text-muted">BJB: {{ $item->norek_bjb }}</small>
                                </td>

                                <!-- Dokumen Pendukung -->
                                <td>
                                    <ul class="document-list-table">
                                        @foreach ([
                                            'file_ktp' => 'KTP',
                                            'file_kk' => 'KK',
                                            'file_sk' => 'SK',
                                            'file_bank' => 'Rekening'
                                        ] as $field => $docLabel)
                                            <li>
                                                <span>{{ $docLabel }}:</span>
                                                @if ($item->$field)
                                                    <a href="{{ asset('storage/' . $item->$field) }}" target="_blank" rel="noopener noreferrer">Lihat ↗</a>
                                                @else
                                                    <span class="not-uploaded">Kosong</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>

                                <!-- Status & Catatan Penolakan -->
                                <td>
                                    <span class="status {{ $item->status }}">{{ $item->status }}</span>
                                    @if ($item->catatan_penolakan)
                                        <div class="rejection-note-small">
                                            <strong>Catatan:</strong> {{ $item->catatan_penolakan }}
                                        </div>
                                    @endif
                                </td>

                                <!-- Aksi / Verifikasi -->
                                <td>
                                    @if ($item->status === 'Menunggu')
                                        <form action="{{ url('/admin-kecamatan/pengurus/' . $item->id . '/verifikasi') }}" method="POST" class="verification-form-inline">
                                            @csrf
                                            <textarea 
                                                name="catatan_penolakan" 
                                                placeholder="Alasan penolakan (opsional)" 
                                                class="input-catatan"
                                            ></textarea>
                                            <div class="button-group-inline">
                                                <button type="submit" name="status" value="Disetujui" class="btn btn-approve" onclick="return confirm('Setujui data pengurus ini?')">
                                                    ✓ Setujui
                                                </button>
                                                <button type="submit" name="status" value="Ditolak" class="btn btn-reject" onclick="return confirm('Tolak data pengurus ini?')">
                                                    ✕ Tolak
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <span class="text-muted">Selesai Diverifikasi</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

        <div class="navigation">
            <a href="{{ url('/dashboard/admin-kecamatan') }}"
               class="btn btn-back">
                ← Kembali ke Dashboard
            </a>
        </div>

    </main>

    @include('layouts.footer')

</body>
</html>
