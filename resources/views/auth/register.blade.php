{{-- Подключение шаблона --}}
@extends('layouts.layout')
@section('title','Регистрация')
@section('content')

<div class="container mt-5 text-center">
<h2>Регистрация</h2>
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

{{-- Форма регистрации --}}
<form action="{{ route('user.store') }}" method="POST">
  @csrf
  <div class="form-floating mb-3">
    <input type="name" class="form-control" name="name" id="floatingInput" placeholder="name" required>
    <label for="floatingInput">ФИО</label>
  </div>
  <div class="form-floating mb-3">
    <input type="phone" class="form-control" data-phone-pattern name="number" id="floatingInput" placeholder="number" required>
    <label for="floatingInput">Телефон</label>
  </div>
  <div class="form-floating mb-3">
    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
    <label for="floatingInput">Почта</label>
  </div>
  <div class="form-floating mb-3">
    <input type="login" class="form-control" name="login" id="floatingInput" placeholder="login" required>
    <label for="floatingInput">Логин</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Пароль</label>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
</div>
</form>
@endsection
