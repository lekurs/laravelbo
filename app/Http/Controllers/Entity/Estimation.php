<?php

namespace App\Http\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estimation extends Model
{
    protected $fillable = [
        'number',
        'title',
        'body',
        'price',
        'validation',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function downPaiementInvoice(): BelongsToMany
    {
        return $this->belongsToMany(DownPaiementInvoice::class);
    }

    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('validation', '=', 1);
    }
}
