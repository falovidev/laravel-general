<div class="header">
    <div class="logo"> <a href="{{route('videos.index')}}"><img src="{{ asset('img/logo_max.webp') }}" alt=""></a></div>
    <div class="menu_desktop">
        <a href="{{route('videos.index')}}">
            <div class="home {{($vista=='any')? $randomVideo['tipo']: $vista}}">Inicio</div>
        </a>
        <a href="{{route('videos.series')}}">
            <div class="series">Series</div>
        </a>
        <a href="{{route('videos.movies')}}">
            <div class="movies">Películas</div>
        </a>
        <a href="{{route('videos.hbo')}}">
            <div class="hbo_logo"><img src="{{ asset('img/hbo_logo.webp') }}" alt=""></div>
        </a>
        <a href="{{route('videos.childandfamily')}}">
            <div class="childandfamily">Niños y Familia</div>
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