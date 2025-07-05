@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@section('content')
    @include('components.breadcrumb', ['pageTitle' => $pageTitle, 'breadcrumbs' => $breadcrumbs])
    <div class="flex flex-col lg:flex-row gap-6">
        {{-- KIRI: Form Tambah Menu --}}
        <div class="w-full lg:w-1/2 p-6 bg-white rounded-xl shadow-md border border-blue-100 bg-opacity-80 backdrop-blur-lg">


            <h2 class="text-2xl font-bold text-blue-800 mb-6 border-b pb-2 border-blue-300">Tambah Menu Baru</h2>

            <form id="form-menu" class="grid grid-cols-1 gap-6">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-blue-800 mb-1">Judul Menu</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: Dashboard" required />
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-blue-800 mb-1">Ikon (Emoji atau
                        LineIcon)</label>
                    <input type="text" name="icon" id="icon"
                        class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: 📁 atau lni-home" required />
                </div>

                <div>
                    <label for="route" class="block text-sm font-medium text-blue-800 mb-1">Route</label>
                    <input type="text" name="route" id="route"
                        class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: admin.dashboard" required />
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-blue-800 mb-1">Urutan</label>
                    <input type="number" name="order" id="order" value="1"
                        class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                </div>

                <div>
                    <label for="parent_id" class="block text-sm font-medium text-blue-800 mb-1">Parent Menu
                        (Opsional)</label>
                    <select name="parent_id" id="parent_id"
                        class="w-full px-4 py-2 border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- Tidak ada --</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" id="btn-submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md shadow transition flex justify-center items-center gap-2">
                        <svg id="btn-spinner" class="animate-spin h-5 w-5 text-white hidden"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span id="btn-text">Simpan Menu</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- KANAN: Daftar Menu --}}
        <div class="w-full lg:w-3/5 p-6 bg-white rounded-xl shadow-md border border-blue-100 max-w-full">
            <h2 class="text-2xl font-bold text-blue-800 mb-4 border-b pb-2 border-blue-300">Daftar Menu</h2>
            <div class="overflow-x-auto max-h-[600px] border border-blue-100 rounded-md">
                <table class="min-w-full table-auto text-sm text-left text-blue-800 border-collapse">
                    <thead class="bg-blue-50 text-xs text-blue-600 uppercase border-b border-blue-200">
                        <tr>
                            <th class="px-5 py-3">Judul</th>
                            <th class="px-5 py-3">Route</th>
                            <th class="px-5 py-3">Ikon</th>
                            <th class="px-5 py-3">Parent</th>
                            <th class="px-5 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            {{-- Parent menu --}}
                            <tr class="border-b border-blue-100 bg-blue-100 font-semibold hover:bg-blue-200 transition-colors duration-200 cursor-default"
                                id="menu-row-{{ $menu->id }}">
                                <td class="px-5 py-3">{{ $menu->title }}</td>
                                <td class="px-5 py-3 text-sm">{{ $menu->route }}</td>
                                <td class="px-5 py-3 text-lg">{!! $menu->icon !!}</td>
                                <td class="px-5 py-3 text-gray-400 text-center">-</td>
                                <td class="px-5 py-3 text-center">
                                    <button type="button" onclick="hapusMenu({{ $menu->id }})"
                                        class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 transition-colors duration-200 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            {{-- Children --}}
                            @foreach ($menu->children->sortBy('order') as $child)
                                <tr class="border-b border-blue-100 hover:bg-blue-50 transition-colors duration-150"
                                    id="menu-row-{{ $child->id }}">
                                    <td class="px-5 py-3 pl-12 flex items-center gap-2 text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                        {{ $child->title }}
                                    </td>
                                    <td class="px-5 py-3 text-sm">{{ $child->route }}</td>
                                    <td class="px-5 py-3 text-lg">{!! $child->icon !!}</td>
                                    <td class="px-5 py-3 text-center">
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                            {{ $menu->title }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3 text-center">
                                        <button type="button" onclick="hapusMenu({{ $child->id }})"
                                            class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 transition-colors duration-200 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>
@endsection

@section('scripts')
    <script>
        // Simpan Menu
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-menu');
            const btnSubmit = document.getElementById('btn-submit');
            const btnSpinner = document.getElementById('btn-spinner');
            const btnText = document.getElementById('btn-text');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Disable tombol dan tampilkan spinner
                btnSubmit.disabled = true;
                btnSpinner.classList.remove('hidden');
                btnText.textContent = 'Menyimpan...';

                const data = {
                    title: form.title.value.trim(),
                    icon: form.icon.value.trim(),
                    route: form.route.value.trim(),
                    order: form.order.value.trim() || 1,
                    parent_id: form.parent_id.value || null,
                };

                axios.post("{{ route('admin.menu.store') }}", data)
                    .then(response => {
                        alert('Menu berhasil ditambah!');
                        form.reset();
                        location.reload();
                    })
                    .catch(error => {
                        if (error.response && error.response.data.errors) {
                            let messages = [];
                            for (const key in error.response.data.errors) {
                                messages.push(error.response.data.errors[key].join('\n'));
                            }
                            alert('Error:\n' + messages.join('\n'));
                        } else {
                            alert('Gagal menyimpan menu. Coba lagi.');
                        }
                    })
                    .finally(() => {
                        // Enable tombol dan sembunyikan spinner kembali
                        btnSubmit.disabled = false;
                        btnSpinner.classList.add('hidden');
                        btnText.textContent = 'Simpan Menu';
                    });
            });
        });


        // Fungsi hapus harus di global scope
        function hapusMenu(id) {
            if (!confirm('Yakin mau hapus menu ini?')) return;

            axios.delete(`/api/menu/${id}`)
                .then(response => {
                    alert('Menu berhasil dihapus');
                    location.reload();
                })
                .catch(error => {
                    alert('Gagal hapus menu');
                    console.error(error);
                });
        }

        // Pastikan global diakses
        window.hapusMenu = hapusMenu;
    </script>
    </script>
@endsection
