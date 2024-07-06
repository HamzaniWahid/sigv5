<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kuisioner extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'pertanyaan',
        'tipe',
        'level',
        'syarat'
    ];
    public function kuisionerJawaban(): HasMany
    {
        return $this->hasMany(KuisionerJawaban::class);
    }
}
