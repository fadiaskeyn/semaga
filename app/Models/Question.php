<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'option5',
        'created_by',
        'quiz_id',
        'correct_answer',
        'image',
    ];

    public function quizreadies()
    {
        return $this->hasMany(Quizready::class);
    }
}
