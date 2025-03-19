@extends("layouts.main")

@section('title', 'Создание заказа')

@section('body')
    <x-box>
        <form action="{{ route("orders.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($categories->isNotEmpty())
                <x-form.select name="category_id" label="Категория" :error="$errors->first('category_id')">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id == old("category_id"))>{{ $category->title }}</option>
                    @endforeach
                </x-form.select>
            @else
                <p class="text-danger"><strong>Произошла ошибка, отправка формы невозможна, т. к. отсутсвуют категории!</strong></p>
            @endif

            <x-form.textarea name="description" label="Описание заказа" placeholder="Описание" :error="$errors->first('description')" :value="old('description')" />

            <x-form.input type="file" name="image" label="Изображение" accept="image/*" :error="$errors->first('image')" :value="old('image')" />

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </x-box>

@endsection
