<?php

namespace App\Exports;

use App\Models\Pengurus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanInsentifExport implements FromCollection, WithHeadings, WithMapping
{
    protected $bulan;
    protected $tahun;
    protected $kecamatanId;
    protected $desaId;

    public function __construct($bulan, $tahun, $kecamatanId = null, $desaId = null)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->kecamatanId = $kecamatanId;
        $this->desaId = $desaId;
    }

    public function collection()
    {
        $query = Pengurus::with(['masjid.desa'])
            ->where('status', 'Dicairkan')
            ->whereNotNull('tanggal_pencairan')
            ->whereMonth('tanggal_pencairan', $this->bulan)
            ->whereYear('tanggal_pencairan', $this->tahun);

        if (!empty($this->kecamatanId)) {
            $query->whereHas('masjid.desa', function ($q) {
                $q->where('kecamatan_id', $this->kecamatanId);
            });
        }

        if (!empty($this->desaId)) {
            $query->whereHas('masjid.desa', function ($q) {
                $q->where('id', $this->desaId);
            });
        }

        return $query->orderBy('tanggal_pencairan')->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Pengurus',
            'NIK',
            'Masjid',
            'Desa',
            'Peran',
            'Nominal Insentif',
            'Tanggal Pencairan',
            'Jam Pencairan',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->nama_lengkap,
            $item->nik,
            $item->masjid->nama_masjid ?? '-',
            $item->masjid->desa->nama_desa ?? '-',
            $item->peran,
            $item->nominal_insentif,
            $item->tanggal_pencairan
                ? \Carbon\Carbon::parse($item->tanggal_pencairan)->format('d-m-Y')
                : '-',
            $item->jam_pencairan
                ? \Carbon\Carbon::parse($item->jam_pencairan)->format('H:i:s')
                : '-',
        ];
    }
}
