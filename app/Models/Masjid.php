<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = 'masjid';

    public $timestamps = false;

    protected $fillable = [
        'nama_masjid',
        'alamat',
        'desa_id',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}