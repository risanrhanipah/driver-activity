<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $fillable = [
        'profile',
        'name',
        'date',
        'in',
        'out',
        'start',
        'finish',
        'jumlah_ot',
        'km',
        'usage',
        'progress',
        'ket'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
