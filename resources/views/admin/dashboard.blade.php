@extends('layouts.app')

@section('title', 'Dashboard - Sekolahin')

@section('content')
    <h2 class="text-3xl font-semibold mb-6">
        Halo, {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }}) 👋
    </h2>
    
    <p class="mb-8 text-gray-700 max-w-xl">
        Selamat datang di dashboard aplikasi ujian sekolah. Kamu bisa mengakses soal, hasil ujian, dan fitur lainnya di
        sini.
    </p>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600 hover:shadow-lg transition">
            <h3 class="font-semibold text-lg mb-2">Jumlah Soal</h3>
            <p class="text-3xl font-bold text-blue-700">120</p>
        </div>
        <!-- Tambah card lainnya -->
    </section>
@endsection
