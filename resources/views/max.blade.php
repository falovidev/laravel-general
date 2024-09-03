<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/functions.js') }}" defer></script>
    <script src="{{ asset('js/modalStuff.js') }}" defer></script>

</head>

<body>


    @include('partial._header')

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
                <a href="/{{$randomVideo['videoid']}}"><button class="goto">Ir a la {{ ($vista=="any")? $randomVideo['tipo']: $vista}}</button></a>
            </div>
>
        </div>
    </div>


    <div class="subTitle forYou">{{ $typeforYou}}</div>
    <div id="videoPoster">
        @include('partial._videoPoster', [
        'videos' => $videos
        ])
    </div>

    <div id="videoPlayed">
        @include('partial._videoPlayed', [
        'videoPlay' => $videoPlay
        ])
    </div>






</body>

</html>