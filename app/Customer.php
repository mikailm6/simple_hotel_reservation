<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'nik', 'nama_customer', 'email_customer', 'telp_customer', 'alamat_customer'
    ];
}
