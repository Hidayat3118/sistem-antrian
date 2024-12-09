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

        Antrian::factory()->count(50)->create();
    }
}
