<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'middle_name' => fake()->firstName(),
            'address' => fake()->address(),
            'zip_code' => fake()->numberBetween(10000, 99999),
            'date_of_birth' => fake()->date(),
            'date_of_hire' => fake()->date(),
            'country_id' => Country::inRandomOrder()->first()->id,
            'state_id' => State::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'department_id' => Department::inRandomOrder()->first()->id,
            'team_id'=> Team::inRandomOrder()->first()->id,
        ];
    }
}
