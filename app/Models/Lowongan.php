<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lamaran()
    {
        return $this->hasMany(Lamaran::class);
    }

    public function notif()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
