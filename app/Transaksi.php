<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ruangan;
use App\Customer;
use App\JRuangan;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    
    protected $fillable = [
        'id_customer', 'id_ruangan', 'tgl_masuk', 'tgl_keluar', 'bayar'
    ];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id_ruangan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

}
