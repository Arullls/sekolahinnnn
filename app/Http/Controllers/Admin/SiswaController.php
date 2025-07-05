<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        $siswa = Siswa::latest()->get();
        return view('admin.siswa.index', compact('siswa'));
    }
}
