<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sekolah(){
        return $this->belongsTo(Sekolah::class);
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class);
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function hasil(){
        return $this->hasMany(Hasil::class);
    }
}
