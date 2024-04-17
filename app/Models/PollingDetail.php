<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    protected $table = 'polling_detail';

    use HasFactory;

    protected $fillable = [
        'id_polling_detail',
        'polling_id_polling',
        'user_id_user',
        'mata_kuliah_id_mata_kuliah'
    ];

    protected $primaryKey = 'id_polling_detail';


}
