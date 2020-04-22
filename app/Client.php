<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
       'name',
        'phone',
       'address',
       'zip',
       'city',
       'siren',
    ];

    /**
     * O2M Contacts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}
