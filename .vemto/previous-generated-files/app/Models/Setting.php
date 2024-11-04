<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';

    protected $guarded = [];

    public function alatTelemetri()
    {
        return $this->belongsTo(AlatTelemetri::class);
    }
}
