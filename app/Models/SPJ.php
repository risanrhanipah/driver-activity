<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPJ extends Model
{
    use HasFactory;

    protected $table = 'spj';
    protected $fillable = [
        'user_id',
        'date_start',
        'date_end',
        'project',
        'description'
    ];
}