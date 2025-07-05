<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';
    public $timestamps = false;

    protected $fillable = [
        'id_tiket',
        'id_konser',
        'jenis_tiket',
        'harga',
        'stok',
    ];
}
