<?php

namespace Modules\Company\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Auth\app\Models\User;
use Modules\Job\app\Models\Job;

class Company extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'slug',
        'email',
        'phone',
        'website',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
