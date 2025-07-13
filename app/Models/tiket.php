<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    protected $keyType = 'string';      // Ini krusial
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_tiket',
        'id_konser',
        'jenis_tiket',
        'harga',
        'stok',
    ];

    public function konser()
    {
        return $this->belongsTo(Konser::class, 'id_konser', 'id_konser');
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_tiket', 'id_tiket');
    }

}
