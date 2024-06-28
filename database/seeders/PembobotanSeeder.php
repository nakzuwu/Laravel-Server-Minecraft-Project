<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembobotan; // Import model Pembobotan

class PembobotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create data using Pembobotan model
        Pembobotan::create([
            'w1' => 5,
            'w2' => 5,
            'w3' => 3,
            'w4' => 2,
            'w5' => 5,
            'w6' => 1,
        ]);
    }
}
