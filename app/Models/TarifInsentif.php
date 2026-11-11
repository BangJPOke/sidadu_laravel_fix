<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifInsentif extends Model
{
    protected $table = 'tarif_insentif';

    protected $fillable = [
        'jabatan',
        'nominal',
        'aktif',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'aktif' => 'boolean',
    ];
}
