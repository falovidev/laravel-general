<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis cosas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    @include('_header')

    <div class="layout_stuff">
        <h1 class="title_page">Mis Cosas</h1>

        <div class="sub_menu">
            <div>Mi lista</div>
            <div>Continuar viendo</div>
        </div>
        <div class="userList">
            @foreach ($videos as $video )
            <div class="video__stuff">
                <img src="{{ asset('img/'.$video->name.'_continueWatching.webp') }}">
            </div>
            @endforeach
        </div>


        <div class="subTitle forYou">Recomnedados para tí</div>
        <div class="userList recommended">

            @foreach ($videos_foryou as $video_foryou )
            <div class="video"><img src="{{ asset('img/'.$video_foryou->name.'_poster.webp') }}"></div>
            @endforeach


        </div>

    </div>

</body>

</html>