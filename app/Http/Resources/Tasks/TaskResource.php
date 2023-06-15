<?php

namespace App\Http\Resources\Tasks;

use App\Http\Resources\Projects\ProjectResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'due_at' => $this->due_at,
            'completed_at' => $this->completed_at,
            'status' => $this->status,
            'priority' => $this->priority,
            'order' => $this->order,
            'project_id' => $this->project_id,
            'project' => new ProjectResource($this->whenLoaded('project')),
            'assignees' => new UserResource($this->whenLoaded('assignees')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'created_by_user' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by_user' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by_user' => new UserResource($this->whenLoaded('deletedBy')),
        ];
    }
}
