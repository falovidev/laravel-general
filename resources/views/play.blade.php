<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/functions.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>


    @include('partial._header')
    <div class="container_preview" style="background-image: url('/img/{{ $videos->name }}_preview.webp');">
        <div class="preview pPlay">

            <div class="imge_title">
                <div class="img_title"><img src="{{ asset('img/'.$videos->name.'_title.webp') }}" alt=""></div>
            </div>

            <div class="metaData">
                <div class="clasification">13+</div>
                <div class="year">2023</div>
            </div>

            <div id="buttonsPlay" class="buttons">
                @include('partial._buttonsPlay', [
                'videoExists' => $videoExists
                ])
            </div>


            <div id="buttonToggleStuff" class="favorite add">
                    @include('partial._buttonToggleStuff', [
                    'videos' => $videos                    
                    ])
            </div>

            <div class="description inPlay">
                {{$videos->review}}
            </div>


        </div>
    </div>






</body>

</html>