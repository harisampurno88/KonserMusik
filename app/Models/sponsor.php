<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sponsor extends Model
{
    protected $table = 'sponsor';
    protected $primaryKey = 'id_sponsor';
    public $timestamps = false;

    protected $fillable = [
        'id_sponsor',
        'nama_sponsor',
        'id_konser',
        'deskripsi',
    ];

    public function konser()
    {
        return $this->belongsTo(konser::class, 'id_konser', 'id_konser');
    }
}
