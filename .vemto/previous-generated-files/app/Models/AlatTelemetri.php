<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlatTelemetri extends Model
{
    use HasFactory;

    protected $table = 'alatTelemetri';

    protected $guarded = [];

    public function jenisPeralatans()
    {
        return $this->belongsTo(JenisPeralatan::class, 'jenis_peralatan_id');
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function komponens()
    {
        return $this->hasMany(Komponen::class);
    }

    public function pemeliharaans()
    {
        return $this->hasOne(Pemeliharaan::class, 'alat_telemetri_id');
    }
}
