<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{


    protected $fillable = [
        "kd_barang",
        "nama_barang",
        "deskripsi",
        "qty",
        "origin",
        "foto",
    ];

    public function itemsIn()
    {
        return $this->hasMany(items_in::class, 'kd_barang', 'kd_barang');
    }
    public function itemsOut()
    {
        return $this->hasMany(items_out::class, 'kd_barang', 'kd_barang');
    }
}