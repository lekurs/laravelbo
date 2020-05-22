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
        return $this->hasMany(Contact::class, 'client_id');
    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id');
    }

    public function estimationsIsActive(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id')->isActive();
    }

    public function estimationsByOrder(): HasMany
    {
        return $this->hasMany(Estimation::class, 'client_id')->orderBy('created_at', 'asc');
    }
}
