<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //clear table
        User::truncate();

        User::create([
            'name' => 'username',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::factory(1)->create();  // is admin

        School::factory(5)->create()
            ->each(function ($school){
                Student::factory(20)->create([
                    'school_id' => $school['id']
                ]);
            });
    }
}
