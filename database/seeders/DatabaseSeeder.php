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

        \App\Models\Toko::factory()->create([
            'user_id' => '2',
            'nama_toko' => 'Test Toko',
            'nama_pemilik' => 'Test Pemilik',
            'no_telepon' => '081234567890',
            'kategori' => 'Sayuran',
            'lokasi' => 'Lantai 2 A-1'
        ]);

        \App\Models\Barang::factory()->create([
            'toko_id' => '1',
            'foto' => 'undifined',
            'nama_barang' => 'Kangkung',
            'harga' => 2000,
            'kategori' => 'Sayur',
            'deskripsi' => 'Sayuran Segar Dari Sawah'
        ]);

        \App\Models\Barang::factory()->create([
            'toko_id' => '1',
            'foto' => 'undifined',
            'nama_barang' => 'Bayem',
            'harga' => 3000,
            'kategori' => 'Sayur',
            'deskripsi' => 'Sayuran Segar Dari Sawah'
        ]);

        \App\Models\Barang::factory()->create([
            'toko_id' => '1',
            'foto' => 'undifined',
            'nama_barang' => 'Sawi',
            'harga' => 5000,
            'kategori' => 'Sayur',
            'deskripsi' => 'Sayuran Segar Dari Sawah'
        ]);
    }
}
