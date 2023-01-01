<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Hash;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'ala',
            'email' => 'aa@aa.aa',
            'password' => Hash::make('123'),
        ]);

        $this->call(
            [
                ColorSeeder::class,
                BrandSeeder::class,
                CarSeeder::class,
            ]
        );
    }
}
