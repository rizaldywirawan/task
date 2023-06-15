<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'title',
        'started_at',
        'due_at',
        'completed_at',
        'status',
        'priority',
        'project_id',
        'created_by',
        'updated_by'
    ];


    /**
     * User who create a task
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    /**
     * User who create a task
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    /**
     * User who create a task
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }


    /**
     * Project connected with the task
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id');
    }


    public function assignees()
    {
        return $this->belongsToMany(User::class, 'task_assignees')->using(TaskAssignee::class);
    }
}
