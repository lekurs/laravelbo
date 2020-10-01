<?php


namespace App\Http\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ImageProject extends Model
{
    protected $fillable = [
      'imageProjectPath'
    ];

    protected $table = 'images_projects';

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
