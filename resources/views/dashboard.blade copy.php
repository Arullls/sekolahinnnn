<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Sekolahin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Sidebar default kecil */
        #hoverSidebar {
            width: 4rem;
            /* w-16 */
            transition: width 0.3s ease-in-out;
        }

        /* Sidebar lebarkan saat hover */
        #hoverSidebar:hover {
            width: 14rem;
            /* w-56 */
        }

        /* Main content margin saat sidebar kecil */
        main {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 4rem;
            /* w-16 */
        }

        /* Main content margin saat sidebar hover */
        #hoverSidebar:hover~main {
            margin-left: 14rem;
            /* w-56 */
        }

        /* Sidebar link teks default sembunyi */
        #hoverSidebar nav a span.text-label {
            display: none;
        }

        /* Teks sidebar muncul saat hover */
        #hoverSidebar:hover nav a span.text-label {
            display: inline;
        }

        /* Sidebar link hover & active styles */
        #hoverSidebar nav a:hover,
        #hoverSidebar nav a.active {
            background-color: #bfdbfe;
            /* bg-blue-200 */
            color: #1e40af;
            /* blue-800 */
        }

        /* Sidebar link default color */
        #hoverSidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            /* space between icon & label */
        }

        /* Sidebar link icons tetap */
        #hoverSidebar nav a span.icon {
            display: inline-block;
        }

        /* Hilangkan sidebar di mobile */
        @media (max-width: 768px) {
            #hoverSidebar {
                display: none;
            }

            main {
                margin-left: 0 !important;
                padding-bottom: 4rem;
                /* space untuk bottom nav */
            }
        }

        /* Bottom Nav */
        #bottomNav {
            display: none;
        }

        /* Tampilkan bottom nav di mobile */
        @media (max-width: 768px) {
            #bottomNav {
                display: flex;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 4rem;
                background: white;
                border-top: 1px solid #bfdbfe;
                /* border-blue-300 */
                box-shadow: 0 -2px 6px rgb(59 130 246 / 0.3);
                /* shadow blue */
                justify-content: space-around;
                align-items: center;
                z-index: 50;
            }

            #bottomNav a {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem;
                color: #1e40af;
                /* blue-800 */
                text-decoration: none;
                transition: background-color 0.2s, color 0.2s;
                padding: 0.25rem 0.5rem;
                border-radius: 0.375rem;
                /* rounded-md */
            }

            #bottomNav a:hover,
            #bottomNav a.active {
                background-color: #bfdbfe;
                /* blue-200 */
                color: #1e3a8a;
                /* blue-900 */
            }

            #bottomNav a span.icon {
                font-size: 1.5rem;
                line-height: 1;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-r from-blue-100 to-blue-50 min-h-screen font-sans text-gray-800 pt-20">

    <!-- Sidebar Hover -->
    <div id="hoverSidebar"
        class="fixed top-0 left-0 h-full bg-white border-r border-blue-300 shadow-md z-40 overflow-hidden group flex flex-col">

        <div class="flex items-center justify-center h-20 border-b border-blue-200">
            <span
                class="text-blue-700 font-bold text-xl transition-opacity duration-300 opacity-0 group-hover:opacity-100 select-none">Menu</span>
        </div>

        <nav class="flex flex-col space-y-2 p-4 flex-1">
            <a href="#"
                class="flex items-center space-x-3 p-2 rounded hover:bg-blue-100 transition-colors duration-200 active"
                aria-current="page">
                <span class="icon">🏠</span>
                <span class="text-label select-none">Dashboard</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 p-2 rounded hover:bg-blue-100 transition-colors duration-200">
                <span class="icon">👨‍🎓</span>
                <span class="text-label select-none">Siswa</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 p-2 rounded hover:bg-blue-100 transition-colors duration-200">
                <span class="icon">📝</span>
                <span class="text-label select-none">Ujian</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 p-2 rounded hover:bg-blue-100 transition-colors duration-200">
                <span class="icon">📊</span>
                <span class="text-label select-none">Laporan</span>
            </a>
        </nav>
    </div>

    <!-- Navbar -->
    <nav
        class="fixed top-0 left-0 right-0 z-50 bg-white bg-opacity-70 backdrop-blur-sm border-b border-blue-300 shadow-md shadow-blue-200/50 px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold tracking-wide text-blue-800">Sekolahin</h1>
        <div class="flex items-center space-x-4">
            <span id="user-name" class="font-medium text-blue-800"></span>
            <button onclick="logout()"
                class="bg-blue-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-blue-700 transition duration-200">
                Logout
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="mainContent" class="transition-all duration-300 ease-in-out mt-10 px-6 ml-16 group-hover:ml-56 max-w-5xl">


        <h2 class="text-3xl font-semibold mb-6">Halo, <span id="user-greeting" class="text-blue-700"></span> 👋</h2>
        <p class="mb-8 text-gray-700 max-w-xl">
            Selamat datang di dashboard aplikasi ujian sekolah. Kamu bisa mengakses soal, hasil ujian, dan fitur lainnya
            di sini.
        </p>

        <!-- Info Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div
                class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600 hover:shadow-lg transition duration-200">
                <h3 class="font-semibold text-lg mb-2">Jumlah Soal</h3>
                <p class="text-3xl font-bold text-blue-700">120</p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600 hover:shadow-lg transition duration-200">
                <h3 class="font-semibold text-lg mb-2">Ujian Aktif</h3>
                <p class="text-3xl font-bold text-blue-700">3</p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600 hover:shadow-lg transition duration-200">
                <h3 class="font-semibold text-lg mb-2">Siswa Terdaftar</h3>
                <p class="text-3xl font-bold text-blue-700">450</p>
            </div>

            <div
                class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600 hover:shadow-lg transition duration-200">
                <h3 class="font-semibold text-lg mb-2">Hasil Ujian</h3>
                <p class="text-3xl font-bold text-blue-700">1,250</p>
            </div>

        </section>
    </main>

    <!-- Bottom Navigation (Mobile) -->
    <nav id="bottomNav" aria-label="Bottom navigation">
        <a href="#" class="active" aria-current="page">
            <span class="icon">🏠</span>
            <span>Dashboard</span>
        </a>
        <a href="#">
            <span class="icon">👨‍🎓</span>
            <span>Siswa</span>
        </a>
        <a href="#">
            <span class="icon">📝</span>
            <span>Ujian</span>
        </a>
        <a href="#">
            <span class="icon">📊</span>
            <span>Laporan</span>
        </a>
    </nav>

    <script>
        const user = JSON.parse(localStorage.getItem('user') || '{}');
        document.getElementById('user-name').textContent = user.name || 'User';
        document.getElementById('user-greeting').textContent = user.name ? user.name.split(' ')[0] : 'User';

        function logout() {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        }
    </script>

</body>

</html>
