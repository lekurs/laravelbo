<?php


namespace App\Http\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function imagesProjects(): HasMany
    {
        return $this->hasMany(ImageProject::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'projects_services');
    }
}
