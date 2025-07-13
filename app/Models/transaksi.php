<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "transaksi";
    protected $fillable = [
        'user_id',
        'id_konser',
        'id_tiket',
        'jumlah_tiket',
        'harga_per_tiket',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function konser()
    {
        return $this->belongsTo(konser::class, 'id_konser', 'id_konser');
    }
    public function tiket()
    {
        return $this->belongsTo(tiket::class, 'id_tiket', 'id_tiket');
    }
}
