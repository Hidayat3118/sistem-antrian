<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Antrian;
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
        // User::factory(10)->create();

        Admin::create([
            'nama' => 'Abu Husein',
            'username' => 'Husein',
            'password' => Hash::make('1234'),
        ]);

        for ($i = 1; $i < 10; $i++) {
            Antrian::create([
                'nomor_antrian' => 'B' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'isPriority' => false,
                'tanggal' => '2024-11-20', // Tanggal acak
                'waktu' => '08:10:01', // Waktu acak
                'no_telp' => '087815338021', // Nomor telepon acak
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            Antrian::create([
                'nomor_antrian' => 'A' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'isPriority' => true,
                'tanggal' => '2024-11-20', // Tanggal acak
                'waktu' => '08:10:01', // Waktu acak
                'no_telp' => '087815338021', // Nomor telepon acak
            ]);
        }
    }
}
