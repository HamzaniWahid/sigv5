<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kuisioner extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = [
        'surveys_id',
        'pertanyaan',
        'level',
        'syarat'
    ];

    public function surveys(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
    public function jawabans(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
}
