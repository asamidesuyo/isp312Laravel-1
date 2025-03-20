<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
{{--                    @auth--}}
{{--                        <li class="nav-item nav-link">Авторизован</li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item nav-link">Войдите</li>--}}
{{--                    @endauth--}}

{{--                    @guest--}}
{{--                            <li class="nav-item nav-link">Вы гость</li>--}}
{{--                    @endguest--}}
                    @guest
                        <li class="nav-item">
                            <a @class(["nav-link","active" => \Illuminate\Support\Facades\Route::is("login.index")]) href="{{ route("login.index") }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a @class(["nav-link","active" => \Illuminate\Support\Facades\Route::is("register.index")]) href="{{ route("register.index") }}">Регистрация</a>
                        </li>
                    @else
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                            <li class="nav-item">
                                <a @class(["nav-link","active" => \Illuminate\Support\Facades\Route::is("admin.orders.index")]) href="{{ route("admin.orders.index") }}">Панель администратора</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a @class(["nav-link","active" => \Illuminate\Support\Facades\Route::is("orders.index")]) href="{{ route("orders.index") }}">Заказы</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a @class(["nav-link","active" => \Illuminate\Support\Facades\Route::is("profile.index")]) href="{{ route("profile.index") }}">Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("login.logout") }}" class="nav-link">Выход</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

{{--@dump(\Illuminate\Support\Facades\Auth::user())--}}
