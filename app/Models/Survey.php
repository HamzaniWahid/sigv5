<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'status'
    ];

    public function kuisioner(): HasMany
    {
        return $this->hasMany(Kuisioner::class);
    }
}
