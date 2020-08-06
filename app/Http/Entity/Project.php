<?php


namespace App\Http\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillables = [
        'title',
        'mission',
        'result',
        'imagePortfolioProjectPath',
        'colorProject',
        'completionDate',
        'slug'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
