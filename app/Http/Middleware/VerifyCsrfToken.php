<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/clients/contact/show',
        'admin/menus/save',
        'admin/uploader',
        'admin/devis/store',
        'admin/uploader/rotate',
        'admin/uploader/save',
        '/edit/{id}'
    ];
}
