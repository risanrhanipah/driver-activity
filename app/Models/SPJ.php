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
        'start_date',
        'end_date',
        'project',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailspj()
    {
        return $this->hasMany(Detailspj::class);
    }
}