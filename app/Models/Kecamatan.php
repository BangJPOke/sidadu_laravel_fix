<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public $timestamps = false;

    protected $fillable = [
        'nama_kecamatan'
    ];

    public function desas()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id');
    }
}