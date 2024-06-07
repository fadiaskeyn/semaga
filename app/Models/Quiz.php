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
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
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
