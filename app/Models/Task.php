<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_due_at'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'due_at' => 'datetime',
    ];


    /**
     * Used to increase the order column automatically
     * everytime task created using eloquent
     */
    public static function boot(): void
    {
        parent::boot();
        self::creating(function ($model) {
            $model->order = $model->max('order') + 1;
        });
    }


    /**
     * Get the task formatted due date.
     */
    protected function formattedDueAt(): Attribute
    {
        return Attribute::make(
            get: function() {
                return $this['due_at']->isoFormat('ddd, DD MMM YYYY');
            },
        );
    }


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


    /**
     * Get all tasks' assignees
     */
    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_assignees')->using(TaskAssignee::class);
    }


    /**
     * Sorted task by order column
     */
    public function scopeSortByOrder(Builder $query): void
    {
        $query->orderBy('order');
    }
}
