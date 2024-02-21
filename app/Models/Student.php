<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nis',
        'password',
        'major_id',
        'exam_id',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        // 'date' => 'date',
    ];
}
