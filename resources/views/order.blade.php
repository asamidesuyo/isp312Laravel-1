@extends("layouts.main")

@section('title', 'Заказы')

@section('body')

    <x-box link="Добавить заказ" :href="route('orders.create')">
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
                    <a href="{{ route("orders.show", ["order" => $order->id]) }}" class="btn btn-outline-primary btn-sm">Посмотреть</a>
                    @if($order->status === \App\Enums\Order\StatusEnum::new)
                        <a href="{{ route("orders.destroy", ["order" => $order->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить данный заказ?')">Удалить</a>
                    @endif
                </div>
            </div>
        @endforeach
    </x-box>

@endsection


<form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <select name="status" class="form-control">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Ожидание</option>
        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>В обработке</option>
        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Завершен</option>
        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Отменен</option>
    </select>
    <button type="submit" class="btn btn-primary">Обновить</button>
</form>
