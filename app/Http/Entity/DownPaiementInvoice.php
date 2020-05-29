<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DownPaiementInvoice extends Model
{
    protected $fillable = [
        'number',
        'title',
        'amount',
        'paid',
        'paiement-date'
    ];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'invoice_id');
    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'estimation_id');
    }
}
