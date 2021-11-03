<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        User::create([
            "name" => $faker->name(),
            "email" => "password@password.com",
            "password" => Hash::make("password123")
        ]);

        \App\Models\Contact::factory(10)->create();
    }
}
