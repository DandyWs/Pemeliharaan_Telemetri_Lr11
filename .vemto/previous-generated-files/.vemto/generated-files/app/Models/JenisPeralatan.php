<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPeralatan extends Model
{
    use HasFactory;

    protected $table = 'jenisPeralatan';

    protected $guarded = [];

    public function alatTelemetris()
    {
        return $this->hasMany(AlatTelemetri::class);
    }
}
