<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items_out extends Model
{
    protected $fillable = [
        "kd_barang",
        "qty",
        "destination",
        "tanggal_keluar"
    ];

    protected $table = "items_out";

    public function items()
    {
        return $this->belongsTo(items::class, 'kd_barang', 'kd_barang');
    }
}
