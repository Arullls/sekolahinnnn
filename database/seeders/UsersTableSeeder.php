<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolahin.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'kelas_id' => null,
        ]);

        // Guru
        User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru.mat@mail.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
            'kelas_id' => null,
        ]);

        // Siswa (contoh ada kelas 1)
        User::create([
            'name' => 'Siswa SD 1A',
            'email' => '1234567890',  // Bisa pakai NISN sebagai email
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
            'kelas_id' => 1,
        ]);

        // Orang Tua
        User::create([
            'name' => 'Orang Tua Siswa 1A',
            'email' => 'ortu1@mail.com',
            'password' => Hash::make('ortu123'),
            'role' => 'ortu',
            'kelas_id' => null,
        ]);
    }
}
