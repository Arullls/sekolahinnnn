<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasIds = Kelas::pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            // Buat User dulu
            $user = User::create([
                'name' => "Siswa Contoh $i",
                'email' => "siswa{$i}@sekolah.com",
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'kelas_id' => $kelasIds[array_rand($kelasIds)],
            ]);

            // Buat entri di tabel siswa
            Siswa::create([
                'nis'            => "202500$i",
                'nama'           => $user->name,
                'email'          => $user->email,
                'kelas_id'       => $user->kelas_id,
                'user_id'        => $user->id,
                'jenis_kelamin'  => $i % 2 == 0 ? 'P' : 'L',
                'tanggal_lahir'  => now()->subYears(10 + $i)->format('Y-m-d'),
                'no_hp'          => '08123456789' . $i,
                'alamat'         => 'Jl. Contoh Alamat No. ' . $i,
                'foto'           => null,
                'tahun_masuk'    => 2020 + rand(0, 2),
                'aktif'          => true,
            ]);
        }
    }
}
