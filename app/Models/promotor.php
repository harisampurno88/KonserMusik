<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotor extends Model
{
    protected $table = 'promotor';
    protected $primaryKey = 'id_promotor';
    public $timestamps = false;

    protected $fillable = [
        'id_promotor',
        'nama_promotor',
        'email',
    ];
    
    public function konser()
    {
        return $this->hasMany(konser::class, 'id_promotor', 'id_promotor');
    }
}
