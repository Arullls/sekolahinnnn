<div class="mb-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-2">{{ $pageTitle ?? 'Judul Halaman' }}</h1>

    @if (isset($breadcrumbs))
        <nav class="text-sm text-blue-700">
            <ol class="list-reset flex items-center space-x-2">
                @foreach ($breadcrumbs as $label => $url)
                    @if ($loop->last || !$url)
                        <li class="text-blue-500 font-semibold">{{ $label }}</li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="hover:underline">{{ $label }}</a>
                        </li>
                        <li><span>/</span></li>
                    @endif
                @endforeach
            </ol>
        </nav>
    @endif
</div>
