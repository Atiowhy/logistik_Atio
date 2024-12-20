<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items_in extends Model
{
    protected $fillable = [
        "kd_barang",
        "qty",
        "origin",
        "tanggal_masuk"
    ];

    protected $table = 'items_in';

    public function items()
    {
        return $this->belongsTo(items::class, 'kd_barang', 'kd_barang');
    }
}
