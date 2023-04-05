<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'role' => 'pembeli',
            'name' => 'Test Pembeli',
            'email' => 'pembeli@modernland.com',
            'password' => Hash::make('123')
        ]);

        \App\Models\User::factory()->create([
            'role' => 'penjual',
            'name' => 'Test Penjual',
            'email' => 'penjual@modernland.com',
            'password' => Hash::make('123')
        ]);
    }
}
