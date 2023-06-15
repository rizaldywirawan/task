<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'sometimes',
                'required'
            ],
            'started_at' => [
                'nullable',
                'date'
            ],
            'due_at' => [
                'nullable',
                'date'
            ],
            'completed_at' => [
                'nullable',
                'date'
            ],
            'status' => [
                'nullable',
                Rule::in(['To-do', 'On Progress', 'In Review', 'Done', 'Canceled'])
            ],
            'priority' => [
                'nullable',
                Rule::in(['#1', '#2', '#3', '#4'])
            ],
            'project_id' => [
                'nullable',
                Rule::exists('projects', 'id')
            ]
        ];
    }
}
