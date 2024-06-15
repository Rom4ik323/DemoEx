{{-- Подключение шаблона --}}
@extends('layouts.layout')
@section('title','Создание заказа')
@section('content')

<div class="container mt-5 text-center">
<h2 class="mb-5">Создание заказа</h2>
</div>


{{-- Вывод ошибок валидации --}}
<div class="container mt-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- Форма заказа --}}
<form action="{{ route('ticket.store') }}" method="POST">
  @csrf

  <select class="mb-3 form-select" name="product" aria-label="Default select example">
    <option selected>Выберите товар</option>
    @foreach ($products as $product)
      <option value="{{ $product->title }}">{{ $product->title }}</option>
    @endforeach
  </select>
  <div class="form-floating mb-3">
    <input type="number" min="1" class="form-control" name="qty" id="floatingInput" placeholder="Количество" required>
    <label for="floatingInput">Количество</label>
  </div>
  <div class="form-floating mb-3">
    <input type="name" class="form-control" name="address" id="floatingInput" placeholder="адрес" required>
    <label for="floatingInput">Ваш адрес</label>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Отправить</button>
</div>
</form>
@endsection
