<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $fillable = [
        'user_id',
        'date_in',
        'date_out',
        'start_ot',
        'finish_ot',
        'jumlah_ot',
        'km_in',
        'km_out',
        'km_out',
        'usage',
        'ket'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
