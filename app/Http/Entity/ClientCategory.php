<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClientCategory extends Model
{
    protected $fillable = [
        'category'
    ];

    public function Estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'estimation_id');
    }
}
