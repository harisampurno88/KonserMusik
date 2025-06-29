<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class konser extends Model
{
    protected $table = 'konser';
    protected $primaryKey = 'id_konser';
    public $timestamps = false;

    protected $fillable = [
        'id_konser',
        'nama_konser',
        'tanggal',
        'id_artis',
        'id_lokasi',
        'id_promotor',
    ];
}
