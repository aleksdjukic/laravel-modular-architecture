<?php

namespace Modules\Job\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Job\app\Enums\EmploymentType;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user();
    }

    public function rules(): array
    {
        return [
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['required', Rule::in(EmploymentType::values())],
            'salary_from' => ['nullable', 'numeric', 'min:0'],
            'salary_to' => ['nullable', 'numeric', 'gte:salary_from'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
