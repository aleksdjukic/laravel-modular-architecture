<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Job\app\Models\Job;
use Modules\Company\app\Models\Company;
use Modules\Job\app\Enums\EmploymentType;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'employment_type' => EmploymentType::FULL_TIME->value,
            'salary_from' => 1000,
            'salary_to' => 3000,
            'is_active' => true,
        ];
    }
}
