<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body>


    @include('_header')

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

    <div class="subTitle forYou">Películas para ti</div>
    <div class="userList">
        <div class="video"><img src="{{ asset('img/acuaman_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/duna_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/megamente_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/wonka_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/barbie_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/elPodcast_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/elExorsita_poster.webp') }}"></div>
        <div class="video"><img src="{{ asset('img/pokemon_poster.webp') }}"></div>
    </div>

    <div class="subTitle continueWatching">Continuar viendo</div>
    <div class="userList">
        <div class="video cw" style="background-image: url(/img/acuaman_continueWatching.webp);">

            <svg class="play" xmlns="http://www.w3.org/2000/svg" fill="#fff" stroke="#fff" viewBox="0 0 24 24" role="img">
                <path d="M6.777 21.482A.5.5 0 0 1 6 21.066V2.934a.5.5 0 0 1 .777-.416l13.599 9.066a.5.5 0 0 1 0 .832z"></path>
            </svg>

            <div class="progress_bar">
                <div class="progress" style="width:70%;"></div>
                <div class="bar" style="width:30%;"></div>
            </div>

        </div>
        <div class="video cw"><img src="{{ asset('img/duna_continueWatching.webp') }}"></div>
        <div class="video cw"><img src="{{ asset('img/megamente_continueWatching.webp') }}"></div>
        <div class="video cw"><img src="{{ asset('img/wonka_continueWatching.webp') }}"></div>
        <div class="video cw"><img src="{{ asset('img/barbie_continueWatching.webp') }}"></div>
        <div class="video cw"><img src="{{ asset('img/elPodcast_continueWatching.webp') }}"></div>
    </div>





</body>

</html>