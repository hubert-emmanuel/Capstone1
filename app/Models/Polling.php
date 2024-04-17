<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{

    protected $table = 'polling';

    use HasFactory;

    protected $fillable = [
        'id_polling',
        'tanggal_mulai_polling',
        'tanggal_akhir_polling',
    ];

    protected $primaryKey = 'id_polling';

}
