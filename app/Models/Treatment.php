<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = [
        'treatment',
        'layanan_id',
        'keterangan',
        'harga',
        
    ];


    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
