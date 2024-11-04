<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemeliharaans()
    {
        return $this->belongsTo(Pemeliharaan::class, 'pemeliharaan_id');
    }
}
