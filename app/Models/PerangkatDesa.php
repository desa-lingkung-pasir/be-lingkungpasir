<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $tables='perangkat_desa';

    protected $fillable = [
        'nip',
        'name',
        'jk',
        'year',
        'position_id'
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

}