<?php

namespace Modules\Application\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Application\app\Enums\ApplicationStatus;

class UpdateApplicationStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) $this->user();
    }

    public function rules(): array
    {
        return [
            'status' => [
                'required',
                'string',
                Rule::in(array_map(fn ($c) => $c->value, ApplicationStatus::cases())),
            ],
        ];
    }
}
