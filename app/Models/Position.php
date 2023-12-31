<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Position extends Model
{
    use HasFactory;

    protected $tables='positions';

    protected $fillable = [
        'name',
        'desc'
    ];

    public function perangkats(): HasOne
    {
        return $this->HasOne(PerangkatDesa::class);
    }

}
