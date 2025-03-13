<h1 class="mb-4 fs-2">
    @empty($title)
        @yield('title')
    @else
        {{ $title }}
    @endempty
</h1>
<div class="bg-white rounded-3 shadow-sm p-4">
    {{ $slot }}
</div>
