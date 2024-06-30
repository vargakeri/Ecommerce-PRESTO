<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\User::factory(1)->create(['name' => 'revisor', 'password' => 'revisor', 'is_revisor' => true]);


        \App\Models\User::factory(10)->create();

        \App\Models\User::factory(5)->create([
            'name' => 'Test User',
            'password' => 'admin',

        ]);
    }
}
