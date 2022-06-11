<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JRuangan extends Model
{
    protected $table = 'jenis_ruangans';
    protected $primaryKey = 'id_jenis_ruangan';

    protected $fillable = [
        'nama_ruangan', 'tipe_ruangan', 'tarif_ruangan'
    ];
}
