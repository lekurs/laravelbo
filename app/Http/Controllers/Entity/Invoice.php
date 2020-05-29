<?php

namespace App\Http\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'number',
        'title',
        'amount',
        'paid',
        'paiement-date'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function downPaiementInvoices(): BelongsTo
    {
        return $this->belongsTo(DownPaiementInvoice::class, 'downpaiementinvoice_id');
    }

    public function estimations(): HasMany
    {
        return $this->hasMany(Estimation::class, 'estimation_id');
    }
}
