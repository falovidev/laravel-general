<div class="userList">
    @foreach ($videos as $video)
    @php
    $urlVideo = route('videos.play', ['id' => $video->videoid]);
    @endphp

    <div class="video">
        <img id='{{$video->videoid}}' onclick="goPlay('{{$urlVideo  }}')" src="{{ asset('img/'.$video->name.'_poster.webp') }}">


        <svg id="icon_home_menu_{{ $video->videoid }}" xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 24 24" role="img" aria-hidden="true" class="icon_menu_points poster">
            <g>
                <path d="M13.375 5.25a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0zM13.375 12a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0zM13.375 18.75a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0z"></path>
            </g>
        </svg>

        <div id="modal_home_nmenu_poster_{{ $video->videoid }}" style="opacity: 0;" class="modal_menu">

            @if ($video->status === 'no_stuff')
            <div class="menu_option addStuff">
                <div class="icon_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-nwxt9d-0 gVeARu StyledListItemIconLeft-Beam-Web-Ent__sc-755ic-4 kdIMwp">
                        <path clip-rule="evenodd" d="M10 2.583a.75.75 0 0 1 .75.75V9.25h5.917a.75.75 0 0 1 0 1.5H10.75v5.917a.75.75 0 0 1-1.5 0V10.75H3.333a.75.75 0 0 1 0-1.5H9.25V3.334a.75.75 0 0 1 .75-.75z" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="modal_menu__text">Agregar Mi lista</div>
            </div>
            @else
            <div class="menu_option removeStuff poster">
                <div class="icon_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 hhqjpC StyledListItemIconLeft-Beam-Web-Ent__sc-1dhwxqj-4 iKCDjd">
                        <path clip-rule="evenodd" d="M17.182 5.289a.75.75 0 0 1 .03 1.06L8 16.092 2.79 10.58a.75.75 0 1 1 1.09-1.03L8 13.907l8.122-8.59a.75.75 0 0 1 1.06-.03z" fill-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="modal_menu__text">Quitar de Mi lista</div>
            </div>
            @endif

            <div class="menu_option">
                <div class="icon_modal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 hhqjpC StyledListItemIconLeft-Beam-Web-Ent__sc-1dhwxqj-4 iKCDjd">
                        <g>
                            <path d="M11.26 6.414a.813.813 0 1 1-1.626 0 .813.813 0 0 1 1.627 0zM10.129 8.04c.234 0 .417.067.55.2s.197.304.197.514c0 .188-.044.43-.132.728l-.967 3.074a.915.915 0 0 0-.066.343c0 .229.073.343.22.343.183 0 .403-.08.66-.24.256-.165.476-.304.659-.419l.132-.096c.03 0 .084.044.165.13.08.088.12.15.12.186-.124.133-.351.302-.681.508a6.991 6.991 0 0 1-1.055.549c-.381.155-.726.233-1.034.233-.234 0-.417-.066-.55-.199a.699.699 0 0 1-.197-.515c0-.137.051-.38.154-.727l.901-2.868c.073-.27.11-.453.11-.55 0-.228-.073-.343-.22-.343-.088 0-.209.037-.363.11-.146.073-.29.156-.428.247-.14.087-.242.156-.308.206l-.11.083c-.03 0-.084-.044-.165-.13-.08-.088-.12-.15-.12-.186.116-.124.329-.277.637-.46.308-.187.637-.354.99-.5.35-.147.651-.22.9-.22z"></path>
                            <path clip-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm6.5-8a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" fill-rule="evenodd"></path>
                        </g>
                    </svg>
                </div>
                <div class="modal_menu__text">Más información</div>
            </div>

        </div>

    </div>

    @endforeach

</div>