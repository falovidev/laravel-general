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

    @php
        use Illuminate\Support\Arr;
        $randomVideo = Arr::random($videos->toArray());
    @endphp

    <div class="container_preview" style="background-image: url('/img/{{ $randomVideo['name'] }}_preview.webp');">
        <div class="preview">
        
            <div class="imge_title">
                <div class="img_title"><img src="{{ asset('img/'.$randomVideo['name'].'_title.webp') }}" alt=""></div>
            </div>

            <div class="metaData">
                <div class="clasification">{{$randomVideo['age']}}+</div>
                <div class="year">{{$randomVideo['year']}}</div>
            </div>
            <div class="description">
               {{$randomVideo['review']}}
            </div>

            <div class="button">
                <a href="/{{$randomVideo['id']}}"><button class="goto">Ir a la pelicula</button></a>
            </div>

        </div>
    </div>

    <div class="subTitle forYou">Películas para ti</div>
    <div class="userList">

    @foreach ($videos as $video )
    <div class="video"><img src="{{ asset('img/'.$video->name.'_poster.webp') }}"></div>
        
    @endforeach


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