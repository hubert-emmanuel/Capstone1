<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'id_kurikulum',
    ];

    protected $primaryKey = 'id_kurikulum';

    public function matakuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class);
    }

}
