<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan',
        'active',
        'keterangan'

    ];

    public function treatment()
    {
        return $this->hasMany(Treatment::class);
    }
}
