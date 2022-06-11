<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Jruangan;

class Ruangan extends Model
{
    protected $table = 'ruangans';
    protected $primaryKey = 'id_ruangan';

    protected $fillable = [
        'id_jenis_ruangan', 'no_ruangan', 'status'
    ];

    public function jruangan()
    {
        return $this->belongsTo(Jruangan::class, 'id_jenis_ruangan', 'id_jenis_ruangan');
    }
}
