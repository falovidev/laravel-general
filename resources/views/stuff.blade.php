<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mis cosas</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/functions.js') }}" defer></script>
    <script src="{{ asset('js/modalStuff.js') }}" defer></script>
</head>

<body>

    @include('partial._header')

    <div class="layout_stuff">
        <h1 class="title_page">Mis Cosas</h1>

        <div class="sub_menu">
            <div>Mi lista</div>
            <div>Continuar viendo</div>
        </div>


        <div id="videoStuff">
            @include('partial._videoListStuff', [
            'videos' => $videos
            ])
        </div>



        <div class="subTitle forYou">Recomnedados para tí</div>
        <div id="videoPoster" class="recommended">

            @include('partial._videoPoster', [
            'videos' => $videos_foryou
            ])


        </div>

    </div>

</body>

</html>