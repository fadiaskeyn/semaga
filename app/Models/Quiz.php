<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code_quiz',
        'created_by',
        'quiz_date',
        'course',
        'start',
        'end',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quizreadies()
    {
        return $this->hasMany(Quizready::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Quizready::class, 'quiz_id', 'id', 'id', 'question_id');
    }

    protected function quizStart(): Attribute
    {
        return new Attribute(
            get: function($value, $attr) {
                $timestamp = $attr['quiz_date'] . ' ' . $attr['start'];
                return Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
            }
        );
    }

    protected function quizEnd(): Attribute
    {
        return new Attribute(
            get: function($value, $attr) {
                $timestamp = $attr['quiz_date'] . ' ' . $attr['end'];
                return Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
            }
        );
    }
}
