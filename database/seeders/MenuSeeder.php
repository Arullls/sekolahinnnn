<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('menus')->truncate();

        // Insert induk dulu
        $parentId = DB::table('menus')->insertGetId([
            'title' => 'Pengaturan',
            'icon' => '⚙️',  // bisa emoji atau icon lain
            'route' => '#',  // gak perlu route kalo hanya induk
            'order' => 5,
            'parent_id' => null,
        ]);

        // Insert menu-menu lain
        Menu::insert([
            ['title' => 'Dashboard', 'icon' => '🏠', 'route' => 'admin/dashboard', 'order' => 1, 'parent_id' => null],
            ['title' => 'Siswa', 'icon' => '👨‍🎓', 'route' => '/siswa', 'order' => 2, 'parent_id' => null],
            ['title' => 'Ujian', 'icon' => '📝', 'route' => '/ujian', 'order' => 3, 'parent_id' => null],
            ['title' => 'Laporan', 'icon' => '📊', 'route' => '/laporan', 'order' => 4, 'parent_id' => null],

            // Submenu Pengaturan, parent_id = $parentId
            ['title' => 'Menu', 'icon' => '📋', 'route' => '/pengaturan/menu', 'order' => 1, 'parent_id' => $parentId],
            ['title' => 'User', 'icon' => '👤', 'route' => '/pengaturan/user', 'order' => 2, 'parent_id' => $parentId],
            // bisa tambah sub menu lain
        ]);
    }
}
