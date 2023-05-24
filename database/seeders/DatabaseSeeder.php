<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Client::factory(5)->create();
        \App\Models\Service::factory(5)->create();
        \App\Models\invoice::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Kamila',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Super',
            'email' => 'supervisor@gmail.com',
            'role' => 'supervisor',
            'password' => bcrypt('12345678'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Data',
            'email' => 'dataencoder@gmail.com',
            'role' => 'dataencoder',
            'password' => bcrypt('12345678'),
        ]);
    }
}
