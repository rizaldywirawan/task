<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name'
    ];


    /**
     * Get all project tasks
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'project_id');
    }


    /**
     * Get all project assignees
     */
    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_assignees')->using(ProjectAssignee::class);
    }
}
