{{-- Подключение шаблона --}}
@extends('layouts.layout')
@section('title','Вход')
@section('content')

<div class="container mt-5 text-center">
<h2>Вход</h2>
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
{{-- Форма входа --}}
<form method="POST" action="{{ route('user.login') }}">
  @csrf
    <div class="mb-3">
        <label for="exampleInputLogin" class="form-label">Логин</label>
        <input type="login" name="login" class="form-control" id="exampleInputLogin" aria-describedby="LoginHelp" required>
      </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Пароль</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</div>
@endsection
