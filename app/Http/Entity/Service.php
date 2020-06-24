<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'libelle',
        'description',
        'icon'
    ];

    public function Estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'estimation_id');
    }
}
