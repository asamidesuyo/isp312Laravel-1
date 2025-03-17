@extends("layouts.main")

@section('title', 'Личный кабинет')

@section('body')

{{--    @dump(\Illuminate\Support\Facades\Auth::user())--}}
    <x-box>
        <div class="row">
            <div class="col-3"><strong>Ваше имя:</strong></div>
            <div class="col-9">{{ $user->fio }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Ваша электронная почта:</strong></div>
            <div class="col-9">{{ $user->email }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Ваша дата рождения:</strong></div>
            <div class="col-9">{{ $user->birthday->format('d.m.Y') }} ({{ round($user->birthday->diffInYears(), 0) }} {{ trans_choice("{0} лет|{1} год|[2,4] года|[5,*] лет", round($user->birthday->diffInYears(), 0)) }})</div>
        </div>
    </x-box>
    <br>
    <x-box>
        <x-slot:title>Изменить пароль</x-slot:title>
        <form action="{{ route("profile.password.update") }}" method="post">
            @csrf
            <x-form.input type="password" name="password_old" label="Введите текущий пароль" placeholder="Текущий пароль" :error="$errors->first('password_old')" />
            <x-form.input type="password" name="password" label="Введите новый пароль" placeholder="Новый пароль" :error="$errors->first('password')" />
            <x-form.input type="password" name="password_confirmation" label="Повторите пароль" placeholder="Повторите пароль" :error="$errors->first('password_confirmation')" />
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </x-box>

@endsection
