<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jawaban extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function kuisioners() : BelongsTo 
    {
        return $this->belongsTo(Kuisioner::class);
    }
    public function hasil(){
        return $this->hasMany(Hasil::class);
    }

}
