@if($test && count($test)>0)
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
                                                    <div id="test-container">
                                                        <div class="quiz-container">
                                                            <div id="quiz">
                                                                <!-- quiz4x1 appended here -->
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="quiz-buttons">
                                                            <button id="previous">Саволи
                                                                пешина
                                                            </button>
                                                            <button id="next">Саволи оянда
                                                            </button>
                                                            <button id="submit">Натиҷа
                                                            </button>
                                                        </div>
                                                        <div id="results"></div>
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

    <script>
        {{--        <?php $testData = @json($test['tests']) ?>--}}

        console.log(`@json($test['tests'])`)
        var testData = JSON.parse(`@json($test['tests'])`);
        testData.forEach((el) => {
            if (el.type === 'quiz4x1') {
                <?php $type = 'quiz4x1' ?>
                    window.quiz = el.data;
            }
            if (el.type === 'matching') {
                <?php $type = 'matching' ?>
                    window.crosswordData = el.data;
            }
            if (el.type === 'openQuiz') {
                <?php $type = 'openQuiz' ?>
                    window.openQuiz = el.data;
            }
        });
    </script>


    @if(isset($test['scripts']))
        @foreach ($test['scripts'] as $src)
            <script src="/front{{ $src }}"></script>
        @endforeach
    @endif
@endif
