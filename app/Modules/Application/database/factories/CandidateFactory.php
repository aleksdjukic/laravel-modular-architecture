<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Application\app\Models\Candidate;

class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'full_name' => $this->faker->name(),
        ];
    }
}
