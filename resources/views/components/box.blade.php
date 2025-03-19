<div class="row">
    <div class="col-10">
        <h1 class="mb-4 fs-2">
            @empty($title)
                @yield('title')
            @else
                {{ $title }}
            @endempty
        </h1>
    </div>
    @isset($link)
        @isset($href)
            <div class="col-2 text-end">
                <a href="{{$href}}" class="btn btn-primary btn-sm">{{$link}}</a>
            </div>
        @endisset
    @endisset
</div>
<div class="bg-white rounded-3 shadow-sm p-4">
    {{ $slot }}
</div>
