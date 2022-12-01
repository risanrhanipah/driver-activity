<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'nik',
        'user_id',
        'born_city',
        'birthday',
        'gender',
        'address',
        'religion',
        'position',
        'sites',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}