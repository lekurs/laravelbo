<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'slug'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function estimations(): HasMany
    {
        return $this->hasMany('App\Estimation', 'contact_id');
    }
}
