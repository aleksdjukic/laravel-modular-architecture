<?php

namespace Modules\Application\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyForJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // public endpoint
    }

    public function rules(): array
    {
        return [
            'job_id' => ['required', 'integer', 'exists:jobs,id'],
            'email' => ['required', 'email', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'cv_path' => ['nullable', 'string', 'max:2048'],
        ];
    }
}
