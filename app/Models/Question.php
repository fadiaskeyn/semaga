<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question',
        'correct_answer',
        'option1',
        'option2',
        'created_by',
        'quiz_id',
        'score',
        'option3',
        'option4',
        'option5',
    ];
}
