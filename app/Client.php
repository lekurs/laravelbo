<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
       'name',
        'phone',
       'address',
       'zip',
       'city',
       'siren',
        'slug'
    ];

    /**
     * O2M Contacts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany('App\Contact', 'client_id');
    }
}
