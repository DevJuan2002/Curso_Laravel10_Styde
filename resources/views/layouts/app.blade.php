<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- En la parte d @yield('title','')-> Va de esa forma por lo que esta dentro de una la etiqueta title   --}}
    <title>@yield('title','')</title> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">                        
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="wrap">
        <header class="head">
            <a href="#" class="logo"></a>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li class="main-nav-item">
                        <a href="/notas" class="main-nav-link">
                            <i class="icon icon-th-list"></i>
                            <span>Ver notas</span>
                        </a>
                    </li>
                    <li class="main-nav-item active">
                        <a href="/notas/crear" class="main-nav-link">
                            <i class="icon icon-pen"></i>
                            <span>Nueva nota</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>

{{-- En esta linea cuando ponmeos yield lo que hacemos es que importamos o contruimos las @sections que hay en otros archivos --}}
@yield('content')


<footer class="foot">
    <div class="ad">
        <p>
            Esta aplicación es desarrollada en el curso Laravel 10 - Styde
        </p>
    </div>
    <div class="license">
        <p>© Derechos Reservados - Styde Limited</p>
    </div>
</footer>
</div>
</body>
</html>
