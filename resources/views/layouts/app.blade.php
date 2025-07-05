<!DOCTYPE html>
<html lang="id" id="htmlRoot" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - Sekolahin</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #hoverSidebar {
            width: 4rem;
            transition: width 0.3s ease-in-out;
        }

        #hoverSidebar:hover {
            width: 14rem;
        }

        main {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 4rem;
        }

        #hoverSidebar:hover~main {
            margin-left: 14rem;
        }

        #hoverSidebar nav a span.text-label {
            display: none;
        }

        #hoverSidebar:hover nav a span.text-label {
            display: inline;
        }

        #hoverSidebar nav a:hover,
        #hoverSidebar nav a.active {
            background-color: #bfdbfe;
            color: #1e40af;
        }

        #hoverSidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        #hoverSidebar nav a span.icon {
            display: inline-block;
        }

        @media (max-width: 768px) {
            #hoverSidebar {
                display: none;
            }

            main {
                margin-left: 0 !important;
                padding-bottom: 4rem;
            }
        }

        #bottomNav {
            display: none;
        }

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
                box-shadow: 0 -2px 6px rgb(59 130 246 / 0.3);
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
                text-decoration: none;
                transition: background-color 0.2s, color 0.2s;
                padding: 0.25rem 0.5rem;
                border-radius: 0.375rem;
            }

            #bottomNav a:hover,
            #bottomNav a.active {
                background-color: #bfdbfe;
                color: #1e3a8a;
            }

            #bottomNav a span.icon {
                font-size: 1.5rem;
                line-height: 1;
            }
        }
    </style>
</head>

<body
    class="bg-gradient-to-r from-blue-100 to-blue-50 dark:from-gray-900 dark:to-gray-800 min-h-screen font-sans text-gray-800 dark:text-gray-100 transition-colors duration-300 pt-20">

    {{-- Navbar --}}
    @include('components.navbar')


    {{-- Sidebar (desktop only) --}}
    @include('components.sidebar')

    {{-- Tombol Toggle Dark Mode --}}
    <div class="fixed bottom-6 right-6 z-50">
        <button onclick="toggleDarkMode()"
            class="px-3 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 dark:bg-gray-700 dark:hover:bg-gray-600">
            🌓 Toggle Mode
        </button>
    </div>

    {{-- Main content --}}
    <main class="transition-all duration-300 ease-in-out mt-10 px-6 ml-16 group-hover:ml-56 max-w-5xl">
        @yield('content')
    </main>



    {{-- Bottom nav (mobile only) --}}
    @include('components.bottom-nav')

    <script>
        const user = JSON.parse(localStorage.getItem('user') || '{}');
        document.getElementById('user-name').textContent = user.name || 'User';
        document.getElementById('user-greeting').textContent = user.name ? user.name.split(' ')[0] : 'User';

        function logout() {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            window.location.href = '/login';
        }

        function toggleDarkMode() {
            const html = document.getElementById('htmlRoot');
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        }

        window.onload = () => {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.getElementById('htmlRoot').classList.add('dark');
            }
        }
    </script>

    <script>
        // Ambil elemen badge dan container tombol warna
        const roleBadge = document.getElementById('role-badge');
        const colorButtonsContainer = roleBadge.parentElement.parentElement.querySelector('div.flex.space-x-2');

        // Awalnya sembunyiin tombol warna
        colorButtonsContainer.style.display = 'none';

        // Pas badge di klik, toggle tampilannya
        roleBadge.style.cursor = 'pointer'; // kasih cursor pointer biar keliatan klikable
        roleBadge.addEventListener('click', () => {
            if (colorButtonsContainer.style.display === 'none') {
                colorButtonsContainer.style.display = 'flex';
            } else {
                colorButtonsContainer.style.display = 'none';
            }
        });
    </script>

    @yield('scripts')


</body>

</html>
