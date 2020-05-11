<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
