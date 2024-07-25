<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;

    protected $table = "surveys";
    protected $fillable = [
        'nama',
        'status'
    ];

    public function kuisioners(): HasMany
    {
        return $this->hasMany(Kuisioner::class);
    }
    public function kategories(): HasMany
    {
        return $this->hasMany(Kategori::class);
    }
}
