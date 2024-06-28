<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('kriterias')->insert([
            ['nama_kriteria' => 'harga', 'bobot' => 5],
            ['nama_kriteria' => 'cpu', 'bobot' => 5],
            ['nama_kriteria' => 'ram', 'bobot' => 3],
            ['nama_kriteria' => 'storage', 'bobot' => 2],
            ['nama_kriteria' => 'ping', 'bobot' => 4],
            ['nama_kriteria' => 'backup', 'bobot' => 1],
        ]);
    }
}
