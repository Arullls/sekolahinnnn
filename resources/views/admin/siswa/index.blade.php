@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-blue-800 mb-6 border-b pb-2 border-blue-300">Daftar Siswa</h2>

        <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-blue-100">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="text-xs uppercase bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">NIS</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Kelas</th>
                        <th class="px-6 py-3">Jenis Kelamin</th>
                        <th class="px-6 py-3">Tanggal Lahir</th>
                        <th class="px-6 py-3">No HP</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">Tahun Masuk</th>
                        <th class="px-6 py-3">Aktif</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody id="siswa-table-body" class="bg-white divide-y divide-blue-100">
                    {{-- Data diisi oleh JS --}}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Pastikan axios sudah di-setup dengan withCredentials = true di bootstrap.js atau di sini juga
        axios.defaults.withCredentials = true;

        // Fungsi load data siswa dari API
        function loadSiswa() {
            axios.get('/api/siswa')
                .then(response => {
                    const siswa = response.data;
                    const tbody = document.getElementById('siswa-table-body');
                    tbody.innerHTML = '';

                    siswa.forEach((item, index) => {
                        const kelasNama = item.kelas ? item.kelas.nama : '-';
                        const aktifText = item.aktif ? 'Ya' : 'Tidak';

                        const row = `
                            <tr>
                                <td class="px-6 py-4">${index + 1}</td>
                                <td class="px-6 py-4">${item.nis}</td>
                                <td class="px-6 py-4">${item.nama}</td>
                                <td class="px-6 py-4">${item.email}</td>
                                <td class="px-6 py-4">${kelasNama}</td>
                                <td class="px-6 py-4">${item.jenis_kelamin || '-'}</td>
                                <td class="px-6 py-4">${item.tanggal_lahir || '-'}</td>
                                <td class="px-6 py-4">${item.no_hp || '-'}</td>
                                <td class="px-6 py-4">${item.alamat || '-'}</td>
                                <td class="px-6 py-4">${item.tahun_masuk || '-'}</td>
                                <td class="px-6 py-4">${aktifText}</td>
                                <td class="px-6 py-4">
                                    <button onclick="hapusSiswa(${item.id})" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });
                })
                .catch(error => {
                    console.error('Gagal ambil data siswa:', error);
                });
        }

        // Fungsi hapus siswa
        function hapusSiswa(id) {
            if (confirm('Yakin mau hapus siswa ini?')) {
                axios.delete(`/api/siswa/${id}`)
                    .then(res => {
                        alert(res.data.message);
                        loadSiswa(); // Refresh data setelah hapus
                    })
                    .catch(err => {
                        console.error('Gagal hapus siswa:', err);
                        alert('Gagal hapus siswa');
                    });
            }
        }

        // Panggil load data pas halaman sudah siap
        document.addEventListener('DOMContentLoaded', loadSiswa);
    </script>
@endsection
