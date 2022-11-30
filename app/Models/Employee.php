<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'photo',
        'name',
        'born_city',
        'birthday',
        'gender',
        'address',
        'religion',
        'position',
        'sites',
        'phone_number',
        'email',
    ];
}