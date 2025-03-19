@extends("layouts.main")

@section('title', "Заказ №{$order->id} от {$order->created_at->format('d.m.Y')}")

@section('body')

    <x-box>
        <div class="row">
            <div class="col-3"><strong>Категория:</strong></div>
            <div class="col-9">{{ $order->category->title }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Пользователь:</strong></div>
            <div class="col-9">{{ $order->user->fio }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Дата / Время создания заказа:</strong></div>
            <div class="col-9">{{ $order->created_at->format("d.m.Y H:i") }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Статус:</strong></div>
            <div class="col-9">{{ $order->status }}</div>
        </div>
        <div class="row">
            <div class="col-3"><strong>Описание заказа:</strong></div>
            <div class="col-9">{{ $order->description }}</div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($order->image) }}" width="200" class="rounded-4" alt="">
        </div>
    </x-box>

@endsection
