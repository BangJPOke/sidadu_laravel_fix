<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TarifInsentifController;
use App\Http\Controllers\OperatorDesaController;

Route::get('/login', [LoginController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// PENGELOLAAN MASJID OLEH OPERATOR DESA
Route::get('/operator-desa/masjid', [DashboardController::class, 'dataMasjid'])
    ->middleware('role:operator_desa');

Route::get('/operator-desa/masjid/tambah', [DashboardController::class, 'createMasjid'])
    ->middleware('role:operator_desa');

Route::post('/operator-desa/masjid', [DashboardController::class, 'storeMasjid'])
    ->middleware('role:operator_desa');

Route::get('/operator-desa/masjid/{id}/edit', [DashboardController::class, 'editMasjid'])
    ->middleware('role:operator_desa');

Route::put('/operator-desa/masjid/{id}', [DashboardController::class, 'updateMasjid'])
    ->middleware('role:operator_desa');

Route::delete('/operator-desa/masjid/{id}', [DashboardController::class, 'deleteMasjid'])
    ->middleware('role:operator_desa');

Route::get('/operator-desa/pengurus/pdf', [DashboardController::class, 'downloadPdfPengurusOperator'])
    ->middleware('role:operator_desa')
    ->name('operator-desa.pengurus.pdf');

Route::get('/admin-kecamatan/pengurus', [DashboardController::class, 'dataPengurus'])
    ->middleware('role:admin_Kecamatan');

Route::get('/bagian-kesra/pengurus-disetujui', [DashboardController::class, 'dataPengurusDisetujui'])
    ->middleware('role:bagian_kesra');

Route::get('/bagian-kesra/riwayat-pencairan', [DashboardController::class, 'riwayatPencairan'])
    ->middleware('role:bagian_kesra');
Route::get('/bagian-kesra/laporan-rekapitulasi', [DashboardController::class, 'laporanRekapitulasi'])
    ->middleware('role:bagian_kesra');
Route::get('/bagian-kesra/laporan-rekapitulasi/pdf', [DashboardController::class, 'cetakLaporanPdf'])
    ->middleware('role:bagian_kesra')
    ->name('bagian-kesra.laporan.pdf');

Route::get('/bagian-kesra/laporan-rekapitulasi/xlsx', [DashboardController::class, 'downloadLaporanExcel'])
    ->middleware('role:bagian_kesra')
    ->name('bagian-kesra.laporan.xlsx');
Route::post('/bagian-kesra/pengurus/{id}/cairkan', [DashboardController::class, 'cairkanInsentif'])
    ->middleware('role:bagian_kesra');
Route::get('/bagian-kesra/tarif-insentif', [TarifInsentifController::class, 'index'])
    ->middleware('role:bagian_kesra')
    ->name('bagian-kesra.tarif');

Route::post('/bagian-kesra/tarif-insentif', [TarifInsentifController::class, 'update'])
    ->middleware('role:bagian_kesra');
// CRUD OPERATOR DESA OLEH ADMIN KECAMATAN
Route::middleware(['role:admin_Kecamatan'])->group(function () {
    Route::get('/admin-kecamatan/operator-desa', [OperatorDesaController::class, 'index'])
        ->name('admin-kecamatan.operator.index');

    Route::get('/admin-kecamatan/operator-desa/tambah', [OperatorDesaController::class, 'create'])
        ->name('admin-kecamatan.operator.create');

    Route::post('/admin-kecamatan/operator-desa', [OperatorDesaController::class, 'store'])
        ->name('admin-kecamatan.operator.store');

    Route::get('/admin-kecamatan/operator-desa/{id}/edit', [OperatorDesaController::class, 'edit'])
        ->name('admin-kecamatan.operator.edit');

    Route::put('/admin-kecamatan/operator-desa/{id}', [OperatorDesaController::class, 'update'])
        ->name('admin-kecamatan.operator.update');

    Route::delete('/admin-kecamatan/operator-desa/{id}', [OperatorDesaController::class, 'destroy'])
        ->name('admin-kecamatan.operator.destroy');
});
Route::get('/bagian-kesra/pengurus/{id}/detail', [DashboardController::class, 'detailPengurusKesra'])
    ->middleware('role:bagian_kesra');

Route::post('/admin-kecamatan/pengurus/{id}/verifikasi', [DashboardController::class, 'verifikasiPengurus'])
    ->middleware('role:admin_Kecamatan');
Route::get('/admin-kecamatan/pengurus/pdf', [DashboardController::class, 'downloadPdfPengurusKecamatan'])
    ->middleware('role:admin_Kecamatan')
    ->name('admin-kecamatan.pengurus.pdf');
Route::get('/operator-desa/pengurus/tambah', [DashboardController::class, 'createPengurus'])
    ->middleware('role:operator_desa');
Route::post('/operator-desa/pengurus', [DashboardController::class, 'storePengurus'])
    ->middleware('role:operator_desa');
// HALAMAN DEPAN DAN CEK DATA PENGURUS
Route::get('/', [DashboardController::class, 'halamanDepan'])
    ->name('halaman.depan');

Route::post('/cek-pengurus', [DashboardController::class, 'cekPengurus'])
    ->name('cek.pengurus');

Route::get('/operator-desa/riwayat-pengurus', [DashboardController::class, 'riwayatPengurus'])
    ->middleware('role:operator_desa');
// EDIT PENGURUS
Route::get('/operator-desa/pengurus/{id}/edit', [
    DashboardController::class,
    'editPengurus'
])->middleware('role:operator_desa');

// UPDATE PENGURUS
Route::put('/operator-desa/pengurus/{id}', [
    DashboardController::class,
    'updatePengurus'
])->middleware('role:operator_desa');

// HAPUS PENGURUS
Route::delete('/operator-desa/pengurus/{id}', [
    DashboardController::class,
    'deletePengurus'
])->middleware('role:operator_desa');

Route::middleware(['role:operator_desa'])->group(function () {
    Route::get('/dashboard/operator-desa', [
        DashboardController::class,
        'operatorDesa'
    ]);
});

Route::middleware(['role:admin_Kecamatan'])->group(function () {
    Route::get('/dashboard/admin-kecamatan', [
        DashboardController::class,
        'adminKecamatan'
    ]);
});

Route::middleware(['role:bagian_kesra'])->group(function () {

    Route::get('/dashboard/bagian-kesra', [
        DashboardController::class,
        'bagianKesra'
    ]);

    // Kelola akun Admin Kecamatan
    Route::get('/dashboard/bagian-kesra/akun-kecamatan', [
        DashboardController::class,
        'daftarAkunKecamatan'
    ])->name('kesra.akun-kecamatan');

    // Reset password Admin Kecamatan
    Route::post('/dashboard/bagian-kesra/akun-kecamatan/reset-password', [
        DashboardController::class,
        'resetPasswordKecamatan'
    ])->name('kesra.reset-password-kecamatan');

});