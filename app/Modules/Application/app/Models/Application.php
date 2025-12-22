<?php

namespace Modules\Application\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Application\app\Enums\ApplicationStatus;
use Modules\Job\app\Models\Job;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'job_id',
        'candidate_id',
        'cv_path',
        'status',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
