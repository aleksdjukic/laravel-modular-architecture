<?php

namespace Modules\Job\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Application\app\Models\Application;
use Modules\Company\app\Models\Company;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'location',
        'employment_type',
        'salary_from',
        'salary_to',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'salary_from' => 'decimal:2',
        'salary_to' => 'decimal:2',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
