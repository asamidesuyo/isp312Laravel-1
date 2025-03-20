@extends("layouts.main")

@section('title', 'Редактирование заказа №' . $order->id)

@section('body')
    <x-box>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label for="status">Статус заказа:</label>
            <select name="status" id="status" class="form-control">
                <option value="Новый" {{ $order->status->value === 'Новый' ? 'selected' : '' }}>Новый</option>
                <option value="В работе" {{ $order->status->value === 'В работе' ? 'selected' : '' }}>В работе</option>
                <option value="Выполнен" {{ $order->status->value === 'Выполнен' ? 'selected' : '' }}>Выполнен</option>
                <option value="Отклонен" {{ $order->status->value === 'Отклонен' ? 'selected' : '' }}>Отклонен</option>
            </select>



            <x-form.textarea name="description" label="Описание заказа" placeholder="Описание"
                             :error="$errors->first('description')" :value="$order->description" />

            <x-form.input type="file" name="image" label="Изображение" accept="image/*"
                          :error="$errors->first('image')" :value="old('image')" />

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </x-box>
@endsection
