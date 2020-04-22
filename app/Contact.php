<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
