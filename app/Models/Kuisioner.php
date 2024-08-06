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
        'survey_id',
        'pertanyaan',
        'kategori_id',
        'level',
        'syarat'
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
    public function jawabans(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function hasil(){
        return $this->hasMany(Hasil::class);
    }

}
