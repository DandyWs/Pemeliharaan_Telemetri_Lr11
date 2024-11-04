<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaan';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class);
    }

    public function alatTelemetri()
    {
        return $this->hasOne(AlatTelemetri::class, 'pemeliharaan_id');
    }
}
