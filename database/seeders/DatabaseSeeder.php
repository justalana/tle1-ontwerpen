<?php

namespace Database\Seeders;

use App\Models\Day;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Requirement;
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

        if (Day::all()->isEmpty()) {

            foreach ($days as $day) {
                Day::factory()->create([
                    'name' => $day
                ]);
            }

        }

        //Create an Admin user with a secure password

        if (User::where('role', '=', 42)->get()->isEmpty()) {

            $admin = User::factory()->create([
                'name' => 'John Doe',
                'email' => config('admin.email'),
                'password' => password_hash(config('admin.password'), PASSWORD_DEFAULT),
                'role' => 42,
                'phone_number' => null,
                'branch_id' => null
            ]);

        } else {

            $admin = User::firstWhere('role', '=', 42);

        }


        //Create a few standard requirements for use in making vacancies
        $requirementNames = ['Rijbewijs', '16 of ouder', '18 of ouder'];

        foreach ($requirementNames as $requirementName) {

            if (Requirement::firstWhere('name', '=', $requirementName)) {
                continue;
            }

            Requirement::factory()->create([
                'user_id' => $admin->id,
                'name' => $requirementName
            ]);

        }

    }
}
