<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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

        \App\Models\Keranjang::factory()->create([
            'user_id' => '1',
            'barang_id' => '1',
            'jumlah' => 2,
            'total' => 4000,
            'catatan' => 'Diambil Hari Senin'
        ]);

        \App\Models\Keranjang::factory()->create([
            'user_id' => '1',
            'barang_id' => '2',
            'jumlah' => 3,
            'total' => 9000,
            'catatan' => 'Diambil Hari Selasa'
        ]);

        \App\Models\Keranjang::factory()->create([
            'user_id' => '1',
            'barang_id' => '3',
            'jumlah' => 2,
            'total' => 10000,
            'catatan' => 'Diambil Hari Sabtu'
        ]);

        \App\Models\PesananBaru::factory()->create([
            'user_id' => '1',
            'barang_id' => '1',
            'jumlah' => 2,
            'total' => 10000,
            'catatan' => 'Diambil Hari Sabtu',
            'metode' => 'gopay',
            'batas_response' => Carbon::now()->addDay()
        ]);

        \App\Models\PesananSiap::factory()->create([
            'user_id' => '1',
            'barang_id' => '1',
            'jumlah' => 2,
            'total' => 10000,
            'catatan' => 'Diambil Hari Sabtu',
            'metode' => 'gopay',
            'waktu_pengambilan' => Carbon::now()->addDay()
        ]);

        \App\Models\PesananSelesai::factory()->create([
            'user_id' => '1',
            'barang_id' => '1',
            'jumlah' => 2,
            'total' => 10000,
            'catatan' => 'Diambil Hari Sabtu',
            'metode' => 'gopay',
            'waktu_pengambilan' => Carbon::now()->addDay()
        ]);

    }
}
