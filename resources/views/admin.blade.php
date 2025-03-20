@extends("layouts.main")

@section('title', 'Панель администратора')

@section('body')

    <x-box>
        <div class="row text-center">
            <div class="col-sm-4 col-lg-2"><strong>Изображение</strong></div>
            <div class="col-sm-8 col-lg-4"><strong>Заказ</strong></div>
            <div class="col-sm-6 col-lg-2"><strong>Статус</strong></div>
            <div class="col-sm-6 col-lg-2"><strong>Дата / Время создания</strong></div>
        </div>

        @foreach($orders as $order)
            <div class="row align-items-center mt-4 row-gap-3">
                <div class="col-sm-4 col-lg-2">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($order->image) }}" width="100%" alt="Заказ №{{ $order->id }} от {{ $order->created_at->format("d.m.Y") }}" class="rounded-4">
                </div>
                <div class="col-sm-8 col-lg-4 text-center text-sm-start">
                    <h4>Заказ №{{ $order->id }} от {{ $order->created_at->format("d.m.Y") }}</h4>
                    <span class="badge text-bg-primary">{{ $order->category->title }}</span>
                    <span class="badge text-bg-warning">{{ $order->user->fio }}</span>
                </div>
                <div class="col-sm-6 col-lg-2 text-center">
                    @switch($order->status)
                        @case(\App\Enums\Order\StatusEnum::new)
                            <span class="badge text-bg-secondary">{{ $order->status->value }}</span>
                        @break
                        @case(\App\Enums\Order\StatusEnum::job)
                            <span class="badge text-bg-primary">{{ $order->status->value }}</span>
                        @break
                        @case(\App\Enums\Order\StatusEnum::success)
                            <span class="badge text-bg-success">{{ $order->status->value }}</span>
                        @break
                        @default
                            <span class="badge text-bg-danger">{{ $order->status->value }}</span>
                        @break
                    @endswitch
                </div>
                <div class="col-sm-6 col-lg-2 text-center">
                    {{ $order->created_at->format("d.m.Y H:i") }}
                </div>
                <div class="col-12 col-lg-2 text-center">
                    <a href="{{ route("admin.orders.edit", ["order" => $order->id]) }}" class="btn btn-outline-warning btn-sm">Изменить</a>
                    <a href="{{ route("admin.orders.destroy", ["order" => $order->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить данный заказ?')">Удалить</a>
                </div>
            </div>
        @endforeach
    </x-box>

@endsection
