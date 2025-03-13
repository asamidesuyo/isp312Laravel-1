@extends("layouts.main")

@section('title', 'Регистрация')

@section('body')

    {{--@dump(\Carbon\Carbon::parse("2030-03-11 13:20:00")->diffForHumans())--}}

    <x-box>
        <form action="{{ route("register.create") }}" method="post">
            @csrf
            <x-form.input name="fio" label="Ваше ФИО" placeholder="Фамилия Имя Отчество" :error="$errors->first('fio')" :value="old('fio')" />
            <x-form.input type="email" name="email" label="Ваш Email" placeholder="mail@mail.ru" :error="$errors->first('email')" :value="old('email')" />
            <x-form.input type="date" name="birthday" label="Дата рождения" :value="old('birthday') ?? now()->format('Y-m-d')" :error="$errors->first('birthday')" />
            <x-form.input type="password" name="password" label="Пароль" placeholder="Пароль" :error="$errors->first('password')" />
            <x-form.input type="password" name="password_confirmation" label="Повторите пароль" placeholder="Повторите пароль" :error="$errors->first('password_confirmation')" />
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </x-box>

@endsection
