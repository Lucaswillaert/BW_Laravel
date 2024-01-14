<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        // Default user
        for ($i = 0; $i < 50; $i++) {

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'about_me' => $faker->text($maxNbChars = 200),
                'is_admin' => false,
            ]);
        }

         // Default admin user
         DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'date_of_birth' => '2000-01-01',
            'about_me' => 'Default admin user',
            'is_admin' => true,
        ]);
    }
}
