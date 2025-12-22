<?php

namespace Modules\Application\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $fillable = [
        'email',
        'full_name',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'candidate_id');
    }
}
