@php

if (!function_exists('getClassMenu')) {
function getClassMenu($nameView,$nameItem) {
return ($nameView == $nameItem) ? 'view_selected' : '';
}
}
@endphp



<div class="header">
    <div class="logo"> <a href="{{route('videos.index')}}"><img src="{{ asset('img/logo_max.webp') }}" alt=""></a></div>
    <div class="menu_desktop">
        <a href="{{route('videos.index')}}">
            <div class="home {{getClassMenu($nameView,'home')}}">Inicio</div>
        </a>
        <a href="{{route('videos.series')}}">
            <div class="series {{getClassMenu($nameView,'series')}}">Series</div>
        </a>
        <a href="{{route('videos.movies')}}">
            <div class="movies {{getClassMenu($nameView,'movies')}}">Películas</div>
        </a>
        <a href="{{route('videos.hbo')}}">
            <div class="hbo_logo {{getClassMenu($nameView,'hbo')}}">HBO</div>
        </a>
        <a href="{{route('videos.childandfamily')}}">
            <div class="childandfamily {{getClassMenu($nameView,'childandfamily')}}">Niños y Familia</div>
        </a>
    </div>
    <div class="menu_right">
        <div class="search"><img src="{{ asset('img/search.webp') }}" alt=""></div>
        <a href="{{route('videos.stuff')}}">
            <div class="favorite"><img src="{{ asset('img/favorite.webp') }}" alt=""></div>
        </a>
        <div class="avatar"><img src="{{ asset('img/avatar.webp') }}" alt=""></div>
    </div>
</div>