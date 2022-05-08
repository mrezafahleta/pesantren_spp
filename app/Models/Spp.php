<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function student() {
        return $this->belongsTo(Student::class, 'nik_murid','nik');
    }
    

   
}
