<div class="instructor-cont">
    <div class="instructor-description ">
        @if(sizeof($test)>0)
            <div style="display: flex">
                <div class="col-lg-10">
                    <div class="teachers-right ">
                        <div class="tab-content" id="myTabContent">
                            @foreach($test['tests'] as $key=>$item)
                                <div
                                    class="tab-pane fade {{($key==0)?'show active':''}}"
                                    id="dashboard{{$key}}"
                                    role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="dashboard-cont">
                                        @if($item['type']=='quiz4x1')
                                            <div id="quiz4x1">
                                                <div id="test-container" style="height: 700px">
                                                    <div id="results"></div>
                                                    <div class="clearfix"></div>
                                                    <div class="quiz-buttons">
                                                        <button id="previous">Саволи пешина</button>
                                                        <button id="next">Саволи оянда</button>
                                                        <button id="submit">Натиҷа</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="quiz-container">
                                                        <div id="quiz">
                                                            <!-- quiz4x1 appended here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($item['type']=='matching')
                                            <div id="matching">
                                                <section class="section1">
                                                    <span class="question_matching" id="question_matching"></span>
                                                    <ul class="upper" id="terms"></ul>
                                                    <ul class="upper" id="defs"></ul>
                                                    <li id="results_matching" class="matchingResult"></li>

                                                    <button class="button" name="reset_matching"
                                                            style="display: none"
                                                            id="reset_matching"> Аз нав
                                                    </button>
                                                    <button class="button" name="next_matching" id="next_matching">
                                                        Тести дигар
                                                    </button>
                                                </section>
                                            </div>
                                        @elseif($item['type']=='openQuiz')
                                            <div id="openQuiz"></div>
                                        @elseif($item['type']=='quiz-icon')
                                            <div id="icon-quiz">
                                                <section class="scores">
                                                    <span class="correct">0</span>/<span class="total">0</span>
                                                    <button id="play-again-btn">Аз нав бозӣ кардан</button>
                                                </section>
                                                <section class="draggable-items"></section>
                                                <section class="matching-pairs"></section>
                                            </div>
                                        @elseif($item['type']=='sortQuiz')
                                            <div id="sortQuiz">
                                                <h6>Номҳоро аз рӯйи алфавит ҷобаҷо намоед</h6>
                                                <ul class="draggable-list" id="draggable-list"></ul>
                                                <button id="check" class="check-btn">
                                                    Санҷидан <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        @elseif($item['type']=='sum34quiz')
                                            <div id="sum34quiz">
                                                <h6 style="text-align:center">Ба ҷойҳои холӣ рақамҳои аз 1 то 16 гузоред,
                                                    ки суммаи ҳамаи сатрҳо, сутунҳо ва диагналҳои квадрат ба 34 баробар шавад. </h6>
                                                <div id="square">
                                                    <div id="div-1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-4">1</div>
                                                    <div id="div-5">4</div>
                                                    <div id="div-6">9</div>
                                                    <div id="div-7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-9" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-10" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-11" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-12" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-13">10</div>
                                                    <div id="div-14" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-15" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                                                    <div id="div-16">8</div>
                                                </div>

                                                <div id="numbers" ondrop="drop(event)" ondragover="allowDrop(event)">
                                                    <div id="number-1" draggable="true" ondragstart="drag(event)">
                                                        <p>2</p>
                                                    </div>
                                                    <div id="number-2" draggable="true" ondragstart="drag(event)">
                                                        <p>3</p>
                                                    </div>
                                                    <div id="number-3" draggable="true" ondragstart="drag(event)">
                                                        <p>5</p>
                                                    </div>
                                                    <div id="number-4" draggable="true" ondragstart="drag(event)">
                                                        <p>6</p>
                                                    </div>
                                                    <div id="number-5" draggable="true" ondragstart="drag(event)">
                                                        <p>7</p>
                                                    </div>
                                                    <div id="number-6" draggable="true" ondragstart="drag(event)">
                                                        <p>11</p>
                                                    </div>
                                                    <div id="number-7" draggable="true" ondragstart="drag(event)">
                                                        <p>12</p>
                                                    </div>
                                                    <div id="number-8" draggable="true" ondragstart="drag(event)">
                                                        <p>13</p>
                                                    </div>
                                                    <div id="number-9" draggable="true" ondragstart="drag(event)">
                                                        <p>14</p>
                                                    </div>
                                                    <div id="number-10" draggable="true" ondragstart="drag(event)">
                                                        <p>15</p>
                                                    </div>
                                                    <div id="number-11" draggable="true" ondragstart="drag(event)">
                                                        <p>16</p>
                                                    </div>
                                                </div>

                                                <div id="sum-info">
                                                    <div id="sum-diag-1">17</div>
                                                    <div id="sum-col-1">14</div>
                                                    <div id="sum-col-2">9</div>
                                                    <div id="sum-col-3">0</div>
                                                    <div id="sum-col-4">9</div>
                                                    <div id="sum-diag-2">11</div>
                                                    <div id="sum-row-1">1</div>
                                                    <div id="sum-row-2">13</div>
                                                    <div id="sum-row-3">0</div>
                                                    <div id="sum-row-4">18</div>
                                                </div>
                                            </div>
                                        @elseif($item['type']=='puzzleQuiz')
                                            <div id="puzzleQuiz">
                                                <div class="main">
                                                    <h6>ПАЗЛ</h6>
                                                    <div class="dnd-image-drag cf  d-flex">
                                                        <div class="container">
                                                            <p>Расмро ҷобаҷо кунед</p>
                                                            <div class="inner gallery-list cf">
                                                                <img draggable="true" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/ie_big_image_2.jpg" class="drag" data-value="2" />
                                                                <img draggable="true" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/ie_big_image_3.jpg" class="drag" data-value="3" />
                                                                <img draggable="true" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/ie_big_image_1.jpg" class="drag" data-value="1" />
                                                                <img draggable="true" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/ie_big_image_4.jpg" class="drag" data-value="4" />
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <p>Қисмҳои расмро ба инҷо ҷобаҷо кунед</p>
                                                            <div class="inner gallery-painting cf">
                                                                <div class="drop" data-value="1"></div>
                                                                <div class="drop" data-value="2"></div>
                                                                <div class="drop" data-value="3"></div>
                                                                <div class="drop" data-value="4"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-container"></div>
                                                    <button class="reset-button">Аз нав</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 tests-tab">
                    <ul class="nav nav-justified" style="display: block" id="myTab"
                        role="tablist">
                        @foreach($test['tests'] as $key=>$item)
                            <li class="nav-item">
                                <a class="{{($key==0)?'active':''}}"
                                   id="dashboard-tab{{$key}}"
                                   data-toggle="tab"
                                   href="#dashboard{{$key}}" role="tab"
                                   aria-controls="dashboard{{$key}}"
                                   aria-selected="true">
                                    @if($item['type']=='quiz4x1')
                                        Тести пӯшида
                                    @elseif($item['type']=='matching')
                                        Мувофиковарӣ
                                    @elseif($item['type']=='openQuiz')
                                        Тести кушод
                                    @elseif($item['type']=='quiz-icon')
                                        Расмҳо
                                    @elseif($item['type']=='sortQuiz')
                                        Ҷо ба ҷо
                                    @elseif($item['type']=='sum34quiz')
                                        Суммаи квадрат
                                    @elseif($item['type']=='puzzleQuiz')
                                        Пазлҳо
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <x-danger-text text="Зергурӯҳи зерин вуҷуд надорад..."></x-danger-text>
        @endif
    </div>
</div>
