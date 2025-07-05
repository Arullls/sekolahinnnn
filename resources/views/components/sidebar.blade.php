<!-- Sidebar Hover -->
<div id="hoverSidebar"
    class="fixed top-0 left-0 h-full bg-white border-r border-blue-300 shadow-md z-40 overflow-hidden group flex flex-col transition-all duration-300 ease-in-out w-16 hover:w-56">

    <!-- Header -->
    <div class="flex items-center justify-center h-20 border-b border-blue-200 transition-all duration-300 ease-in-out">
        <span
            class="text-blue-700 font-bold text-xl opacity-0 group-hover:opacity-100 max-w-0 group-hover:max-w-xs overflow-hidden whitespace-nowrap transition-all duration-300">
            Menu
        </span>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex flex-col space-y-2 p-2.5 flex-1">
        @foreach ($menus as $menu)
            <div>
                @if ($menu->children->count() > 0)
                    {{-- Menu dengan submenu, jadi tombol dropdown --}}
                    <button type="button"
                        class="w-full flex items-center justify-between space-x-3 p-2 rounded hover:bg-blue-100 transition-all duration-200 focus:outline-none"
                        onclick="toggleDropdown('menu-{{ $menu->id }}')">
                        <span class="flex items-center space-x-3">
                            <span class="text-xl">{{ $menu->icon ?? '📁' }}</span>
                            <span
                                class="text-sm text-blue-800 font-medium opacity-0 group-hover:opacity-100 max-w-0 group-hover:max-w-xs overflow-hidden whitespace-nowrap transition-all duration-300">
                                {{ $menu->title }}
                            </span>
                        </span>
                        <span
                            class="text-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">&#x25BC;</span>
                        {{-- panah ke bawah --}}
                    </button>

                    <nav id="menu-{{ $menu->id }}"
                        class="ml-6 mt-1 flex flex-col space-y-1 max-h-0 overflow-hidden transition-all duration-300">
                        @foreach ($menu->children as $child)
                            <a href="{{ url($child->route) }}"
                                class="flex items-center space-x-3 p-2 rounded hover:bg-blue-50 transition-all duration-150">
                                <span class="text-lg">{{ $child->icon ?? '📄' }}</span>
                                <span
                                    class="text-xs text-blue-700 font-medium opacity-0 group-hover:opacity-100 max-w-0 group-hover:max-w-xs overflow-hidden whitespace-nowrap transition-all duration-300">
                                    {{ $child->title }}
                                </span>
                            </a>
                        @endforeach
                    </nav>
                @else
                    {{-- Menu tanpa submenu, langsung link --}}
                    <a href="{{ url($menu->route) }}"
                        class="flex items-center space-x-3 p-2 rounded hover:bg-blue-100 transition-all duration-200">
                        <span class="text-xl">{{ $menu->icon ?? '📁' }}</span>
                        <span
                            class="text-sm text-blue-800 font-medium opacity-0 group-hover:opacity-100 max-w-0 group-hover:max-w-xs overflow-hidden whitespace-nowrap transition-all duration-300">
                            {{ $menu->title }}
                        </span>
                    </a>
                @endif
            </div>
        @endforeach
    </nav>

    <script>
        function toggleDropdown(id) {
            const el = document.getElementById(id);
            if (!el) return;

            if (el.style.maxHeight && el.style.maxHeight !== '0px') {
                el.style.maxHeight = '0px';
            } else {
                el.style.maxHeight = el.scrollHeight + 'px';
            }
        }
    </script>

    <!-- Logout Button -->
    <div class="p-2 border-t border-blue-200">
        <button onclick="logout()"
            class="w-full flex items-center space-x-3 p-2 text-red-600 rounded hover:bg-red-100 transition-all duration-200">
            <span class="text-xl">🚪</span>
            <span
                class="text-sm font-medium opacity-0 group-hover:opacity-100 max-w-0 group-hover:max-w-xs overflow-hidden whitespace-nowrap transition-all duration-300">
                Logout
            </span>
        </button>
    </div>
</div>
