<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estimation extends Model
{
    protected $fillable = [
        'number',
        'title',
        'body',
        'price',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo('App\Contact', 'contact_id');
    }
}
