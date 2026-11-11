<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bagian Kesra | SIDADU AGAMA</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f3f7f4;
            color: #263b2e;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #075c3b, #08784d);
            color: white;
            padding: 17px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,.12);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            background: white;
            color: #08784d;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .brand h2 {
            font-size: 20px;
            letter-spacing: 1px;
        }

        .brand p {
            font-size: 11px;
            color: #d9f4e5;
            margin-top: 3px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .role-label {
            color: #f4e4ae;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-logout {
            background: white;
            color: #08784d;
            border: none;
            padding: 10px 17px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .main {
            width: 92%;
            max-width: 1250px;
            margin: 30px auto;
        }

        .welcome {
            background: linear-gradient(120deg, #08784d, #0b9660);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 24px;
            box-shadow: 0 7px 20px rgba(8,120,77,.13);
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #e4fff0;
            font-size: 14px;
            line-height: 1.7;
        }

        .gold-line {
            width: 65px;
            height: 4px;
            background: #e9c46a;
            border-radius: 5px;
            margin-top: 17px;
        }

        .section {
            background: white;
            padding: 24px;
            border-radius: 14px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
            margin-bottom: 24px;
        }

        .section h2 {
            color: #075c3b;
            font-size: 20px;
            margin-bottom: 17px;
        }

        .section h3 {
            color: #176534;
        }

        .info {
            background: #edf7ef;
            border-left: 5px solid #08784d;
            padding: 18px;
            border-radius: 9px;
            margin-bottom: 22px;
            line-height: 1.7;
        }

        .info p {
            margin-top: 7px;
            font-size: 14px;
        }

        .notification {
            background: #fffaf0;
            border: 1px solid #f0dfb2;
            border-left: 5px solid #d6a83e;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        .notification h3 {
            color: #8a5a00;
            margin-bottom: 12px;
            font-size: 17px;
        }

        .notification ul {
            padding-left: 22px;
            margin: 12px 0;
            line-height: 1.9;
            font-size: 14px;
        }

        .badge-count {
            background: #c0392b;
            color: white;
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 12px;
            margin-left: 5px;
        }

        .statistik {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .card {
            padding: 21px;
            border-radius: 12px;
            color: white;
            box-shadow: 0 3px 9px rgba(0,0,0,.08);
            min-width: 0;
        }

        .card h3 {
            color: white;
            font-size: 14px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .card p {
            font-size: 27px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .biru { background: #2874a6; }
        .kuning { background: #c99b13; }
        .hijau { background: #16834a; }
        .merah { background: #bd3b31; }
        .ungu { background: #75418d; }
        .gelap { background: #075c3b; }

        .gold-card {
            border-top: 4px solid #e9c46a;
        }

        .grafik {
            background: white;
            padding: 24px;
            border-radius: 14px;
            border: 1px solid #e5eee7;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
            margin-bottom: 24px;
        }

        .grafik h2 {
            color: #075c3b;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .grafik h3 {
            color: #176534;
            margin: 17px 0 12px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 320px;
            margin-bottom: 25px;
        }

        .progress-track {
            width: 100%;
            height: 24px;
            background: #e5ece7;
            border-radius: 20px;
            overflow: hidden;
            margin: 12px 0;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #08784d, #42b879);
            border-radius: 20px;
            transition: width .4s;
        }

        .ringkasan-status {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin: 22px 0;
        }

        .kartu-status {
            display: block;
            padding: 19px;
            border-radius: 11px;
            text-align: center;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
            text-decoration: none;
            color: inherit;
            transition: .2s;
            border: 1px solid #e5eee7;
        }

        .kartu-status:hover {
            transform: translateY(-4px);
            box-shadow: 0 5px 14px rgba(0,0,0,.12);
        }

        .kartu-status h3 {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .kartu-status p {
            font-size: 29px;
            font-weight: bold;
        }

        .kartu-status.aktif {
            border: 3px solid #08784d;
            background: #f0faf3;
        }

        .kartu-menunggu { border-left: 5px solid #d6a83e; }
        .kartu-disetujui { border-left: 5px solid #2874a6; }
        .kartu-ditolak { border-left: 5px solid #bd3b31; }
        .kartu-dicairkan { border-left: 5px solid #16834a; }

        .menu {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 19px;
            margin: 12px 0;
            background: #08784d;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .menu:hover {
            background: #075c3b;
            transform: translateX(3px);
        }

        .menu-arrow {
            color: #f4e4ae;
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-primary {
            background: #08784d;
            color: white;
        }

        .btn-primary:hover {
            background: #075c3b;
        }

        .btn-secondary {
            background: #758279;
            color: white;
        }

        .filter-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .filter-form input,
        .filter-form select {
            padding: 11px 13px;
            border: 1px solid #d9e5dc;
            border-radius: 8px;
            font-size: 13px;
            background: #fcfefd;
            color: #263b2e;
            outline: none;
        }

        .filter-form input:focus,
        .filter-form select:focus {
            border-color: #08784d;
            box-shadow: 0 0 0 3px rgba(8,120,77,.08);
        }

        .filter-form input {
            flex: 1;
            min-width: 190px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
            font-size: 13px;
        }

        thead {
            background: #075c3b;
            color: white;
        }

        th, td {
            padding: 13px 12px;
            text-align: left;
            border-bottom: 1px solid #e6eee8;
            white-space: nowrap;
        }

        th {
            font-weight: 600;
        }

        tbody tr:hover {
            background: #f5faf6;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .status.menunggu {
            background: #fff3cd;
            color: #856404;
        }

        .status.disetujui {
            background: #cfe2ff;
            color: #084298;
        }

        .status.ditolak {
            background: #f8d7da;
            color: #842029;
        }

        .status.dicairkan {
            background: #d1e7dd;
            color: #0f5132;
        }

        .filter-info {
            background: #edf7ef;
            padding: 14px 17px;
            border-radius: 8px;
            margin: 18px 0;
            font-size: 13px;
            line-height: 1.7;
        }

        .filter-info a {
            color: #08784d;
            font-weight: bold;
        }

        .pagination {
    margin-top: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
    font-size: 13px;
}

.pagination nav {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
}

.pagination svg {
    width: 16px !important;
    height: 16px !important;
    display: inline-block;
}

.pagination a,
.pagination span {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    min-width: 34px;
    min-height: 34px;
    padding: 7px 11px;
    border-radius: 7px;
    text-decoration: none;
    font-size: 13px;
}

.pagination a {
    background: #ffffff;
    color: #08784d;
    border: 1px solid #dce8df;
}

.pagination a:hover {
    background: #08784d;
    color: #ffffff;
}

.pagination span[aria-current="page"] {
    background: #08784d;
    color: #ffffff;
    font-weight: bold;
}

        .footer {
            text-align: center;
            padding: 23px 15px;
            color: #829087;
            font-size: 12px;
            margin-top: 20px;
        }

        @media(max-width: 850px) {
            .ringkasan-status {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 15px 4%;
            }

            .brand h2 {
                font-size: 17px;
            }

            .brand p {
                font-size: 10px;
            }

            .nav-right {
                width: 100%;
                justify-content: space-between;
            }

            .main {
                width: 94%;
                margin: 20px auto;
            }

            .welcome {
                padding: 23px 20px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .section, .grafik {
                padding: 17px;
            }

            .statistik {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .card {
                padding: 15px;
            }

            .card h3 {
                font-size: 12px;
            }

            .card p {
                font-size: 22px;
            }

            .ringkasan-status {
                gap: 10px;
            }

            .kartu-status {
                padding: 14px 8px;
            }

            .kartu-status h3 {
                font-size: 12px;
            }

            .kartu-status p {
                font-size: 24px;
            }

            .chart-container {
                height: 260px;
            }

            .filter-form {
                flex-direction: column;
            }

            .filter-form input,
            .filter-form select,
            .filter-form button,
            .filter-form a {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="brand">
        <div class="brand-icon">🕌</div>
        <div>
            <h2>SIDADU AGAMA</h2>
            <p>Sistem Informasi Pendataan Terpadu Keagamaan</p>
        </div>
    </div>

    <div class="nav-right">
        <span class="role-label">BAGIAN KESRA</span>

        <form action="{{ url('/logout') }}" method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin keluar dari sistem?')">
            @csrf
            <button type="submit" class="btn-logout">↪ Logout</button>
        </form>
    </div>
</header>

<main class="main">

    <section class="welcome">
        <h1>Dashboard Bagian Kesra</h1>
        <p>
            Selamat datang di halaman pengelolaan data pengurus masjid
            dan penyaluran dana insentif Kabupaten.
        </p>
        <div class="gold-line"></div>
    </section>

    <section class="section">
        <a href="{{ route('kesra.akun-kecamatan') }}" class="btn btn-primary">
            👥 Kelola Akun Admin Kecamatan
        </a>
    </section>

    {{-- NOTIFIKASI PENGURUS DISETUJUI --}}
    <section class="notification">
        <h3>
            🔔 Notifikasi Pengurus Disetujui

            @if($jumlahNotifikasi > 0)
                <span class="badge-count">{{ $jumlahNotifikasi }}</span>
            @endif
        </h3>

        @if($jumlahNotifikasi > 0)

            <p>
                Ada {{ $jumlahNotifikasi }} data pengurus yang telah disetujui
                oleh Admin Kecamatan dan siap diproses pencairannya.
            </p>

            <ul>
                @foreach($notifikasiPengurus as $pengurus)
                    <li>
                        <strong>{{ $pengurus->nama_lengkap }}</strong>

                        @if($pengurus->masjid)
                            — {{ $pengurus->masjid->nama_masjid ?? 'Nama masjid tidak tersedia' }}
                        @endif

                        @if($pengurus->masjid && $pengurus->masjid->desa)
                            — Desa {{ $pengurus->masjid->desa->nama_desa }}
                        @endif
                    </li>
                @endforeach
            </ul>

            <a href="{{ url('/bagian-kesra/pengurus-disetujui') }}"
               class="btn btn-primary">
                Lihat Data Siap Dicairkan →
            </a>

        @else

            <p>Belum ada data pengurus yang disetujui Admin Kecamatan.</p>

        @endif

        {{-- PENCARIAN DAN FILTER --}}
        <form action="{{ url('/dashboard/bagian-kesra') }}"
              method="GET"
              class="filter-form">

            <input type="text"
                   name="cari"
                   placeholder="Cari nama atau NIK..."
                   value="{{ request('cari') }}">

            <select name="status">
                <option value="">Semua Status</option>

                <option value="Menunggu"
                    {{ request('status') == 'Menunggu' ? 'selected' : '' }}>
                    Menunggu
                </option>

                <option value="Disetujui"
                    {{ request('status') == 'Disetujui' ? 'selected' : '' }}>
                    Disetujui
                </option>

                <option value="Ditolak"
                    {{ request('status') == 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>

                <option value="Dicairkan"
                    {{ request('status') == 'Dicairkan' ? 'selected' : '' }}>
                    Dicairkan
                </option>
            </select>

            <button type="submit" class="btn btn-primary">
                Cari
            </button>

            <a href="{{ url('/dashboard/bagian-kesra') }}"
               class="btn btn-secondary">
                Reset
            </a>

        </form>

        {{-- TABEL DATA PENGURUS --}}
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengurus</th>
                        <th>NIK</th>
                        <th>Masjid</th>
                        <th>Desa</th>
                        <th>Peran</th>
                        <th>Nominal</th>
                        <th>Tanggal Pencairan</th>
                        <th>Jam Pencairan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($daftarPengurus as $index => $item)
                        <tr>
                            <td>
                                {{ $daftarPengurus->firstItem() + $index }}
                            </td>

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

                            <td>{{ $item->jam_pencairan ?? '-' }}</td>

                            <td>
                                @if($item->status == 'Menunggu')
                                    <span class="status menunggu">Menunggu</span>
                                @elseif($item->status == 'Disetujui')
                                    <span class="status disetujui">Disetujui</span>
                                @elseif($item->status == 'Ditolak')
                                    <span class="status ditolak">Ditolak</span>
                                @elseif($item->status == 'Dicairkan')
                                    <span class="status dicairkan">Dicairkan</span>
                                @else
                                    <span>{{ $item->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" style="text-align:center; padding:25px;">
                                Data pengurus tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $daftarPengurus->appends(request()->query())->links() }}
        </div>
    </section>

    
    {{-- STATISTIK PENGURUS --}}
    <section class="section">
        <h2>Statistik Pengurus Masjid</h2>

        <div class="statistik">

            <div class="card biru gold-card">
                <h3>Total Seluruh Pengurus</h3>
                <p>{{ $totalPengurus }}</p>
            </div>

            <div class="card kuning gold-card">
                <h3>Menunggu Verifikasi</h3>
                <p>{{ $totalMenunggu }}</p>
            </div>

            <div class="card hijau gold-card">
                <h3>Disetujui</h3>
                <p>{{ $totalDisetujui }}</p>
            </div>

            <div class="card merah gold-card">
                <h3>Ditolak</h3>
                <p>{{ $totalDitolak }}</p>
            </div>

            <div class="card ungu gold-card">
                <h3>Sudah Dicairkan</h3>
                <p>{{ $totalDicairkan }}</p>
            </div>

            <div class="card gelap gold-card">
                <h3>Total Dana Dicairkan</h3>
                <p style="font-size:21px;">
                    Rp {{ number_format((float) $totalDanaDicairkan, 0, ',', '.') }}
                </p>
            </div>

        </div>
    </section>

    {{-- PROGRES PENYALURAN DANA --}}
    <section class="grafik">
        <h2>Progres Penyaluran Dana Insentif</h2>

        <div class="statistik">

            <div class="card biru gold-card">
                <h3>Total Alokasi Insentif</h3>
                <p style="font-size:21px;">
                    Rp {{ number_format((float) $totalAlokasiInsentif, 0, ',', '.') }}
                </p>
            </div>

            <div class="card hijau gold-card">
                <h3>Sudah Dicairkan</h3>
                <p style="font-size:21px;">
                    Rp {{ number_format((float) $totalDanaDicairkan, 0, ',', '.') }}
                </p>
            </div>

            <div class="card merah gold-card">
                <h3>Belum Dicairkan</h3>
                <p style="font-size:21px;">
                    Rp {{ number_format((float) $sisaDanaInsentif, 0, ',', '.') }}
                </p>
            </div>

        </div>

        <h3>Persentase Penyaluran Dana: {{ $persentaseDanaDicairkan }}%</h3>

        <div class="progress-track">
            <div class="progress-fill"
                 style="width: {{ min(100, max(0, $persentaseDanaDicairkan)) }}%;">
            </div>
        </div>
    </section>

    {{-- PROGRES PENCAIRAN --}}
    <section class="grafik">
        <h2>Progres Pencairan Insentif</h2>

        <h3>{{ $persentasePencairan }}%</h3>

        <div class="progress-track">
            <div class="progress-fill"
                 style="width: {{ min(100, max(0, $persentasePencairan)) }}%;">
            </div>
        </div>

        <p style="font-size:14px; margin-top:12px; line-height:1.7;">
            {{ $totalDicairkan }} dari {{ $totalPengurus }}
            pengurus sudah menerima insentif.
        </p>
    </section>

    {{-- GRAFIK --}}
    <section class="grafik">
        <h2>Grafik Pencairan Insentif Tahun {{ now()->year }}</h2>

        <div class="chart-container">
            <canvas id="grafikPencairan"></canvas>
        </div>

        <h3>Total Nominal Pencairan Per Bulan</h3>

        <div class="chart-container">
            <canvas id="grafikNominal"></canvas>
        </div>
    </section>

    {{-- INFORMASI TINDAK LANJUT --}}
    <section class="info">
        <h3>Informasi Tindak Lanjut Pencairan</h3>

        @if($totalBelumDicairkan > 0)

            <p>
                Masih ada <strong>{{ $totalBelumDicairkan }} pengurus</strong>
                yang sudah disetujui tetapi belum dicairkan insentifnya.
            </p>

            <a href="{{ url('/bagian-kesra/pengurus-disetujui') }}"
               class="menu">
                <span>Proses Pencairan Sekarang</span>
                <span class="menu-arrow">→</span>
            </a>

        @else

            <p>
                Semua pengurus yang disetujui sudah diproses pencairannya.
            </p>

        @endif
    </section>

    {{-- RINGKASAN STATUS --}}
    <section class="section">
        <h2>Ringkasan Status Pengurus</h2>

        <div class="ringkasan-status">

            <a href="{{ url('/dashboard/bagian-kesra') }}?status=Menunggu"
               class="kartu-status kartu-menunggu {{ request('status') == 'Menunggu' ? 'aktif' : '' }}">
                <h3>Menunggu</h3>
                <p>{{ $totalMenunggu }}</p>
            </a>

            <a href="{{ url('/dashboard/bagian-kesra') }}?status=Disetujui"
               class="kartu-status kartu-disetujui {{ request('status') == 'Disetujui' ? 'aktif' : '' }}">
                <h3>Disetujui</h3>
                <p>{{ $totalDisetujui }}</p>
            </a>

            <a href="{{ url('/dashboard/bagian-kesra') }}?status=Ditolak"
               class="kartu-status kartu-ditolak {{ request('status') == 'Ditolak' ? 'aktif' : '' }}">
                <h3>Ditolak</h3>
                <p>{{ $totalDitolak }}</p>
            </a>

            <a href="{{ url('/dashboard/bagian-kesra') }}?status=Dicairkan"
               class="kartu-status kartu-dicairkan {{ request('status') == 'Dicairkan' ? 'aktif' : '' }}">
                <h3>Dicairkan</h3>
                <p>{{ $totalDicairkan }}</p>
            </a>

        </div>

        @if(request('status'))

            <div class="filter-info">
                <strong>Filter Aktif:</strong>
                Menampilkan pengurus dengan status
                <strong>{{ request('status') }}</strong>.

                <a href="{{ url('/dashboard/bagian-kesra') }}"
                   style="margin-left:10px;">
                    Hapus Filter
                </a>
            </div>

        @else

            <div class="filter-info">
                <strong>Semua Data Pengurus</strong>
                <p>Menampilkan seluruh pengurus masjid dari semua status.</p>
            </div>

        @endif

        
    </section>

    {{-- MENU PENGELOLAAN --}}
    <section class="section">
        <h2>Menu Pengelolaan</h2>

        
<a href="{{ url('/bagian-kesra/pengurus-disetujui') }}" class="menu">
    <span>Data Pengurus Disetujui / Pemeriksaan Data Pengurus</span>
    <span class="menu-arrow">→</span>
</a>

<a href="{{ url('/bagian-kesra/tarif-insentif') }}" class="menu">
    <span>Penetapan Nominal Insentif</span>
    <span class="menu-arrow">→</span>
</a>

<a href="{{ url('/bagian-kesra/pengurus-disetujui') }}" class="menu">
    <span>Proses Pencairan Insentif</span>
    <span class="menu-arrow">→</span>
</a>

<a href="{{ url('/bagian-kesra/riwayat-pencairan') }}" class="menu">
    <span>Riwayat Pencairan Insentif</span>
    <span class="menu-arrow">→</span>
</a>

<a href="{{ url('/bagian-kesra/laporan-rekapitulasi') }}" class="menu">
    <span>Laporan Rekapitulasi Insentif</span>
    <span class="menu-arrow">→</span>
</a>

    </section>

</main>

<footer class="footer">
    © {{ date('Y') }} SIDADU AGAMA | BangJP
</footer>

<script>
    const labelGrafik = @json($labelGrafik);
    const jumlahGrafik = @json($jumlahGrafik);
    const nominalGrafik = @json($nominalGrafik);

    // Grafik jumlah pengurus yang dicairkan
    new Chart(document.getElementById('grafikPencairan'), {
        type: 'bar',
        data: {
            labels: labelGrafik,
            datasets: [{
                label: 'Jumlah Pengurus Dicairkan',
                data: jumlahGrafik,
                backgroundColor: '#239b56',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Grafik total nominal pencairan
    new Chart(document.getElementById('grafikNominal'), {
        type: 'bar',
        data: {
            labels: labelGrafik,
            datasets: [{
                label: 'Total Nominal Pencairan',
                data: nominalGrafik,
                backgroundColor: '#d6a83e',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>