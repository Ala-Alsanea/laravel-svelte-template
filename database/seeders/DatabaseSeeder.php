<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
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
        $this->call(
            [
                ColorSeeder::class,
                BrandSeeder::class,
                CarSeeder::class,
                RoleSeeder::class,
            ]
        );

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123'),
        ]);

        User::factory()->create([
            'name' => 'ala',
            'email' => 'aa@aa.aa',
            'password' => Hash::make('123'),

        ]);


        // set roles
        User::where('name', '=', 'Test User')->first()->roles()->attach(Role::where('data', '=', 'admin')->first());


        User::where('name', '=', 'ala')->first()->roles()->attach(Role::where('data', '=', 'author')->first());
    }
}