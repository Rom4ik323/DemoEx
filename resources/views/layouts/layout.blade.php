<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="{{ asset('/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
    <link href="/js/main.js" rel="stylesheet"/>
    <style>
      .nav-link:hover{
        color: rgb(160, 160, 160)!important;
        transition: 0.5ms;
      }  
    </style>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var eventCalllback = function(e) {
        var el = e.target,
            clearVal = el.dataset.phoneClear,
            pattern = el.dataset.phonePattern,
            matrix_def = "+7(___)-___-__-__"
        matrix = pattern ? pattern : matrix_def,
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = e.target.value.replace(/\D/g, "");
        if (clearVal !== 'false' && e.type === 'blur') {
            if (val.length < matrix.match(/([\_\d])/g).length) {
                e.target.value = '';
                return;
            }
        }
        if (def.length >= val.length) val = def;
        e.target.value = matrix.replace(/./g, function(a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
        });
    }
    var phone_inputs = document.querySelectorAll('[data-phone-pattern]');
    for (let elem of phone_inputs) {
        for (let ev of ['input', 'blur', 'focus']) {
            elem.addEventListener(ev, eventCalllback);
        }
    }
  });
</script>
</head>
<body>
  {{-- Навигация --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Авоська</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="/">Главная</a>
              @auth
                <a class="nav-link" href="/tickets">Заказы</a>
                <a class="nav-link" href="/logout">Выход</a>
              @endauth
              @guest
                <a class="nav-link" href="/register">Регистрация</a>
                <a class="nav-link" href="/login">Вход</a>  
              @endguest
            </div>
          </div>
        </div>
      </nav>
      <main>
        {{-- Вывод оповещений пользователю --}}
        @if (session('success'))
          <div class="container m-auto w-25">
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          </div>
        @endif
        @yield('content')
      </main>
      <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
