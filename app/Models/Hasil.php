<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $guarded = [];
//     protected $fillable = [
//         'user_id',
//         'survey_id',
//         'responden_id',
//         'kuisioner_id',
//         'jawaban_id',
//     ];
    public function responden(){
        return $this->belongsTo(Responden::class);
    }
    public function kuisioner(){
        return $this->belongsTo(Kuisioner::class);
    }
    public function jawaban(){
        return $this->belongsTo(Jawaban::class);
    }
}
