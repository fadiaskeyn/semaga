<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'quiz_id',
        'end_exam',
        'student_id',
        'final_score'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
