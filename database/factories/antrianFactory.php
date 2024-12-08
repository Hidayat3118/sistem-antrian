<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class antrianFactory extends Factory
{
    public function definition()
    {
        // Penentuan prioritas secara acak
        $isPrioritas = $this->faker->boolean(30); // 30% prioritas, 70% umum
        $prefix = $isPrioritas ? 'A' : 'B'; // "A" untuk prioritas, "B" untuk umum
        $number = str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT); // Format nomor "001"


        return [
            'nomor_antrian' => $prefix . $number, // Contoh: "A001" atau "B001"
            'isPriority' => $isPrioritas, // true untuk prioritas, false untuk umum
            'tanggal' => $this->faker->date(), // Tanggal acak
            'waktu' => $this->faker->time(), // Waktu acak
            'no_telp' => $this->faker->phoneNumber(), // Nomor telepon acak
        ];
    }
}
