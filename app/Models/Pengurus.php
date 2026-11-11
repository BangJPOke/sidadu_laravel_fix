<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';

    public $timestamps = false;

    protected $fillable = [
        'masjid_id',
        'nama_lengkap',
        'nik',
        'tgl_lahir',
        'alamat',
        'pendidikan',
        'norek_bjb',
        'peran',
        'file_ktp',
        'file_kk',
        'file_sk',
        'file_bank',
        'status',
        'nominal_insentif',
        'catatan_penolakan',
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class, 'masjid_id');
    }
}