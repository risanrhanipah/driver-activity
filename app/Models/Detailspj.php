<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailspj extends Model
{
    use HasFactory;

    protected $table = 'detailspjs';
    protected $fillable = [
        'spj_id',
        'keperluan',
        'nominal',
        'jumlah',
        'total'
    ];
}
