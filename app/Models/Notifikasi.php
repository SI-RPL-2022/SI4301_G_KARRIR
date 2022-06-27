<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;


    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
