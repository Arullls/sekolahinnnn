<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sekolahin</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4">
    <div class="glass rounded-2xl shadow-xl p-8 w-full max-w-md text-blue-900">
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-6">Login Aplikasi Ujian</h2>

        <form id="login-form" class="space-y-4">
            <input type="text" id="email" placeholder="Email atau NISN"
                class="w-full bg-white bg-opacity-80 border border-blue-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
            <input type="password" id="password" placeholder="Password"
                class="w-full bg-white bg-opacity-80 border border-blue-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-2 rounded transition">Login</button>
        </form>

        <div class="text-center text-sm mt-4 text-blue-100 drop-shadow">
            Belum punya akun? <a href="#" class="text-blue-200 hover:underline">Hubungi admin sekolah</a>
        </div>
    </div>

    <script>
        // Set axios default supaya semua request pakai credentials (cookie, header)
        axios.defaults.withCredentials = true;

        document.getElementById('login-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                // Ambil CSRF cookie dulu, wajib buat Sanctum
                await axios.get('/sanctum/csrf-cookie');

                // Kirim login dengan credentials (cookie)
                const response = await axios.post('/login', {
                    email,
                    password
                });

                // Kalau berhasil redirect ke dashboard
                window.location.href = '/admin/dashboard';
            } catch (error) {
                alert(error.response?.data?.message || 'Login gagal');
            }
        });
    </script>

</body>

</html>
