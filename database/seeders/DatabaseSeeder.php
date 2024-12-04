<?php

namespace Database\Seeders;

use App\Models\Day;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $days = ["Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag"];

        foreach ($days as $day) {
        Day::factory()->create([
            'name' => $day
        ]);
        }

        //Create an Admin user with a secure password
        User::factory()->create([
            'name' => 'John Doe',
            'email' => config('admin.email'),
            'password' => password_hash(config('admin.password'), PASSWORD_DEFAULT),
            'role' => 42,
            'phone_number' => null,
            'branch_id' => null
        ]);

    }
}
