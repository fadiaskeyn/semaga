<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transgression extends Model
{
    use HasFactory;

    //artinya semua data yang ada di migrasi Transgression
    ///database dapat di isi kecuali id
    protected $guarded = ['id'];
}
