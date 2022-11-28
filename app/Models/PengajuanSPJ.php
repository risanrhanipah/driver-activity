<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSPJ extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_spj';
    protected $fillable = [
        'name',
        'date_pengajuan',
        'spj',
        'ket'
    ];
}