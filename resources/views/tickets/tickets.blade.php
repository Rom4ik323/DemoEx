{{-- Подключение шаблона --}}
@extends('layouts.layout')
@section('title','Заказы')
@section('content')
{{-- Заголовок --}}
<h1 class="text-center">Ваши заказы </h1>
{{-- Картинка --}}
<div class="d-flex justify-content-center">
  <img src="/img/6.jpg" style="width: 250; height: 250px;" alt="">
</div>

<div class="container">
    {{-- Ссылка на создание заказа --}}
    <a href="/ticket/create">Создать заказ</a>

    {{-- Вывод заказов пользователя --}}
    @foreach ($tickets as $ticket)
        <ul class="list-group m-4">
            <li class="list-group-item">Номер заказа: {{ $ticket->id}}</li>
            <li class="list-group-item">Товар:        {{ $ticket->product}}</li>
            <li class="list-group-item">Количество:   {{ $ticket->qty}}</li>
            <li class="list-group-item">Статус:       {{ $ticket->status }}</li>
        </ul>    
    @endforeach
</div>
@endsection