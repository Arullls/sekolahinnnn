<script src="{{ asset('js/navbarColorSwitcher.js') }}"></script>
<nav id="navbar"
    class="fixed top-0 left-0 right-0 z-50 bg-white bg-opacity-70 backdrop-blur-sm border-b border-blue-300 shadow-md shadow-blue-200/50 px-6 py-4 flex justify-between items-center">
    <h1 id="navbar-title" class="text-2xl font-bold tracking-wide text-blue-800">Sekolahin</h1>

    <div class="flex items-center space-x-4">
        <div class="flex items-center space-x-3">
            <img src="https://ui-avatars.com/api/?name=Admin&background=3b82f6&color=fff" alt="Profile"
                class="w-10 h-10 rounded-full border border-blue-400" />
            <div class="text-sm leading-tight">
                <span id="role-badge"
                    class="text-white bg-blue-600 px-2 py-0.5 rounded-full text-xs font-semibold mb-1 inline-block cursor-pointer">Admin</span><br />
                <span id="user-name" class="font-medium text-blue-800 text-base">{{ auth()->user()->name }}
                    ({{ ucfirst(auth()->user()->role) }}) </span>
            </div>
        </div>

        <div id="color-buttons" class="flex space-x-2 ml-4" style="display: none;">
            <button data-color="red"
                class="w-6 h-6 rounded-full bg-red-500 border-2 border-white shadow-md hover:ring-2 hover:ring-red-400"
                title="Merah"></button>
            <button data-color="blue"
                class="w-6 h-6 rounded-full bg-blue-500 border-2 border-white shadow-md hover:ring-2 hover:ring-blue-400"
                title="Biru"></button>
            <button data-color="green"
                class="w-6 h-6 rounded-full bg-green-500 border-2 border-white shadow-md hover:ring-2 hover:ring-green-400"
                title="Hijau"></button>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const roleBadge = document.getElementById('role-badge');
        const colorButtons = document.getElementById('color-buttons');

        roleBadge.addEventListener('click', () => {
            if (colorButtons.style.display === 'none') {
                colorButtons.style.display = 'flex';
            } else {
                colorButtons.style.display = 'none';
            }
        });
    });
</script>
