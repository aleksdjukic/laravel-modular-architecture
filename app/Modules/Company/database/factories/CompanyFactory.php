<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Company\app\Models\Company;
use Modules\Auth\app\Models\User;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'name' => $this->faker->company(),
            'slug' => Str::slug($this->faker->company() . uniqid()),
            'email' => $this->faker->companyEmail(),
            'is_active' => true,
        ];
    }
}
