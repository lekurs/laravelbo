<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'wording',
        'position',
        'parent',
        'parentOrder',
        'favorite',
        'active'
    ];

}
