@extends("layouts.main")

@section('title', 'Войти')

@section('body')
    <x-box>
        <form action="{{ route("login.login") }}" method="post">
            @csrf
            <x-form.input type="email" name="email" label="Ваш Email" placeholder="mail@mail.ru" :error="$errors->first('email')" :value="old('email')" />
            <x-form.input type="password" name="password" label="Пароль" placeholder="Пароль" :error="$errors->first('password')" />
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </x-box>

@endsection
