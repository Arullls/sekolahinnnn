<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaApiController extends Controller
{
    public function index()
    {


        return Siswa::with('kelas')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswa',
            'nama' => 'required',
            'email' => 'required|email|unique:siswa',
            'kelas' => 'required',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $siswa = Siswa::create($validated);

        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json(['message' => 'Siswa berhasil dihapus']);
    }
}
