

            @if (!$videoExists)
              <div class="onlyPlay" onclick="addContinueWatching('{{$videos->videoid}}')">
                    <div class="play">
                        <button>
                            <div class="buttonStart">
                                <div class="svgPlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 geJlZY" style="height: 25px; width: 25px;">
                                        <path d="M5.777 17.815A.5.5 0 0 1 5 17.399V2.6a.5.5 0 0 1 .777-.416l11.099 7.399a.5.5 0 0 1 0 .832z"></path>
                                    </svg>
                                </div>
                                <div class="playStart">
                                    <div class="">Ver ahora</div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                @else
                    
                <div class="playRestart buttons" >
                    <div class="play">
                        <button onclick="playContinueWatching('{{$videos->videoid}}')">
                            <div class="buttonStart">
                                <div class="svgPlay">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" stroke="#fff" viewBox="0 0 20 20" role="img" aria-hidden="true" class="StyledIcon-Beam-Web-Ent__sc-f0xyuv-0 geJlZY" style="height: 25px; width: 25px;">
                                        <path d="M5.777 17.815A.5.5 0 0 1 5 17.399V2.6a.5.5 0 0 1 .777-.416l11.099 7.399a.5.5 0 0 1 0 .832z"></path>
                                    </svg>
                                </div>
                                <div class="playStart">
                                    <div class="rStart">Reanudar</div>
                                    <div class="progress_bar">
                                        <div class="progress__Play" style="width:{{$videoExists->time}}%;"></div>
                                        <div class="bar__Play" style="width:{{100 - $videoExists->time}}%;"></div>
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

                @endif
