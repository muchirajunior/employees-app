<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


         $user = User::create([
            'name' => 'Muchira Junior',
            'email' => 'junior@example.com',
            'password'=>'1234'
        ]);

        $team = Team::create([
            'name' => 'Juniors',
            'slug' => 'jn',
        ]);

        $team->members()->attach($user);

        Country::factory()->count(100)->create();
        State::factory()->count(40)->create();
        City::factory()->count(80)->create();
        Department::factory()->count(10)->create();
        Employee::factory()->count(100)->create();
        
    }
}
