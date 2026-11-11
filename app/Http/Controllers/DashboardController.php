<?php
namespace App\Http\Controllers;

use App\Exports\LaporanInsentifExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Desa;
use App\Models\Masjid;
use App\Models\Pengurus;
use App\Models\TarifInsentif;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;



class DashboardController extends Controller
{
    // HALAMAN DEPAN SIDADU
    public function halamanDepan()
    {
        return view('halaman_depan');
    }

    // CEK DATA PENGURUS BERDASARKAN NIK
    public function cekPengurus(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'digits:16'],
        ], [
            'nik.required' => 'Silakan masukkan NIK terlebih dahulu.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
        ]);

        $pengurus = Pengurus::with(['masjid.desa'])
            ->where('nik', $request->nik)
            ->first();

        if (!$pengurus) {
            return back()
                ->withInput()
                ->with('info', 'Data pengurus dengan NIK tersebut belum ditemukan.');
        }

        return view('halaman_depan', compact('pengurus'));
    }

    // DASHBOARD OPERATOR DESA
    public function operatorDesa()
    {
        return view('dashboard.operator_desa');
    }

    // DASHBOARD ADMIN KECAMATAN
    public function adminKecamatan()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->kecamatan_id) {
            abort(403, 'Akun Admin Kecamatan belum terhubung dengan kecamatan.');
        }

        $desas = Desa::where('kecamatan_id', $user->kecamatan_id)
            ->orderBy('nama_desa')
            ->get();

        // NOTIFIKASI PENGURUS BARU YANG MENUNGGU VERIFIKASI
        $notifikasiPengurus = Pengurus::with(['masjid.desa'])
            ->where('status', 'Menunggu')
            ->whereHas('masjid.desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->latest()
            ->get();

        $jumlahNotifikasi = $notifikasiPengurus->count();

        return view('dashboard.admin_kecamatan', compact(
            'user',
            'desas',
            'notifikasiPengurus',
            'jumlahNotifikasi'
        ));
    }

    // DASHBOARD BAGIAN KESRA
    public function bagianKesra(Request $request)
    {
        // Statistik pengurus
        $totalPengurus = Pengurus::count();
        $totalMenunggu = Pengurus::where('status', 'Menunggu')->count();
        $totalDisetujui = Pengurus::where('status', 'Disetujui')->count();
        $totalDitolak = Pengurus::where('status', 'Ditolak')->count();
        $totalDicairkan = Pengurus::where('status', 'Dicairkan')->count();

        // Pengurus disetujui tetapi belum dicairkan
        $totalBelumDicairkan = $totalDisetujui;

        // Notifikasi pengurus yang disetujui Admin Kecamatan
        $notifikasiPengurus = Pengurus::with(['masjid.desa'])
            ->where('status', 'Disetujui')
            ->orderBy('id', 'desc')
            ->get();

        $jumlahNotifikasi = $notifikasiPengurus->count();

        // Persentase jumlah pencairan
        $persentasePencairan = $totalPengurus > 0
            ? round(($totalDicairkan / $totalPengurus) * 100, 1)
            : 0;

        // Total dana
        $totalDanaDicairkan = (float) Pengurus::where('status', 'Dicairkan')
            ->sum('nominal_insentif');

        $totalAlokasiInsentif = (float) Pengurus::whereIn('status', ['Disetujui', 'Dicairkan'])
            ->sum('nominal_insentif');

        $sisaDanaInsentif = $totalAlokasiInsentif - $totalDanaDicairkan;

        $persentaseDanaDicairkan = $totalAlokasiInsentif > 0
            ? round(($totalDanaDicairkan / $totalAlokasiInsentif) * 100, 1)
            : 0;

        // Pencarian dan filter pengurus
        $queryPengurus = Pengurus::with(['masjid.desa']);

        if ($request->filled('cari')) {
            $cari = $request->cari;

            $queryPengurus->where(function ($q) use ($cari) {
                $q->where('nama_lengkap', 'like', "%{$cari}%")
                  ->orWhere('nik', 'like', "%{$cari}%");
            });
        }

        if ($request->filled('status')) {
            $queryPengurus->where('status', $request->status);
        }

        $daftarPengurus = $queryPengurus
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Rekap pencairan per bulan pada tahun berjalan
        $rekapBulanan = Pengurus::selectRaw("
            MONTH(tanggal_pencairan) as bulan,
            COUNT(*) as jumlah,
            SUM(nominal_insentif) as total
        ")
            ->where('status', 'Dicairkan')
            ->whereNotNull('tanggal_pencairan')
            ->whereYear('tanggal_pencairan', now()->year)
            ->groupByRaw('MONTH(tanggal_pencairan)')
            ->get()
            ->keyBy('bulan');

        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April',
            'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        $labelGrafik = [];
        $jumlahGrafik = [];
        $nominalGrafik = [];

        for ($i = 1; $i <= 12; $i++) {
            $labelGrafik[] = $namaBulan[$i - 1];

            $data = $rekapBulanan->get($i);

            $jumlahGrafik[] = $data ? (int) $data->jumlah : 0;
            $nominalGrafik[] = $data ? (float) $data->total : 0;
        }

        // Kirim data ke halaman dashboard
        return view('dashboard.bagian_kesra', compact(
            'totalPengurus',
            'totalMenunggu',
            'totalDisetujui',
            'totalDitolak',
            'totalDicairkan',
            'totalDanaDicairkan',
            'persentasePencairan',
            'totalAlokasiInsentif',
            'sisaDanaInsentif',
            'persentaseDanaDicairkan',
            'totalBelumDicairkan',
            'daftarPengurus',
            'labelGrafik',
            'jumlahGrafik',
            'nominalGrafik',
            'notifikasiPengurus',
            'jumlahNotifikasi'
        ));
    }
// DOWNLOAD PDF DATA PENGURUS ADMIN KECAMATAN
public function downloadPdfPengurusKecamatan()
{
    $user = User::find(session('user_id'));

    if (!$user || !$user->kecamatan_id) {
        abort(403, 'Akun Admin Kecamatan belum terhubung dengan kecamatan.');
    }

    $pengurus = Pengurus::with(['masjid.desa'])
        ->whereHas('masjid.desa', function ($query) use ($user) {
            $query->where('kecamatan_id', $user->kecamatan_id);
        })
        ->orderBy('id', 'desc')
        ->get();

    $pdf = Pdf::loadView(
        'dashboard.pdf_pengurus_kecamatan',
        compact('user', 'pengurus')
    );

    return $pdf->download('data-pengurus-kecamatan.pdf');
}
    // DAFTAR AKUN ADMIN KECAMATAN
    public function daftarAkunKecamatan()
    {
        $akunKecamatan = User::where('role', 'admin_Kecamatan')
            ->orderBy('nama_lengkap')
            ->get();

        return view('dashboard.akun_kecamatan', compact('akunKecamatan'));
    }

    // RESET PASSWORD ADMIN KECAMATAN
    public function resetPasswordKecamatan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'password_baru' => 'required|string|min:8|confirmed',
        ], [
            'password_baru.min' => 'Password minimal 8 karakter.',
            'password_baru.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        $akun = User::where('id', $request->user_id)
            ->where('role', 'admin_Kecamatan')
            ->firstOrFail();

        $akun->password = Hash::make($request->password_baru);
        $akun->save();

        return redirect()
            ->route('kesra.akun-kecamatan')
            ->with('success', 'Password akun Admin Kecamatan berhasil direset.');
    }

    // MENAMPILKAN DATA MASJID OPERATOR DESA
    public function dataMasjid()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $masjids = Masjid::with('desa')
            ->where('desa_id', $user->desa_id)
            ->orderBy('nama_masjid')
            ->get();

        return view('dashboard.data_masjid', compact('user', 'masjids'));
    }

    // FORM TAMBAH MASJID
    public function createMasjid()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $desas = Desa::where('id', $user->desa_id)->get();

        return view('dashboard.tambah_masjid', compact('user', 'desas'));
    }

    // SIMPAN MASJID
    public function storeMasjid(Request $request)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $request->validate([
            'nama_masjid' => 'required|string|max:150',
            'alamat' => 'required|string',
        ]);

        $desa = Desa::find($user->desa_id);

        if (!$desa) {
            abort(403, 'Data desa tidak ditemukan.');
        }

        Masjid::create([
            'nama_masjid' => $request->nama_masjid,
            'alamat' => $request->alamat,
            'desa_id' => $desa->id,
        ]);

        return redirect('/operator-desa/masjid')
            ->with('success', 'Masjid berhasil ditambahkan dan langsung aktif.');
    }

    // FORM EDIT MASJID
    public function editMasjid($id)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $masjid = Masjid::where('id', $id)
            ->where('desa_id', $user->desa_id)
            ->firstOrFail();

        $desas = Desa::where('id', $user->desa_id)->get();

        return view('dashboard.edit_masjid', compact('user', 'masjid', 'desas'));
    }

    // UPDATE MASJID
    public function updateMasjid(Request $request, $id)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $request->validate([
            'nama_masjid' => 'required|string|max:150',
            'alamat' => 'required|string',
        ]);

        $masjid = Masjid::where('id', $id)
            ->where('desa_id', $user->desa_id)
            ->firstOrFail();

        $masjid->update([
            'nama_masjid' => $request->nama_masjid,
            'alamat' => $request->alamat,
            'desa_id' => $user->desa_id,
        ]);

        return redirect('/operator-desa/masjid')
            ->with('success', 'Data masjid berhasil diperbarui.');
    }

    // HAPUS MASJID
    public function deleteMasjid($id)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $masjid = Masjid::where('id', $id)
            ->where('desa_id', $user->desa_id)
            ->firstOrFail();

        $masjid->delete();

        return redirect('/operator-desa/masjid')
            ->with('success', 'Data masjid berhasil dihapus.');
    }

    
    // FORM TAMBAH DATA PENGURUS
    public function createPengurus()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $masjids = Masjid::where('desa_id', $user->desa_id)
            ->orderBy('nama_masjid')
            ->get();

        $jabatans = TarifInsentif::where('aktif', true)
            ->orderBy('jabatan')
            ->pluck('jabatan');

        return view('dashboard.tambah_pengurus', compact('user', 'masjids', 'jabatans'));
    }

    // RIWAYAT PENGAJUAN PENGURUS
    public function riwayatPengurus()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $pengurus = Pengurus::with('masjid')
            ->whereHas('masjid', function ($query) use ($user) {
                $query->where('desa_id', $user->desa_id);
            })
            ->orderByDesc('id')
            ->get();

        return view('dashboard.riwayat_pengurus', compact('user', 'pengurus'));
    }

    // SIMPAN DATA PENGURUS
    public function storePengurus(Request $request)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->desa_id) {
            abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
        }

        $request->validate([
            'masjid_id' => 'required|integer',
            'nama_lengkap' => 'required|string|max:150',
            'nik' => 'required|digits:16|unique:pengurus,nik',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'pendidikan' => 'required|string|max:50',
            'norek_bjb' => 'required|string|max:50',
            'peran' => [
                'required',
                'string',
                'max:100',
                \Illuminate\Validation\Rule::exists(
                    (new TarifInsentif)->getTable(),
                    'jabatan'
                )->where('aktif', 1),
            ],
            'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_sk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_bank' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $masjid = Masjid::where('id', $request->masjid_id)
            ->where('desa_id', $user->desa_id)
            ->first();

        if (!$masjid) {
            return back()
                ->withErrors(['masjid_id' => 'Masjid tidak sesuai dengan desa Anda.'])
                ->withInput();
        }

        $data = $request->only([
            'nama_lengkap',
            'nik',
            'tgl_lahir',
            'alamat',
            'pendidikan',
            'norek_bjb',
            'peran',
        ]);

        $data['masjid_id'] = $masjid->id;
        $data['status'] = 'Menunggu';
        $data['nominal_insentif'] = null;
        $data['catatan_penolakan'] = null;

        foreach (['file_ktp', 'file_kk', 'file_sk', 'file_bank'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('pengurus', 'public');
            }
        }

        Pengurus::create($data);

        return redirect('/dashboard/operator-desa')
            ->with('success', 'Data pengurus berhasil didaftarkan dan menunggu verifikasi.');
    }

    // FORM EDIT PENGURUS
public function editPengurus($id)
{
    $user = User::find(session('user_id'));

    if (!$user || !$user->desa_id) {
        abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
    }

    $pengurus = Pengurus::with('masjid')
        ->where('id', $id)
        ->whereHas('masjid', function ($query) use ($user) {
            $query->where('desa_id', $user->desa_id);
        })
        ->firstOrFail();

    if ($pengurus->status !== 'Menunggu') {
        return redirect('/operator-desa/riwayat-pengurus')
            ->with('error', 'Data hanya dapat diedit jika status masih Menunggu.');
    }

    $masjids = Masjid::where('desa_id', $user->desa_id)
        ->orderBy('nama_masjid')
        ->get();

    $jabatans = TarifInsentif::where('aktif', 1)
        ->orderBy('jabatan')
        ->pluck('jabatan'
);

    return view('dashboard.edit_pengurus', compact(
        'user',
        'pengurus',
        'masjids',
        'jabatans'
    ));
}

// UPDATE DATA PENGURUS
public function updatePengurus(Request $request, $id)
{
    $user = User::find(session('user_id'));

    if (!$user || !$user->desa_id) {
        abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
    }

    $pengurus = Pengurus::where('id', $id)
        ->whereHas('masjid', function ($query) use ($user) {
            $query->where('desa_id', $user->desa_id);
        })
        ->firstOrFail();

    if ($pengurus->status !== 'Menunggu') {
        return redirect('/operator-desa/riwayat-pengurus')
            ->with('error', 'Data tidak dapat diedit karena sudah diverifikasi.');
    }

    $request->validate([
        'masjid_id' => 'required|integer',
        'nama_lengkap' => 'required|string|max:150',
        'nik' => [
            'required',
            'digits:16',
            Rule::unique('pengurus', 'nik')->ignore($pengurus->id),
        ],
        'tgl_lahir' => 'required|date',
        'alamat' => 'required|string',
        'pendidikan' => 'required|string|max:50',
        'norek_bjb' => 'required|string|max:50',
        'peran' => [
            'required',
            'string',
            'max:100',
            Rule::exists(
                (new TarifInsentif)->getTable(),
                'jabatan'
            )->where('aktif', 1),
        ],
        'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_sk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'file_bank' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $masjid = Masjid::where('id', $request->masjid_id)
        ->where('desa_id', $user->desa_id)
        ->first();

    if (!$masjid) {
        return back()
            ->withErrors([
                'masjid_id' => 'Masjid tidak sesuai dengan desa Anda.',
            ])
            ->withInput();
    }

    $data = $request->only([
        'nama_lengkap',
        'nik',
        'tgl_lahir',
        'alamat',
        'pendidikan',
        'norek_bjb',
        'peran',
    ]);

    $data['masjid_id'] = $masjid->id;

    foreach (['file_ktp', 'file_kk', 'file_sk', 'file_bank'] as $field) {
        if ($request->hasFile($field)) {
            // Hapus file lama jika ada
            if ($pengurus->$field) {
                Storage::disk('public')->delete($pengurus->$field);
            }

            $data[$field] = $request->file($field)
                ->store('pengurus', 'public');
        }
    }

    $pengurus->update($data);

    return redirect('/operator-desa/riwayat-pengurus')
        ->with('success', 'Data pengurus berhasil diperbarui.');
}

// HAPUS DATA PENGURUS
public function deletePengurus($id)
{
    $user = User::find(session('user_id'));

    if (!$user || !$user->desa_id) {
        abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
    }

    $pengurus = Pengurus::where('id', $id)
        ->whereHas('masjid', function ($query) use ($user) {
            $query->where('desa_id', $user->desa_id);
        })
        ->firstOrFail();

    if ($pengurus->status !== 'Menunggu') {
        return redirect('/operator-desa/riwayat-pengurus')
            ->with('error', 'Data tidak dapat dihapus karena sudah diverifikasi.');
    }

    foreach (['file_ktp', 'file_kk', 'file_sk', 'file_bank'] as $field) {
        if ($pengurus->$field) {
            Storage::disk('public')->delete($pengurus->$field);
        }
    }

    $pengurus->delete();

    return redirect('/operator-desa/riwayat-pengurus')
        ->with('success', 'Data pengurus berhasil dihapus.');
}
// DOWNLOAD PDF DATA PENGURUS OPERATOR DESA
public function downloadPdfPengurusOperator()
{
    $user = User::find(session('user_id'));

    if (!$user || !$user->desa_id) {
        abort(403, 'Akun Operator Desa belum terhubung dengan desa.');
    }

    $pengurus = Pengurus::with(['masjid.desa'])
        ->whereHas('masjid', function ($query) use ($user) {
            $query->where('desa_id', $user->desa_id);
        })
        ->orderBy('nama_lengkap')
        ->get();

    $pdf = Pdf::loadView(
        'dashboard.pdf_pengurus_operator',
        compact('user', 'pengurus')
    );

    return $pdf->download('data-pengurus-desa.pdf');
}
    // DAFTAR PENGURUS UNTUK ADMIN KECAMATAN
    public function dataPengurus()
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->kecamatan_id) {
            abort(403, 'Akun Admin Kecamatan belum terhubung dengan kecamatan.');
        }

        $pengurus = Pengurus::with(['masjid.desa'])
            ->whereHas('masjid.desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.data_pengurus', compact('user', 'pengurus'));
    }

    // PROSES VERIFIKASI PENGURUS
    public function verifikasiPengurus(Request $request, $id)
    {
        $user = User::find(session('user_id'));

        if (!$user || !$user->kecamatan_id) {
            abort(403, 'Akun Admin Kecamatan belum terhubung dengan kecamatan.');
        }

        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_penolakan' => 'required_if:status,Ditolak|nullable|string',
        ]);

        $pengurus = Pengurus::where('id', $id)
            ->whereHas('masjid.desa', function ($query) use ($user) {
                $query->where('kecamatan_id', $user->kecamatan_id);
            })
            ->firstOrFail();

        if ($pengurus->status !== 'Menunggu') {
            return back()->with('error', 'Data pengurus sudah pernah diverifikasi.');
        }

        if ($request->status === 'Disetujui') {
            $tarif = TarifInsentif::whereRaw(
                'LOWER(TRIM(jabatan)) = ?',
                [strtolower(trim($pengurus->peran))]
            )->where('aktif', true)->first();

            if (!$tarif) {
                return back()->with(
                    'error',
                    'Tarif insentif untuk jabatan ' . $pengurus->peran . ' belum tersedia atau belum aktif.'
                );
            }

            $pengurus->nominal_insentif = $tarif->nominal;
            $pengurus->catatan_penolakan = null;
        }

        if ($request->status === 'Ditolak') {
            $pengurus->catatan_penolakan = $request->catatan_penolakan;
        }

        $pengurus->status = $request->status;
        $pengurus->save();

        return redirect('/admin-kecamatan/pengurus')
            ->with('success', 'Verifikasi pengurus berhasil disimpan.');
    }

    // DATA PENGURUS YANG SIAP DICAIRKAN
    public function dataPengurusDisetujui()
    {
        $pengurus = Pengurus::with(['masjid.desa'])
            ->where('status', 'Disetujui')
            ->whereNotNull('nominal_insentif')
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard.pengurus_disetujui', compact('pengurus'));
    }

    // DETAIL PENGURUS UNTUK BAGIAN KESRA
public function detailPengurusKesra($id)
{
    $pengurus = Pengurus::with(['masjid.desa'])
        ->findOrFail($id);

    return view('dashboard.detail_pengurus_kesra', compact('pengurus'));
}

    // PROSES PENCAIRAN INSENTIF
    public function cairkanInsentif($id)
    {
        $pengurus = Pengurus::where('id', $id)
            ->where('status', 'Disetujui')
            ->whereNotNull('nominal_insentif')
            ->firstOrFail();

        $pengurus->status = 'Dicairkan';
        $pengurus->tanggal_pencairan = now()->toDateString();
        $pengurus->jam_pencairan = now()->format('H:i:s');
        $pengurus->save();

        return redirect('/bagian-kesra/pengurus-disetujui')
            ->with('success', 'Insentif berhasil dicairkan. Tanggal dan jam pencairan berhasil dicatat.');
    }

    // RIWAYAT PENCAIRAN INSENTIF BAGIAN KESRA
    public function riwayatPencairan(Request $request)
    {
        $query = Pengurus::with(['masjid.desa'])
            ->where('status', 'Dicairkan')
            ->whereNotNull('nominal_insentif');

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('nama_lengkap', 'like', "%{$cari}%")
                  ->orWhere('nik', 'like', "%{$cari}%");
            });
        }

        if ($request->filled('masjid')) {
            $query->whereHas('masjid', function ($q) use ($request) {
                $q->where('nama_masjid', 'like', '%' . $request->masjid . '%');
            });
        }

        if ($request->filled('desa')) {
            $query->whereHas('masjid.desa', function ($q) use ($request) {
                $q->where('nama_desa', 'like', '%' . $request->desa . '%');
            });
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_pencairan', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('tanggal_pencairan', '<=', $request->tanggal_sampai);
        }

        $pengurus = $query->orderBy('id', 'desc')->get();

        return view('dashboard.riwayat_pencairan', compact('pengurus'));
    }

    // LAPORAN REKAPITULASI INSENTIF BAGIAN KESRA
    public function laporanRekapitulasi(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);

        $kecamatans = DB::table('kecamatan')
            ->orderBy('nama_kecamatan')
            ->get();

        $kecamatanId = $request->input('kecamatan_id');
        $desaId = $request->input('desa_id');

        $desas = DB::table('desa')
            ->orderBy('nama_desa')
            ->get();

        $terapkanFilterWilayah = function ($query) use ($kecamatanId, $desaId) {
            $query->whereHas('masjid.desa', function ($q) use ($kecamatanId, $desaId) {
                if (!empty($kecamatanId)) {
                    $q->where('kecamatan_id', $kecamatanId);
                }
                if (!empty($desaId)) {
                    $q->where('id', $desaId);
                }
            });
        };

        $queryTotal = Pengurus::query();
        $terapkanFilterWilayah($queryTotal);
        $totalPengurus = $queryTotal->count();

        $queryDisetujui = Pengurus::where('status', 'Disetujui');
        $terapkanFilterWilayah($queryDisetujui);
        $totalDisetujui = $queryDisetujui->count();

        $queryMenunggu = Pengurus::where('status', 'Menunggu');
        $terapkanFilterWilayah($queryMenunggu);
        $totalMenunggu = $queryMenunggu->count();

        $queryDitolak = Pengurus::where('status', 'Ditolak');
        $terapkanFilterWilayah($queryDitolak);
        $totalDitolak = $queryDitolak->count();

        $dataPencairan = Pengurus::where('status', 'Dicairkan')
            ->whereNotNull('tanggal_pencairan')
            ->whereMonth('tanggal_pencairan', $bulan)
            ->whereYear('tanggal_pencairan', $tahun);

        $terapkanFilterWilayah($dataPencairan);

        $totalDicairkan = (clone $dataPencairan)->count();
        $totalNominalDicairkan = (clone $dataPencairan)->sum('nominal_insentif');

        $queryBelumDicairkan = Pengurus::where('status', 'Disetujui');
        $terapkanFilterWilayah($queryBelumDicairkan);
        $totalBelumDicairkan = $queryBelumDicairkan->count();

        $rekapPeran = (clone $dataPencairan)
            ->selectRaw("
                peran,
                COUNT(*) as jumlah_pengurus,
                SUM(nominal_insentif) as total_dicairkan
            ")
            ->groupBy('peran')
            ->orderBy('peran')
            ->get();

        $rekapKecamatan = Pengurus::join('masjid', 'pengurus.masjid_id', '=', 'masjid.id')
            ->join('desa', 'masjid.desa_id', '=', 'desa.id')
            ->join('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.id')
            ->where('pengurus.status', 'Dicairkan')
            ->whereNotNull('pengurus.tanggal_pencairan')
            ->whereMonth('pengurus.tanggal_pencairan', $bulan)
            ->whereYear('pengurus.tanggal_pencairan', $tahun)
            ->when($kecamatanId, function ($query) use ($kecamatanId) {
                $query->where('kecamatan.id', $kecamatanId);
            })
            ->when($desaId, function ($query) use ($desaId) {
                $query->where('desa.id', $desaId);
            })
            ->selectRaw('
                kecamatan.nama_kecamatan,
                COUNT(pengurus.id) as jumlah_pengurus,
                SUM(pengurus.nominal_insentif) as total_dicairkan
            ')
            ->groupBy('kecamatan.id', 'kecamatan.nama_kecamatan')
            ->orderBy('kecamatan.nama_kecamatan')
            ->get();

        $rekapDesa = Pengurus::join('masjid', 'pengurus.masjid_id', '=', 'masjid.id')
            ->join('desa', 'masjid.desa_id', '=', 'desa.id')
            ->join('kecamatan', 'desa.kecamatan_id', '=', 'kecamatan.id')
            ->where('pengurus.status', 'Dicairkan')
            ->whereNotNull('pengurus.tanggal_pencairan')
            ->whereMonth('pengurus.tanggal_pencairan', $bulan)
            ->whereYear('pengurus.tanggal_pencairan', $tahun)
            ->when($kecamatanId, function ($query) use ($kecamatanId) {
                $query->where('kecamatan.id', $kecamatanId);
            })
            ->when($desaId, function ($query) use ($desaId) {
                $query->where('desa.id', $desaId);
            })
            ->selectRaw('
                kecamatan.nama_kecamatan,
                desa.nama_desa,
                COUNT(pengurus.id) as jumlah_pengurus,
                SUM(pengurus.nominal_insentif) as total_dicairkan
            ')
            ->groupBy(
                'kecamatan.id',
                'kecamatan.nama_kecamatan',
                'desa.id',
                'desa.nama_desa'
            )
            ->orderBy('kecamatan.nama_kecamatan')
            ->orderBy('desa.nama_desa')
            ->get();

        $queryTahunan = Pengurus::where('status', 'Dicairkan')
            ->whereNotNull('tanggal_pencairan')
            ->whereYear('tanggal_pencairan', $tahun);

        $terapkanFilterWilayah($queryTahunan);

        $totalDicairkanTahunan = (clone $queryTahunan)->count();
        $totalNominalTahunan = (clone $queryTahunan)->sum('nominal_insentif');

        $querySeluruhPencairan = Pengurus::where('status', 'Dicairkan');
        $terapkanFilterWilayah($querySeluruhPencairan);

        $totalSeluruhPencairan = (clone $querySeluruhPencairan)->count();
        $totalSeluruhDana = (clone $querySeluruhPencairan)->sum('nominal_insentif');

        return view('dashboard.laporan_rekapitulasi', compact(
            'bulan',
            'tahun',
            'totalPengurus',
            'totalDisetujui',
            'totalDicairkan',
            'totalMenunggu',
            'totalDitolak',
            'totalNominalDicairkan',
            'rekapPeran',
            'totalDicairkanTahunan',
            'totalNominalTahunan',
            'totalSeluruhPencairan',
            'totalSeluruhDana',
            'totalBelumDicairkan',
            'rekapKecamatan',
            'rekapDesa',
            'kecamatans',
            'desas',
            'kecamatanId',
            'desaId'
        ));
    }

    // CETAK LAPORAN REKAPITULASI PDF
    public function cetakLaporanPdf(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);
        $kecamatanId = $request->input('kecamatan_id');
        $desaId = $request->input('desa_id');

        $query = Pengurus::with(['masjid.desa'])
            ->where('status', 'Dicairkan')
            ->whereNotNull('tanggal_pencairan')
            ->whereMonth('tanggal_pencairan', $bulan)
            ->whereYear('tanggal_pencairan', $tahun);

        if (!empty($kecamatanId)) {
            $query->whereHas('masjid.desa', function ($q) use ($kecamatanId) {
                $q->where('kecamatan_id', $kecamatanId);
            });
        }

        if (!empty($desaId)) {
            $query->whereHas('masjid.desa', function ($q) use ($desaId) {
                $q->where('id', $desaId);
            });
        }

        $pengurus = $query->orderBy('tanggal_pencairan')->get();

        $totalPengurus = $pengurus->count();
        $totalDana = $pengurus->sum('nominal_insentif');

        $pdf = Pdf::loadView('dashboard.laporan_pdf', compact(
            'bulan',
            'tahun',
            'pengurus',
            'totalPengurus',
            'totalDana'
        ));

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download(
            'laporan-insentif-' . $bulan . '-' . $tahun . '.pdf'
        );
    }

    // DOWNLOAD LAPORAN REKAPITULASI EXCEL
    public function downloadLaporanExcel(Request $request)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);
        $kecamatanId = $request->input('kecamatan_id');
        $desaId = $request->input('desa_id');

        return Excel::download(
            new LaporanInsentifExport(
                $bulan,
                $tahun,
                $kecamatanId,
                $desaId
            ),
            'laporan-insentif-' . $bulan . '-' . $tahun . '.xlsx'
        );
    }
   
}