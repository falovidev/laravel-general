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

    <div class="container_preview" style="background-image: url('/img/{{ $videos->name }}_preview.webp');">
        <div class="preview pPlay">

            <div class="imge_title">
                <div class="img_title"><img src="{{ asset('img/'.$videos->name.'_title.webp') }}" alt=""></div>
            </div>

            <div class="metaData">
                <div class="clasification">13+</div>
                <div class="year">2023</div>
            </div>

            <div class="buttons">
                <div class="play">
                    <button>
                        <div class="buttonStart">
                            <div class="svgPlay">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 geJlZY" style="height: 25px; width: 25px;">
                                    <path d="M5.777 17.815A.5.5 0 0 1 5 17.399V2.6a.5.5 0 0 1 .777-.416l11.099 7.399a.5.5 0 0 1 0 .832z"></path>
                                </svg>
                            </div>

                            <div class="playStart">
                                <div class="rStart">Reanudar</div>
                                <div class="progress_bar">
                                    <div class="progress__Play" style="width:70%;"></div>
                                    <div class="bar__Play" style="width:30%;"></div>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>

                <div class="restart">
                    <button>

                    <div class="buttonReStart">
                        <div class="svgReStart">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 hhqjpC" style="height: 20px; width: 20px;">
                                <path d="M4.199 6.392a6.606 6.606 0 1 1-.688 5.348.75.75 0 1 0-1.437.433 8.073 8.073 0 0 0 2.938 4.177A8.106 8.106 0 1 0 3.119 5.3V3.27a.75.75 0 0 0-1.5 0v4.622h4.62a.75.75 0 1 0 0-1.5z"></path>
                            </svg>
                        </div>

                       <div class="reStart"> Reiniciar</div>
                       </div>
                    </button>
                </div>
            </div>
            <div class="favorite add">
                <button>
                    <div class="internalButton">
                        <div class="plus"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 25 25" width="25" height="25" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                <defs>
                                    <clipPath id="__lottie_element_832">
                                        <rect width="25" height="25" x="0" y="0"></rect>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#__lottie_element_832)">
                                    <g transform="matrix(1,0,0,1,3.5,3)" opacity="1" style="display: block;">
                                        <g opacity="1" transform="matrix(1,0,0,1,9,9)">
                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M0,-9 C0.5519999861717224,-9 1,-8.552000045776367 1,-8 C1,-8 1,-1 1,-1 C1,-1 8,-1 8,-1 C8.552000045776367,-1 9,-0.5519999861717224 9,0 C9,0.5519999861717224 8.552000045776367,1 8,1 C8,1 1,1 1,1 C1,1 1,8 1,8 C1,8.552000045776367 0.5519999861717224,9 0,9 C-0.5519999861717224,9 -1,8.552000045776367 -1,8 C-1,8 -1,1 -1,1 C-1,1 -8,1 -8,1 C-8.552000045776367,1 -9,0.5519999861717224 -9,0 C-9,-0.5519999861717224 -8.552000045776367,-1 -8,-1 C-8,-1 -1,-1 -1,-1 C-1,-1 -1,-8 -1,-8 C-1,-8.552000045776367 -0.5519999861717224,-9 0,-9z"></path>
                                        </g>
                                    </g>
                                    <g transform="matrix(-0.1081833466887474,0.9941309690475464,-0.9941309690475464,-0.1081833466887474,20.557567596435547,5.1851043701171875)" opacity="0.0002499999944127751" style="display: none;">
                                        <g opacity="1" transform="matrix(1,0,0,1,9,6.728000164031982)">
                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M8.687000274658203,-6.453999996185303 C9.088000297546387,-6.074999809265137 9.105999946594238,-5.441999912261963 8.72700023651123,-5.039999961853027 C8.72700023651123,-5.039999961853027 -2.4000000953674316,6.728000164031982 -2.4000000953674316,6.728000164031982 C-2.4000000953674316,6.728000164031982 -8.72700023651123,0.03700000047683716 -8.72700023651123,0.03700000047683716 C-9.105999946594238,-0.36500000953674316 -9.088000297546387,-0.996999979019165 -8.687000274658203,-1.3769999742507935 C-8.28600025177002,-1.75600004196167 -7.6529998779296875,-1.7389999628067017 -7.2729997634887695,-1.3370000123977661 C-7.2729997634887695,-1.3370000123977661 -2.4000000953674316,3.816999912261963 -2.4000000953674316,3.816999912261963 C-2.4000000953674316,3.816999912261963 7.2729997634887695,-6.414000034332275 7.2729997634887695,-6.414000034332275 C7.6529998779296875,-6.815999984741211 8.28600025177002,-6.833000183105469 8.687000274658203,-6.453999996185303z"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div>Mi lista</div>
                    </div>
                </button>
            </div>
            <div class="description inPlay">
            {{$videos->review}}

            </div>


        </div>
    </div>






</body>

</html>