<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';
    //pengisian masal selain disebutkan di guard dapat diisi pada tabel sql staffs
    //bertujuan untuk melindungi data wildcard
    protected $guarded = [
        'id','created_at','update_at'
    ];
}
