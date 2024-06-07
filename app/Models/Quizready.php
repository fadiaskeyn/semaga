<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizready extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_id',
        'question_id',
        'score',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
