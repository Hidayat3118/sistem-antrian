<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Antrian;
use App\Models\Rekap;
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

        Admin::create([
            'nama' => 'Hidayat',
            'username' => 'Dayat',
            'password' => Hash::make('1234'),
        ]);

        
        $rekaps = [
            [
                'tanggal' => '2024-11-20',
                'jmblh_umum' => 20,
                'jmblh_prioritas' => 12,
                'tdk_dilayani' => 5,
            ],
            [
                'tanggal' => '2024-1-2',
                'jmblh_umum' => 21,
                'jmblh_prioritas' => 2,
                'tdk_dilayani' => 2,
            ],
            [
                'tanggal' => '2024-12-2',
                'jmblh_umum' => 19,
                'jmblh_prioritas' => 4,
                'tdk_dilayani' => 0,
            ],
            [
                'tanggal' => '2024-12-18',
                'jmblh_umum' => 30,
                'jmblh_prioritas' => 18,
                'tdk_dilayani' => 7,
            ],
        ];

        foreach ($rekaps as $rekap){
            Rekap::create($rekap);
        }
        

        for ($i = 1; $i < 10; $i++) {
            Antrian::create([
                'nomor_antrian' => 'B' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'isPriority' => false,
                'tanggal' => '2024-11-20', // Tanggal acak
                'waktu' => '08:10:01', // Waktu acak
                'no_telp' => '083141636743', // Nomor telepon acak
            ]);
        }

        for ($i = 1; $i < 10; $i++) {
            Antrian::create([
                'nomor_antrian' => 'A' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'isPriority' => true,
                'tanggal' => '2024-11-20', // Tanggal acak
                'waktu' => '08:10:01', // Waktu acak
                'no_telp' => '083141636743', // Nomor telepon acak
            ]);
        }
    }
}
