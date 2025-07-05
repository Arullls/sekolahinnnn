<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'nama_kelas' => '8A',
                'tahun_ajaran' => '2024/2025',
            ],
            [
                'nama_kelas' => '9B',
                'tahun_ajaran' => '2024/2025',
            ],
            [
                'nama_kelas' => '7C',
                'tahun_ajaran' => '2024/2025',
            ],
        ]);
    }
}
