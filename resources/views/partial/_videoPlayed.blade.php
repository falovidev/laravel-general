<div class="subTitle continueWatching">{{count($videoPlay) !== 0?'Continuar viendo':false}}</div>


<div class="userList">

    

    @foreach ($videoPlay as $videoCw )

    
        <div class="video cw" style="background-image: url(/img/{{$videoCw->name}}_continueWatching.webp);">

            <svg id="icon_home_menu_continue_watching_{{ $videoCw->videoid }}" xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 24 24" role="img" aria-hidden="true" class="icon_menu_points cw">
                <g>
                    <path d="M13.375 5.25a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0zM13.375 12a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0zM13.375 18.75a1.375 1.375 0 1 1-2.75 0 1.375 1.375 0 0 1 2.75 0z"></path>
                </g>
            </svg>
            
            <div id="modal_home_nmenu_cw_{{ $videoCw->videoid }}" style="opacity: 0;" class="modal_menu">
                <div class="menu_option removeContinueWatching">
                    <div class="icon_modal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" focusable="false" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 hhqjpC StyledListItemIconLeft-Beam-Web-Ent__sc-1dhwxqj-4 iKCDjd">
                            <path clip-rule="evenodd" d="M17.182 5.289a.75.75 0 0 1 .03 1.06L8 16.092 2.79 10.58a.75.75 0 1 1 1.09-1.03L8 13.907l8.122-8.59a.75.75 0 0 1 1.06-.03z" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="modal_menu__text">Quitar</div>
                </div>

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



        <svg class="play" xmlns="http://www.w3.org/2000/svg" fill="#fff" stroke="#fff" viewBox="0 0 24 24" role="img">
            <path d="M6.777 21.482A.5.5 0 0 1 6 21.066V2.934a.5.5 0 0 1 .777-.416l13.599 9.066a.5.5 0 0 1 0 .832z"></path>
        </svg>
        <div class="progress_bar">
            <div class="progress" style="width:{{ $videoCw->time }}%;"></div>
            <div class="bar" style="width:{{ 100 - $videoCw->time }}%;"></div>
        </div>

    </div>

    @endforeach

</div>