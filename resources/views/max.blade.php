<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body>

    <div class="header">
        <div class="logo"><img src="{{ asset('img/logo_max.webp') }}" alt=""></div>
        <div class="menu_desktop">
            <div>Inicio</div>
            <div>Series</div>
            <div>Películas</div>
            <div class="hbo_logo"><img src="{{ asset('img/hbo_logo.webp') }}" alt=""></div>
            <div>Niños y Familia</div>
        </div>
        <div class="menu_right">
            <div class="search"><img src="{{ asset('img/search.webp') }}" alt=""></div>
            <div class="favorite"><img src="{{ asset('img/favorite.webp') }}" alt=""></div>
            <div class="avatar"><img src="{{ asset('img/avatar.webp') }}" alt=""></div>
        </div>
    </div>

    <div class="container_preview">
        <div class="preview">

            <div class="imge_title">
                <div class="img_title"><img src="{{ asset('img/acuaman_title.webp') }}" alt=""></div>
            </div>

            <div class="metaData">
                <div class="clasification">13+</div>
                <div class="year">2023</div>
            </div>
            <div class="description">
            Jason Momoa encarna nuevamente al superhéroe Aquaman, quien debe unir fuerzas con su hermano Orm para salvar a su familia de un poderoso enemigo.
            </div>

            <div class="button">
                <button class="goto">Ir a la pelicula</button>
            </div>

        </div>

    </div>
    <div class="userList">

    </div>


</body>

</html>