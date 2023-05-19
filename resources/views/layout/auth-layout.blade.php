<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Интернет-магазин' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <script src="{{ asset('js/site.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <!-- Бренд и кнопка «Гамбургер» -->
        <a class="navbar-brand" href="{{ route('index') }}">Магазин</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbar-example" aria-controls="navbar-example"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Основная часть меню (может содержать ссылки, формы и прочее) -->
        <div class="collapse navbar-collapse" id="navbar-example">
            <!-- Этот блок расположен справа -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Войти</a>
                    </li>
                    @if (Route::has('user.register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Регистрация</a>
                        </li>
                    @endif
                @endguest
                @auth
                    <li class="nav-item" id="top-basket">
                        <a class="nav-link"
                           href="{{ route('basket.index') }}">
                            Корзина ({{\App\Models\Basket::getCount()}})
                        </a>
                    </li>
                    @if(auth()->user()->admin === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a onclick="document.getElementById('logout-form').submit(); return false"
                           href="{{ route('user.logout') }}" class="nav-link">Выйти</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link"> <i class="fas fa-user"></i> ({{auth()->user()->name}})</p>
                    </li>
                @endauth
            </ul>
            <form id="logout-form" action="{{ route('user.logout') }}" method="post"
                  class="d-none">
                @csrf
            </form>
        </div>
    </nav>


    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible mt-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ $message }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#catalog-sidebar > ul ul').hide();
        $('#catalog-sidebar .badge').on('click', function () {
            var $badge = $(this);
            var closed = $badge.siblings('ul') && !$badge.siblings('ul').is(':visible');

            if (closed) {
                $badge.siblings('ul').slideDown('normal', function () {
                    $badge.children('i').removeClass('fa-plus').addClass('fa-minus');
                });
            } else {
                $badge.siblings('ul').slideUp('normal', function () {
                    $badge.children('i').removeClass('fa-minus').addClass('fa-plus');
                });
            }
        });
    });
</script>
</body>
</html>
