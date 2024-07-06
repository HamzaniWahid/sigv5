<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KuisionerJawaban extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillabel = [
        'kuisioner_id',
        'jawaban',
        'keterangan',
        'lainnya'
    ];

    public function kuisioner(): BelongsTo
    {
        return $this->belongsTo(Kuisioner::class);
    }
}
