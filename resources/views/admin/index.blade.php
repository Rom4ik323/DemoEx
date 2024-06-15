{{-- Подключение шаблона --}}
@extends('layouts.layout')
@section('title','Панель администратора')
@section('content')
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

<h1 class="text-center">Управление заказами</h1>
<div class="row">
{{-- Вывод заказов клиентов --}}
        <div class="row">
        @foreach ($tickets as $ticket)
        <ul class="list-group m-4" style="width: 20%">
            <li class="list-group-item">Номер заказа: {{ $ticket->id}}</li>
            <li class="list-group-item">Имя:  {{ $ticket->name }}</li>
            <li class="list-group-item">Email:  {{ $ticket->email }}</li>
            <li class="list-group-item">Товар:  {{ $ticket->product }}</li>
            <li class="list-group-item">Количество:  {{ $ticket->qty }}</li>
            <li class="list-group-item">Адрес:  {{ $ticket->address }}</li>
            <li class="list-group-item"><form method="POST" action="{{ route('ticket.update', $ticket) }}">
                @csrf
                <select name="status" class="form-select" aria-label="Default select example">
                    <option selected>{{ $ticket->status }}</option>
                    <option value="Новая">Новая</option>
                    <option value="в процессе">в процессе</option>
                    <option value="выполнено ">выполнено</option>
                    <option value="отменено ">отменено</option>
                  </select>
                  <button class="btn btn-success" type="submit">Изменить</button>
            </form></li>
        </ul>    
    @endforeach

</div>
    {{--  </tbody>
  </table>  --}}
</div>
@endsection
