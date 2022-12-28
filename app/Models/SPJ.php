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
        'ket',
        'description',
        'validasi_user',
        'validasi_admin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailspj()
    {
        return $this->hasMany(Detailspj::class, 'spj_id', 'id');
    }

    public function validation_user()
    {
        return $this->belongsTo(User::class, 'validasi_user', 'id');
    }

    public function validation_admin()
    {
        return $this->belongsTo(User::class, 'validasi_admin', 'id');
    }
}