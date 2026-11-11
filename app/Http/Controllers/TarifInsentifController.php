<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TarifInsentif;
use App\Models\Pengurus;

class TarifInsentifController extends Controller
{
    public function index()
    {
        $jabatan = [
            'Ketua DKM',
            'Sekretaris',
            'Bendahara',
            'Imam',
            'Guru Ngaji',
            'Marbot',
        ];

        foreach ($jabatan as $nama) {
            TarifInsentif::firstOrCreate(
                ['jabatan' => $nama],
                ['nominal' => 0, 'aktif' => true]
            );
        }

        $tarif = TarifInsentif::orderBy('id')->get();

        return view('dashboard.tarif_insentif', compact('tarif'));
    }

    
public function update(Request $request)
{
    $request->validate([
        'tarif' => 'required|array',
        'tarif.*' => 'required|numeric|min:0',
    ]);

    foreach ($request->tarif as $id => $nominal) {
        TarifInsentif::where('id', $id)->update([
            'nominal' => $nominal,
        ]);
    }

    // Perbarui nominal pengurus yang sudah disetujui
    $semuaTarif = TarifInsentif::where('aktif', true)->get();

    foreach ($semuaTarif as $item) {
        Pengurus::where('status', 'Disetujui')
            ->whereRaw('LOWER(TRIM(peran)) = ?', [
                strtolower(trim($item->jabatan))
            ])
            ->update([
                'nominal_insentif' => $item->nominal,
            ]);
    }

    return redirect()
        ->route('bagian-kesra.tarif')
        ->with('success', 'Tarif dan nominal insentif pengurus berhasil diperbarui.');
}

}
