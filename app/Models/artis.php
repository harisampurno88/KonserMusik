<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artis extends Model
{
    protected $table = 'artis';
    protected $primaryKey = 'id_artis';
    public $timestamps = false;

    protected $fillable = [
        'id_artis',
        'nama_artis',
        'genre',
    ];
}
