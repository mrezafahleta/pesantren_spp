<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getTakeImageAttribute()
    {
        return "/storage/" . $this->foto;
    }

    public function spps()
    {
        return $this->hasMany(Spp::class, 'nim_murid', 'nim');
    }
}
