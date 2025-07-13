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

    public function artis()
    {
        return $this->belongsTo(artis::class, 'id_artis', 'id_artis');
    }

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function promotor()
    {
        return $this->belongsTo(promotor::class, 'id_promotor', 'id_promotor');
    }

    public function tiket()
    {
        return $this->hasMany(tiket::class, 'id_konser', 'id_konser');
    }

    public function sponsor()
    {
        return $this->hasMany(sponsor::class, 'id_konser', 'id_konser');
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_konser', 'id_konser');
    }

}
