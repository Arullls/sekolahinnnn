<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>

        SISTER - Sistem Informasi Terpadu Kabupaten Gorontalo Utara</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFC107',
                        secondary: '#FF7700',
                        dark: '#212121',
                        light: '#F5F5F5',
                        warning: '#FFC107',
                        danger: '#DC3545',
                        success: '#28A745',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <script>
        function showComingSoon() {
            document.getElementById("comingSoonModal").classList.remove("hidden");
        }

        function hideComingSoon() {
            document.getElementById("comingSoonModal").classList.add("hidden");
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notifBtn = document.getElementById("notificationBtn");
            const notifPanel = document.getElementById("notificationPanel");

            notifBtn.addEventListener("click", (e) => {
                e.stopPropagation(); // Biar klik gak tembus
                notifPanel.classList.toggle("hidden");
            });

            // Klik di luar = tutup
            document.addEventListener("click", function(e) {
                if (!notifBtn.contains(e.target) && !notifPanel.contains(e.target)) {
                    notifPanel.classList.add("hidden");
                }
            });
        });
    </script>



    <style>
        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 9999px;
            display: inline-block;
            margin-right: 6px;
            margin-top: 4px;
        }

        .status-danger {
            background-color: #DC3545;
        }

        .status-warning {
            background-color: #FFC107;
        }

        .status-good {
            background-color: #28A745;
        }
    </style>




    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F5F5;
        }

        .gradient-header {
            background: linear-gradient(135deg, #FFC107 0%, #FF7700 100%);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #DC3545;
            color: white;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slide-container {
            overflow: hidden;
            position: relative;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
        }

        .slide-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .indicator.active {
            background-color: white;
        }

        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 5px;
        }

        .status-good {
            background-color: #28A745;
        }

        .status-warning {
            background-color: #FFC107;
        }

        .status-danger {
            background-color: #DC3545;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-icon {
            transition: all 0.3s ease;
        }

        .nav-icon:hover {
            transform: translateY(-3px);
            color: #FF7700;
        }

        .chart-container {
            height: 250px;
            position: relative;
        }

        .map-container {
            height: 400px;
            background-color: #e9ecef;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .map-marker {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .map-tooltip {
            position: absolute;
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            z-index: 10;
            display: none;
        }

        .notification-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .notification-panel.open {
            max-height: 400px;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>




</head>


<body>
    <!-- Header -->
    <header class="gradient-header text-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="mr-3">
                        <!-- Logo SVG -->
                        <svg class="w-12 h-12" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="45" fill="#212121" />
                            <path d="M30 40 L50 25 L70 40 L70 70 L30 70 Z" fill="#FFC107" />
                            <path d="M40 50 L60 50 M40 60 L60 60" stroke="#212121" stroke-width="3" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">SISTER</h1>
                        <p class="text-xs">Sistem Informasi Terpadu Kabupaten Gorontalo Utara</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 relative">
                    <!-- Search Icon -->
                    <button id="toggleSearchBtn" class="p-2 text-white">
                        <i class="fas fa-search text-xl"></i>
                    </button>

                    <!-- Search Input (hidden default) -->
                    <input id="searchInput" type="text" placeholder="Cari..."
                        class="hidden px-3 py-1 rounded-md text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-primary border border-gray-300 bg-white transition-all duration-200" />

                    <!-- Notifikasi -->
                    <div class="relative">
                        <button id="notificationBtn" class="relative p-2 text-white">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="notification-badge">3</span>
                        </button>

                        <!-- Popup Notifikasi Mini -->
                        <div id="notificationPanel"
                            class="hidden absolute right-0 mt-2 w-72 bg-white text-dark rounded-lg shadow-lg z-50">
                            <div class="p-4">
                                <h3 class="font-bold text-sm mb-2">Notifikasi</h3>
                                <div class="space-y-3 max-h-60 overflow-y-auto text-sm">
                                    <div class="flex items-start p-2 border-b border-gray-200">
                                        <span class="status-indicator status-danger mt-1"></span>
                                        <div>
                                            <p class="font-medium">Peringatan Banjir</p>
                                            <p class="text-xs text-gray-600">Kecamatan Kwandang, status bahaya.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start p-2 border-b border-gray-200">
                                        <span class="status-indicator status-warning mt-1"></span>
                                        <div>
                                            <p class="font-medium">Infrastruktur</p>
                                            <p class="text-xs text-gray-600">Jembatan rusak ringan</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start p-2">
                                        <span class="status-indicator status-good mt-1"></span>
                                        <div>
                                            <p class="font-medium">Layanan Publik</p>
                                            <p class="text-xs text-gray-600">Dokumen Anda disetujui</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="#" class="text-secondary text-sm font-medium hover:underline">Lihat
                                        semua</a>
                                </div>
                            </div>
                        </div>

                        <!-- Akun -->
                        <button class="p-2 text-white">
                            <i class="fas fa-user-circle text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        </div>

        <!-- Navigation Icons -->
        <nav class="bg-white shadow-sm py-3">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-5 gap-2 text-center">
                    <a href="#berita" class="nav-icon flex flex-col items-center">
                        <i class="fas fa-newspaper text-dark text-xl mb-1"></i>
                        <span class="text-xs text-gray-600">Berita</span>
                    </a>
                    <a href="#informasi" class="nav-icon flex flex-col items-center">
                        <i class="fas fa-info-circle text-dark text-xl mb-1"></i>
                        <span class="text-xs text-gray-600">Informasi</span>
                    </a>
                    <a href="#layanan" class="nav-icon flex flex-col items-center">
                        <i class="fas fa-hands-helping text-dark text-xl mb-1"></i>
                        <span class="text-xs text-gray-600">Layanan</span>
                    </a>
                    <a href="#statistik" class="nav-icon flex flex-col items-center">
                        <i class="fas fa-chart-bar text-dark text-xl mb-1"></i>
                        <span class="text-xs text-gray-600">Statistik</span>
                    </a>
                    <a href="#profil" class="nav-icon flex flex-col items-center">
                        <i class="fas fa-building text-dark text-xl mb-1"></i>
                        <span class="text-xs text-gray-600">Profil</span>
                    </a>
                </div>
            </div>
        </nav>
    </header>



    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <!-- Image Slider -->
        <section class="slide-container rounded-xl overflow-hidden shadow-lg mb-8">
            <div class="slides" id="slides">
                <div class="slide relative">
                    <div
                        class="relative bg-gradient-to-r from-primary to-secondary h-64 flex items-center justify-center overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                            alt="Pembangunan Jembatan"
                            class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none" />
                        <div class="relative text-center text-white p-6">
                            <h2 class="text-2xl font-bold mb-2">Pembangunan Jembatan Baru</h2>
                            <p class="mb-4">Penghubung desa untuk akses yang lebih baik dan cepat</p>
                            <button
                                class="bg-white text-secondary px-4 py-2 rounded-full font-medium">Selengkapnya</button>
                        </div>
                    </div>

                </div>
                <div class="slide relative">
                    <div
                        class="relative bg-gradient-to-r from-secondary to-dark h-64 flex items-center justify-center overflow-hidden">
                        <!-- Gambar di belakang, opacity kecil supaya gradien tetap kelihatan -->
                        <img src="https://picsum.photos/800/400?grayscale&random=20"
                            alt="Revitalisasi Pasar Tradisional"
                            class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none" />
                        <div class="relative text-center text-white p-6">
                            <h2 class="text-2xl font-bold mb-2">Revitalisasi Pasar Tradisional</h2>
                            <p class="mb-4">Meningkatkan fasilitas dan kenyamanan pasar tradisional</p>
                            <button
                                class="bg-white text-secondary px-4 py-2 rounded-full font-medium">Selengkapnya</button>
                        </div>
                    </div>
                </div>

                <<div class="slide relative">
                    <div
                        class="relative bg-gradient-to-r from-dark to-primary h-64 flex items-center justify-center overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                            alt="Pembangunan Rumah Sakit"
                            class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none" />
                        <div class="relative text-center text-white p-6">
                            <h2 class="text-2xl font-bold mb-2">Pembangunan Rumah Sakit</h2>
                            <p class="mb-4">Fasilitas kesehatan modern untuk masyarakat</p>
                            <button
                                class="bg-white text-secondary px-4 py-2 rounded-full font-medium">Selengkapnya</button>
                        </div>
                    </div>
            </div>

            </div>
            <div class="slide-indicators" id="slideIndicators">
                <span class="indicator active" data-index="0"></span>
                <span class="indicator" data-index="1"></span>
                <span class="indicator" data-index="2"></span>
            </div>
        </section>



        <!-- Website Links -->
        <section class="mb-8">
            <h2 class="text-xl font-bold mb-4 text-dark">Website Resmi</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Card -->
                <a onclick="showComingSoon()"
                    class="card bg-white p-4 rounded-lg shadow-md text-center cursor-pointer">
                    <div class="bg-primary/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-landmark text-2xl text-primary"></i>
                    </div>
                    <h3 class="font-medium text-sm">Pemkab Gorontalo Utara</h3>
                </a>


                <a onclick="showComingSoon()" class="card bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="bg-secondary/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-building text-2xl text-secondary"></i>
                    </div>
                    <h3 class="font-medium text-sm">Dinas/OPD</h3>
                </a>
                <a onclick="showComingSoon()" class="card bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="bg-dark/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-map-marker-alt text-2xl text-dark"></i>
                    </div>
                    <h3 class="font-medium text-sm">Kecamatan</h3>
                </a>
                <a onclick="showComingSoon()" class="card bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-home text-2xl text-primary"></i>
                    </div>
                    <h3 class="font-medium text-sm">Desa</h3>
                </a>
            </div>
        </section>

        <!-- Banner Promosi Geser -->
        <section class="relative mb-8">
            <div class="overflow-hidden rounded-xl shadow-lg relative" id="slides">
                <div id="promoSlides" class="flex transition-all duration-700 ease-in-out" style="width: 300%">
                    <!-- Slide 1 -->
                    <div class="w-full flex-none bg-gradient-to-r from-primary to-secondary text-white px-6 py-10 sm:px-12"
                        style="width: 100%;">
                        <h2 class="text-2xl font-bold mb-2">🎯 Layanan Dokumen 1 Hari Jadi!</h2>
                        <p class="text-sm opacity-90">Proses cepat, mudah, dan tanpa antre panjang!</p>
                    </div>
                    <!-- Slide 2 -->
                    <div class="w-full flex-none bg-gradient-to-r from-secondary to-dark text-white px-6 py-10 sm:px-12"
                        style="width: 100%;">
                        <h2 class="text-2xl font-bold mb-2">💡 Cek Bantuan Sosial Sekarang</h2>
                        <p class="text-sm opacity-90">Apakah kamu terdaftar penerima bantuan tahun ini?</p>
                    </div>
                    <!-- Slide 3 -->
                    <div class="w-full flex-none bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-6 py-10 sm:px-12"
                        style="width: 100%;">
                        <h2 class="text-2xl font-bold mb-2">📚 Pendaftaran Sekolah Dibuka</h2>
                        <p class="text-sm opacity-90">Daftarkan anak Anda ke sekolah negeri favorit hari ini!</p>
                    </div>
                </div>

                <!-- Tombol Navigasi -->
                <button id="prevSlide"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-2 rounded-full shadow">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="nextSlide"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-2 rounded-full shadow">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <!-- Indicator -->
            <div class="flex justify-center mt-2 space-x-2" id="promoIndicators">
                <span class="w-3 h-3 rounded-full bg-primary/50"></span>
                <span class="w-3 h-3 rounded-full bg-gray-300"></span>
                <span class="w-3 h-3 rounded-full bg-gray-300"></span>
            </div>
        </section>



        <!-- Kategori Interaktif -->
        <section class="mb-8">
            <h2 class="text-xl font-bold text-dark mb-4">Layanan Publik</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">

                <!-- Item Kategori -->
                <div onclick="showComingSoon()"
                    class=" bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-file-alt text-primary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Layanan Dokumen</p>
                </div>

                <!-- Perizinan -->
                <div onclick="showComingSoon()"
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-clipboard-list text-secondary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Perizinan</p>
                </div>

                <!-- Bantuan Sosial -->
                <div onclick="showComingSoon()"
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-dark/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-hand-holding-heart text-dark text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Bantuan Sosial</p>
                </div>

                <!-- Layanan Kesehatan -->
                <div onclick="showComingSoon()"
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-hospital text-primary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Layanan Kesehatan</p>
                </div>

                <!-- UMKM Lokal -->
                <div onclick="showComingSoon()"
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-store text-yellow-600 text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">UMKM Lokal</p>
                </div>

                <!-- Pendaftaran Sekolah -->
                <div onclick="showComingSoon()"
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-school text-green-600 text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Pendaftaran Sekolah</p>
                </div>

            </div>
        </section>





        <!-- Modal -->
        <div id="comingSoonModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg px-6 py-5 w-[90%] max-w-sm text-center animate-fade-in">
                <h2 class="text-xl font-semibold mb-2 text-primary">🚧 Coming Soon!</h2>
                <p class="text-sm text-gray-600 mb-4">Fitur ini sedang dikembangkan.</p>
                <button onclick="hideComingSoon()"
                    class="px-4 py-2 bg-primary text-white rounded hover:bg-primary/80 transition">
                    Tutup
                </button>
            </div>
        </div>


        <!-- Live Feed / TikTok Style -->
        <section id="live-feed" class="mb-10">
            <h2 class="text-xl font-bold text-dark mb-4">🎥 Live Info / Feed Singkat</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Feed Item -->
                <!-- Feed Video YouTube -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="w-full h-64 overflow-hidden">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/gnm-ropFmIA"
                            title="PMI Gorontalo Gelar Vaksinasi Massal" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                            class="w-full h-full"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-sm mb-1">PMI Gelar Vaksinasi Massal</h3>
                        <p class="text-xs text-gray-500 mb-2">PMI Gorontalo - 30 detik</p>
                        <div class="flex items-center justify-between text-sm">
                            <button onclick="likeFeed(this)"
                                class="flex items-center text-gray-600 hover:text-pink-500 transition">
                                <i class="fas fa-heart mr-1"></i>
                                <span class="like-count">0</span>
                            </button>
                            <button onclick="commentFeed()"
                                class="flex items-center text-gray-600 hover:text-blue-500 transition">
                                <i class="fas fa-comment mr-1"></i> Komentar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feed Placeholder -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden cursor-pointer"
                    onclick="alert('Video belum tersedia. Nantikan update terbaru ya!')">
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-video-slash text-5xl text-gray-500"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-sm mb-1">Pembersihan Sampah Sungai</h3>
                        <p class="text-xs text-gray-500 mb-2">DLH Gorontalo Utara - 20 detik</p>
                        <div class="flex items-center justify-between text-sm">
                            <button onclick="event.stopPropagation(); likeFeed(this)"
                                class="flex items-center text-gray-600 hover:text-pink-500 transition">
                                <i class="fas fa-heart mr-1"></i>
                                <span class="like-count">0</span>
                            </button>
                            <button onclick="event.stopPropagation(); commentFeed()"
                                class="flex items-center text-gray-600 hover:text-blue-500 transition">
                                <i class="fas fa-comment mr-1"></i> Komentar
                            </button>
                        </div>
                    </div>
                </div>



                <!-- Feed Item 3 -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden cursor-pointer"
                    onclick="alert('Video belum tersedia. Nantikan update terbaru ya!')">
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-video-slash text-5xl text-gray-500"></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-sm mb-1">Pendaftaran Sekolah Online</h3>
                        <p class="text-xs text-gray-500 mb-2">Disdik Gorut - 18 detik</p>
                        <div class="flex items-center justify-between text-sm">
                            <button onclick="likeFeed(this)"
                                class="flex items-center text-gray-600 hover:text-pink-500 transition">
                                <i class="fas fa-heart mr-1"></i>
                                <span class="like-count">0</span>
                            </button>
                            <button onclick="commentFeed()"
                                class="flex items-center text-gray-600 hover:text-blue-500 transition">
                                <i class="fas fa-comment mr-1"></i> Komentar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <script>
            function likeFeed(btn) {
                const counter = btn.querySelector(".like-count");
                let current = parseInt(counter.innerText);
                counter.innerText = current + 1;
            }

            function commentFeed() {
                alert("Komentar fitur ini masih dummy ya, bre 😄");
            }
        </script>



        <style>
            .berita-hover::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at var(--x, 50%) var(--y, 50%),
                        rgba(255, 119, 0, 0.15),
                        transparent 50%);
                pointer-events: none;
                z-index: 1;
                transition: background-position 0.2s ease;
            }

            .berita-hover .p-4,
            .berita-hover .bg-gradient-to-r {
                position: relative;
                z-index: 2;
            }

            .berita-glow::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at var(--x, 50%) var(--y, 50%), rgba(255, 119, 0, 0.25), transparent 60%);
                pointer-events: none;
                transition: background 0.2s ease;
                z-index: 1;
            }
        </style>

        </style>


        <!-- Berita dan Pengumuman -->
        <section id="berita" class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-dark">Berita & Pengumuman</h2>
                <a href="#" class="text-secondary font-medium text-sm">Lihat Semua</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="card berita-hover bg-white rounded-lg shadow-md overflow-hidden relative group">
                    <div class="bg-gradient-to-r from-primary to-secondary h-40 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl"></i>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">12 Oktober 2023</span>
                        <h3 class="font-bold text-lg mt-1">Peresmian Jembatan Baru di Kecamatan Kwandang</h3>
                        <p class="text-gray-600 text-sm mt-2">Bupati Gorontalo Utara meresmikan jembatan baru yang
                            menghubungkan dua desa di Kecamatan Kwandang.</p>
                        <a href="#" class="text-secondary font-medium text-sm mt-3 inline-block">Baca
                            selengkapnya</a>
                    </div>
                </div>
                <div class="card berita-hover bg-white rounded-lg shadow-md overflow-hidden relative group">
                    <div
                        class="relative group overflow-hidden bg-gradient-to-r from-secondary to-dark h-40 flex items-center justify-center berita-glow">
                        <i class="fas fa-bullhorn text-white text-4xl z-10"></i>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">10 Oktober 2023</span>
                        <h3 class="font-bold text-lg mt-1">Pengumuman Penerimaan CPNS 2023</h3>
                        <p class="text-gray-600 text-sm mt-2">Pemerintah Kabupaten Gorontalo Utara membuka pendaftaran
                            CPNS untuk berbagai formasi tahun 2023.</p>
                        <a href="#" class="text-secondary font-medium text-sm mt-3 inline-block">Baca
                            selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>


        <script>
            document.querySelectorAll('.berita-glow').forEach(area => {
                area.addEventListener('mousemove', (e) => {
                    const rect = area.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    area.style.setProperty('--x', `${x}px`);
                    area.style.setProperty('--y', `${y}px`);
                });

                area.addEventListener('mouseleave', () => {
                    area.style.setProperty('--x', `50%`);
                    area.style.setProperty('--y', `50%`);
                });
            });
        </script>




        <!-- Informasi Publik -->
        <section id="informasi" class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-dark">Informasi Publik</h2>
                <a href="#" class="text-secondary font-medium text-sm">Lihat Semua</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-primary/10 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                        <h3 class="font-bold">Kependudukan</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="populationChart"></canvas>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-600">Total Penduduk: <span class="font-bold">247,352</span></p>
                    </div>
                </div>
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-secondary/10 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <i class="fas fa-child text-secondary"></i>
                        </div>
                        <h3 class="font-bold">Stunting</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="stuntingChart"></canvas>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-600">Prevalensi: <span class="font-bold">12.3%</span></p>
                    </div>
                </div>
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-dark/10 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <i class="fas fa-hand-holding-usd text-dark"></i>
                        </div>
                        <h3 class="font-bold">Kemiskinan</h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="povertyChart"></canvas>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-600">Tingkat Kemiskinan: <span class="font-bold">15.7%</span></p>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .map-tooltip {
                position: absolute;
                background-color: white;
                padding: 6px 10px;
                border-radius: 4px;
                font-size: 12px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                display: none;
                z-index: 10;
                pointer-events: none;
            }

            @keyframes radarFade {
                0% {
                    opacity: 0.8;
                    r: 8;
                }

                50% {
                    opacity: 0.2;
                    r: 12;
                }

                100% {
                    opacity: 0.8;
                    r: 8;
                }
            }

            .map-marker.radar-danger {
                animation: radarFade 2.5s ease-in-out infinite;
            }

            .map-marker {
                cursor: pointer;
                transition: opacity 0.3s ease;
            }

            .radar-danger {
                animation: radarFade 2.5s ease-in-out infinite;
            }

            @keyframes radarFade {

                0%,
                100% {
                    opacity: 0.8;
                    r: 8;
                }

                50% {
                    opacity: 0.3;
                    r: 12;
                }
            }

            .status-off {
                background-color: #B0B0B0 !important;
                /* Abu-abu */
            }
        </style>


        <!-- Peta Interaktif -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-dark">Peta Interaktif</h2>
                <div class="flex items-center space-x-6">
                    <!-- Baik -->
                    <div class="flex items-center space-x-1 cursor-pointer" id="filterBaikContainer">
                        <div id="filterBaik" class="w-4 h-4 rounded-full transition-colors"
                            style="background-color: #28A745;"></div>
                        <span class="text-sm text-dark">Baik</span>
                    </div>

                    <!-- Rusak Ringan -->
                    <div class="flex items-center space-x-1 cursor-pointer" id="filterRinganContainer">
                        <div id="filterRingan" class="w-4 h-4 rounded-full transition-colors"
                            style="background-color: #FFC107;"></div>
                        <span class="text-sm text-dark">Rusak Ringan</span>
                    </div>

                    <!-- Rusak Berat -->
                    <div class="flex items-center space-x-1 cursor-pointer" id="filterBeratContainer">
                        <div id="filterBerat" class="w-4 h-4 rounded-full transition-colors"
                            style="background-color: #DC3545;"></div>
                        <span class="text-sm text-dark">Rusak Berat</span>
                    </div>
                </div>



            </div>

            <div class="map-container bg-white rounded-lg shadow-md p-4 relative">
                <!-- SVG Map -->
                <svg width="100%" height="100%" viewBox="0 0 800 400" fill="none"
                    xmlns="http://www.w3.org/2000/svg" id="svgMap">
                    <path d="M100,100 L300,50 L500,80 L700,150 L650,300 L450,350 L200,320 L100,200 Z" fill="#e9ecef"
                        stroke="#adb5bd" stroke-width="2" />
                    <text x="400" y="200" text-anchor="middle" font-size="24" fill="#495057">Kabupaten Gorontalo
                        Utara</text>

                    <!-- Markers -->
                    <circle class="map-marker status-good" cx="200" cy="150" r="8" fill="#28A745"
                        data-name="Jembatan Kwandang" data-status="Baik" data-kategori="Jembatan"
                        data-tanggal="2025-06-20" />

                    <circle class="map-marker status-warning" cx="350" cy="120" r="8" fill="#FFC107"
                        data-name="Jalan Anggrek" data-status="Rusak Ringan" data-kategori="Jalan"
                        data-tanggal="2025-06-18" />

                    <circle class="map-marker status-danger radar-danger" cx="500" cy="300" r="10"
                        fill="#DC3545" data-name="Bendungan Molingkapoto" data-status="Rusak Berat"
                        data-kategori="Bendungan" data-tanggal="2025-06-15" />

                    <circle class="map-marker status-good" cx="600" cy="250" r="8" fill="#28A745"
                        data-name="Puskesmas Atinggola" data-status="Baik" data-kategori="Puskesmas"
                        data-tanggal="2025-06-12" />

                    <circle class="map-marker status-good" cx="250" cy="250" r="8" fill="#28A745"
                        data-name="SDN 1 Moluo" data-status="Baik" data-kategori="Sekolah"
                        data-tanggal="2025-06-10" />
                </svg>

                <!-- Tooltip -->
                <div id="mapTooltip" class="map-tooltip"></div>
            </div>

            <!-- Tombol Lihat Semua -->
            <div class="text-right mt-4">
                <a href="#" class="text-secondary text-sm font-medium">Lihat Semua Infrastruktur &raquo;</a>
            </div>
        </section>

        <!-- Modal Marker Detail -->
        <div id="markerModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full text-center shadow-lg relative">
                <button onclick="closeModal()"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
                <h3 class="text-xl font-semibold text-dark mb-2" id="modalName">Nama Infrastruktur</h3>
                <p class="text-sm text-gray-600"><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p class="text-sm text-gray-600"><strong>Kategori:</strong> <span id="modalKategori"></span></p>
                <p class="text-sm text-gray-600"><strong>Update Terakhir:</strong> <span id="modalTanggal"></span></p>
            </div>
        </div>


        <!-- Statistik dan Data Daerah -->
        <section id="statistik" class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-dark">Statistik & Data Daerah</h2>
                <a href="#" class="text-secondary font-medium text-sm">Lihat Detail</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <h3 class="font-bold mb-3">Infrastruktur</h3>
                    <div class="chart-container">
                        <canvas id="infrastructureChart"></canvas>
                    </div>
                </div>
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <h3 class="font-bold mb-3">Sanitasi & Air Bersih</h3>
                    <div class="chart-container">
                        <canvas id="sanitationChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kategori Interaktif -->
        <section class="mb-8">
            <h2 class="text-xl font-bold text-dark mb-4">Kategori Layanan</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">

                <!-- Item Kategori -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-file-alt text-primary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Layanan Dokumen</p>
                </div>

                <!-- Perizinan -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-clipboard-list text-secondary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Perizinan</p>
                </div>

                <!-- Bantuan Sosial -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-dark/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-hand-holding-heart text-dark text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Bantuan Sosial</p>
                </div>

                <!-- Layanan Kesehatan -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-hospital text-primary text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Layanan Kesehatan</p>
                </div>

                <!-- UMKM Lokal -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-store text-yellow-600 text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">UMKM Lokal</p>
                </div>

                <!-- Pendaftaran Sekolah -->
                <div
                    class="bg-white rounded-lg p-4 shadow-md hover:shadow-xl transition-all duration-300 text-center transform hover:-translate-y-1 hover:scale-105 cursor-pointer group">
                    <div
                        class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:animate-bounce">
                        <i class="fas fa-school text-green-600 text-2xl"></i>
                    </div>
                    <p class="text-sm font-medium text-dark">Pendaftaran Sekolah</p>
                </div>

            </div>
        </section>


        <!-- Partisipasi Masyarakat -->
        <section class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-dark">Partisipasi Masyarakat</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-primary/10 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <i class="fas fa-comments text-primary"></i>
                        </div>
                        <h3 class="font-bold">Forum Diskusi</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="border-b pb-2">
                            <h4 class="font-medium">Pembangunan Pasar Tradisional</h4>
                            <p class="text-sm text-gray-600">32 komentar • 5 polling</p>
                        </div>
                        <div class="border-b pb-2">
                            <h4 class="font-medium">Program Bantuan UMKM</h4>
                            <p class="text-sm text-gray-600">47 komentar • 2 polling</p>
                        </div>
                        <div>
                            <h4 class="font-medium">Penanggulangan Banjir</h4>
                            <p class="text-sm text-gray-600">28 komentar • 1 polling</p>
                        </div>
                    </div>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg mt-4 w-full">Gabung Diskusi</button>
                </div>
                <div class="card bg-white rounded-lg shadow-md p-4">
                    <div class="flex items-center mb-3">
                        <div class="bg-secondary/10 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                            <i class="fas fa-trophy text-secondary"></i>
                        </div>
                        <h3 class="font-bold">Tantangan & Pencapaian</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="border-b pb-2">
                            <h4 class="font-medium">Gotong Royong Bersihkan Sungai</h4>
                            <div class="flex items-center mt-1">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-success h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <span class="text-xs ml-2">75%</span>
                            </div>
                        </div>
                        <div class="border-b pb-2">
                            <h4 class="font-medium">Penanaman 1000 Pohon</h4>
                            <div class="flex items-center mt-1">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-success h-2.5 rounded-full" style="width: 45%"></div>
                                </div>
                                <span class="text-xs ml-2">45%</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-medium">Edukasi Sanitasi Sehat</h4>
                            <div class="flex items-center mt-1">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-success h-2.5 rounded-full" style="width: 90%"></div>
                                </div>
                                <span class="text-xs ml-2">90%</span>
                            </div>
                        </div>
                    </div>
                    <button class="bg-secondary text-white px-4 py-2 rounded-lg mt-4 w-full">Ikuti Tantangan</button>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kolom 1: Logo + Deskripsi -->
                <div class="flex flex-col justify-start">
                    <div class="flex items-center mb-4">
                        <svg class="w-10 h-10 mr-3" viewBox="0 0 100 100" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="45" fill="#FFC107" />
                            <path d="M30 40 L50 25 L70 40 L70 70 L30 70 Z" fill="#212121" />
                            <path d="M40 50 L60 50 M40 60 L60 60" stroke="#FFC107" stroke-width="3" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-bold">SISTER</h3>
                            <p class="text-xs text-gray-400 max-w-xs">Sistem Informasi Terpadu Kabupaten Gorontalo
                                Utara</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 max-w-xs">Menyediakan informasi dan layanan publik untuk masyarakat
                        Kabupaten Gorontalo Utara.</p>
                </div>

                <!-- Kolom 2: Kontak -->
                <div class="flex flex-col justify-start ml-auto">
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <span>Jl. Trans Sulawesi, Kwandang, Gorontalo Utara</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            <span>(0435) 123456</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>info@gorontaloutara.go.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 3: Sosial + Download -->
                <div class="flex flex-col justify-start ml-auto">
                    <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4 mb-6">
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#"
                            class="bg-white/10 hover:bg-white/20 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-youtube text-white"></i>
                        </a>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium mb-2">Unduh Aplikasi</h4>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg flex items-center transition-colors">
                                <i class="fab fa-google-play mr-3"></i>
                                <span class="text-xs">Google Play</span>
                            </a>
                            <a href="#"
                                class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg flex items-center transition-colors">
                                <i class="fab fa-apple mr-3"></i>
                                <span class="text-xs">App Store</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-400">
                <p>&copy; 2025 SISTER - Sistem Informasi Terpadu Kabupaten Gorontalo Utara. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>




    <script>
        const statusFilters = {
            filterBaik: {
                className: 'status-good',
                color: '#28A745',
                active: true,
            },
            filterRingan: {
                className: 'status-warning',
                color: '#FFC107',
                active: true,
            },
            filterBerat: {
                className: 'status-danger',
                color: '#DC3545',
                active: true,
            },
        };

        Object.entries(statusFilters).forEach(([id, config]) => {
            const el = document.getElementById(id);

            el.addEventListener("click", () => {
                config.active = !config.active;
                el.style.backgroundColor = config.active ? config.color : '#B0B0B0';
                toggleMarkers(config.className, config.active);
            });
        });

        function toggleMarkers(className, show) {
            document.querySelectorAll(`.${className}`).forEach(el => {
                el.style.display = show ? "inline" : "none";
            });
        }
    </script>

    <script>
        const tooltip = document.getElementById("mapTooltip");
        const modal = document.getElementById("markerModal");

        document.querySelectorAll(".map-marker").forEach(marker => {
            // Tooltip hover
            marker.addEventListener("mouseenter", (e) => {
                tooltip.innerHTML =
                    `<strong>${marker.dataset.name}</strong><br>Status: ${marker.dataset.status}`;
                tooltip.style.left = e.pageX + 10 + "px";
                tooltip.style.top = e.pageY + 10 + "px";
                tooltip.style.display = "block";
            });

            marker.addEventListener("mousemove", (e) => {
                tooltip.style.left = e.pageX + 10 + "px";
                tooltip.style.top = e.pageY + 10 + "px";
            });

            marker.addEventListener("mouseleave", () => {
                tooltip.style.display = "none";
            });

            // Modal click
            marker.addEventListener("click", () => {
                document.getElementById("modalName").textContent = marker.dataset.name;
                document.getElementById("modalStatus").textContent = marker.dataset.status;
                document.getElementById("modalKategori").textContent = marker.dataset.kategori;
                document.getElementById("modalTanggal").textContent = marker.dataset.tanggal;
                modal.classList.remove("hidden");
            });
        });

        function closeModal() {
            modal.classList.add("hidden");
        }

        // Filter logic
        document.getElementById("filterBaik").addEventListener("change", (e) => {
            toggleMarkers("status-good", e.target.checked);
        });
        document.getElementById("filterRingan").addEventListener("change", (e) => {
            toggleMarkers("status-warning", e.target.checked);
        });
        document.getElementById("filterBerat").addEventListener("change", (e) => {
            toggleMarkers("status-danger", e.target.checked);
        });

        function toggleMarkers(className, show) {
            document.querySelectorAll(`.${className}`).forEach(el => {
                el.style.display = show ? "inline" : "none";
            });
        }
    </script>



    <!-- Chart.js for data visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const toggleSearchBtn = document.getElementById('toggleSearchBtn');
        const searchInput = document.getElementById('searchInput');

        toggleSearchBtn.addEventListener('click', () => {
            searchInput.classList.toggle('hidden');
            if (!searchInput.classList.contains('hidden')) {
                searchInput.focus();
            }
        });
    </script>



    <script>
        // Slider functionality
        let currentSlide = 0;
        const slides = document.getElementById('slides');
        const indicators = document.querySelectorAll('.indicator');
        const slideCount = document.querySelectorAll('.slide').length;

        function showSlide(index) {
            if (index >= slideCount) index = 0;
            if (index < 0) index = slideCount - 1;

            currentSlide = index;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;

            // Update indicators
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === currentSlide);
            });
        }

        // Auto slide
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);

        // Click on indicators
        indicators.forEach((indicator) => {
            indicator.addEventListener('click', () => {
                showSlide(parseInt(indicator.dataset.index));
            });
        });

        // ===== PROMO SLIDE MANUAL =====
        let currentPromo = 0;
        const promoSlides = document.getElementById('promoSlides');
        const promoIndicators = document.querySelectorAll('#promoIndicators span');
        const totalPromo = promoSlides.children.length;

        function showPromo(index) {
            if (index >= totalPromo) index = 0;
            if (index < 0) index = totalPromo - 1;

            currentPromo = index;
            promoSlides.style.transform = `translateX(-${index * 100}%)`;

            promoIndicators.forEach((dot, i) => {
                dot.classList.toggle("bg-primary/50", i === index);
                dot.classList.toggle("bg-gray-300", i !== index);
            });
        }

        // Navigasi tombol
        document.getElementById("prevSlide").addEventListener("click", () => {
            showPromo(currentPromo - 1);
        });
        document.getElementById("nextSlide").addEventListener("click", () => {
            showPromo(currentPromo + 1);
        });

        // Klik indikator langsung
        promoIndicators.forEach((dot, i) => {
            dot.addEventListener("click", () => showPromo(i));
        });

        // Inisialisasi awal
        showPromo(0);


        // Notification panel toggle
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationPanel = document.getElementById('notificationPanel');

        notificationBtn.addEventListener('click', () => {
            notificationPanel.classList.toggle('open');
        });

        // Map tooltip functionality
        const mapMarkers = document.querySelectorAll('.map-marker');
        const mapTooltip = document.getElementById('mapTooltip');

        mapMarkers.forEach(marker => {
            marker.addEventListener('mouseenter', (e) => {
                const name = marker.getAttribute('data-name');
                const status = marker.getAttribute('data-status');

                mapTooltip.innerHTML = `<strong>${name}</strong><br>Status: ${status}`;
                mapTooltip.style.display = 'block';
                mapTooltip.style.left = `${e.pageX - 100}px`;
                mapTooltip.style.top = `${e.pageY - 70}px`;
            });

            marker.addEventListener('mouseleave', () => {
                mapTooltip.style.display = 'none';
            });
        });

        // Charts
        // Population Chart
        const populationCtx = document.getElementById('populationChart').getContext('2d');
        new Chart(populationCtx, {
            type: 'bar',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [230456, 235789, 239123, 243567, 247352],
                    backgroundColor: '#FFC107',
                    borderColor: '#FF7700',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 220000
                    }
                }
            }
        });

        // Stunting Chart
        const stuntingCtx = document.getElementById('stuntingChart').getContext('2d');
        new Chart(stuntingCtx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023'],
                datasets: [{
                    label: 'Prevalensi Stunting (%)',
                    data: [18.5, 16.8, 15.2, 13.7, 12.3],
                    backgroundColor: 'rgba(255, 119, 0, 0.2)',
                    borderColor: '#FF7700',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Poverty Chart
        const povertyCtx = document.getElementById('povertyChart').getContext('2d');
        new Chart(povertyCtx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023'],
                datasets: [{
                    label: 'Tingkat Kemiskinan (%)',
                    data: [19.2, 18.5, 17.6, 16.4, 15.7],
                    backgroundColor: 'rgba(33, 33, 33, 0.2)',
                    borderColor: '#212121',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Infrastructure Chart
        const infrastructureCtx = document.getElementById('infrastructureChart').getContext('2d');
        new Chart(infrastructureCtx, {
            type: 'doughnut',
            data: {
                labels: ['Baik', 'Rusak Ringan', 'Rusak Berat'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#28A745',
                        '#FFC107',
                        '#DC3545'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Sanitation Chart
        const sanitationCtx = document.getElementById('sanitationChart').getContext('2d');
        new Chart(sanitationCtx, {
            type: 'bar',
            data: {
                labels: ['Air Bersih', 'Sanitasi', 'Persampahan'],
                datasets: [{
                    label: 'Akses (%)',
                    data: [78, 65, 55],
                    backgroundColor: [
                        '#36A2EB',
                        '#4BC0C0',
                        '#FF9F40'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>


    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'959bfa0de257cdec',t:'MTc1MTYwNDM2NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
