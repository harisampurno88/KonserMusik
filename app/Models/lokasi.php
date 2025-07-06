<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    public $timestamps = false;

    protected $fillable = [
        'id_lokasi',
        'nama_lokasi',
        'alamat',
    ];

    public function konser()
    {
        return $this->hasMany(konser::class, 'id_lokasi', 'id_lokasi');
    }
}
