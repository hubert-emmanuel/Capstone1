<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    use HasFactory;

    protected $fillable = [
        'id_mata_kuliah',
        'nama_mata_kuliah',
        'program_studi',
        'kurikulum_id_kurikulum',
        'foto',
    ];

    protected $primaryKey = 'id_mata_kuliah';

    public function courses()
    {
        return $this->belongsTo(Kurikulum::class);
    }

}
