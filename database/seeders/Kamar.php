<?php

namespace Database\Seeders;

use App\Models\Kamar as ModelsKamar;
use Illuminate\Database\Seeder;

class Kamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nomor' => '101', 
                'lantai' => '1', 
                'tipe' => 'Superior', 
                'harga' => '650000', 
                'deskripsi' => 'Kamar ukuran 32" AC TV',
            ]
        ];

        foreach ($data as $key => $value) {
            ModelsKamar::create($value);
        }
    }
}
