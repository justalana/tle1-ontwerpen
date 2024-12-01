<?php

namespace Database\Seeders;

use App\Models\Day;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

    }
}
