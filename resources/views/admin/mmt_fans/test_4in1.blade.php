@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="/libs/select2/css/select2.min.css">

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('subjects.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Тести "4х1"-и фанҳо
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger ">Барои иловаи тести оддӣ (4х1) ба тестҳои ММТ аввал маҷмӯи тестро интихоб кунед
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="plan">
                                            Мавзӯъ :
                                        </label>
                                        <select class="form-control" name="theme_id" id="theme">
                                            <option value="0">Тестро интихоб кунед</option>
                                            @foreach($mmt_resource as $res)
                                                <option value="{{$res->id}}">{{$res->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 id="quizTitle" class="text-center alert alert-info" style="display: none">Тестҳоро пурра
                                кунед.</h4>
                            <div id="test-data"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/libs/select2/js/select2.full.min.js"></script>
    <script>
        var loader = `
            <p class="alert alert-info text-center h1"> loader </p>
        `;
        var themedata;
        var allTestData;
        var theme_id = 0;

        function setTests(tests) {
            var quiz4x1 = [];
            var domObject = '<div class="container" >';
            allTests = JSON.parse(tests);
            if (typeof allTests.tests == "object")
                allTests.tests.forEach(function (test) {
                    if (test.type == 'quiz4x1') {
                        quiz4x1 = test.data;
                        return;
                    }
                });
            if (quiz4x1.length <= 0) {
                quiz4x1.push(
                    {
                        "answers": [
                            {
                                "id": 1,
                                "text": ""
                            },
                            {
                                "id": 2,
                                "text": ""
                            },
                            {
                                "id": 3,
                                "text": ""
                            },
                            {
                                "id": 4,
                                "text": ""
                            }
                        ],
                        "question": "",
                        "correctAnswer": 1
                    }
                )
            }
            domObject += `<div id="quizContainer">`;
            quiz4x1.forEach(function (quiz, i) {
                domObject += `<div class="border border-primary p-3 mt-3 quizList"  id="quiz${i}">
                    <div class="d-flex justify-content-between mb-1 align-items-baseline">
                                        <label for="q${i}">Матни савол</label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <div class="quizAnswers">
                    <textarea rows="6" id="q${i}" class="form-control quizQuestion">${quiz.question}</textarea>`;
                quiz.answers.forEach(function (answer, j) {
                    domObject += `<div class="form-group quizAnswers">
                                        <label class="form-col-form-label" for="qa${i}+${j}">Ҷавоби ${j == 0 ? "дуруст" : "нодуруст"}:</label>
                                        <input class="form-control border ${j == 0 ? "border-success" : "border-danger"}" id="qa${i}+${j}" type="text" name="theme_num" value="${answer.text}">
                                </div>`
                });
                domObject += "</div></div>"
            });
            domObject += `</div>`;
            domObject += `<div class="d-flex align-items-baseline justify-content-between my-3">
                <button type="button" class="btn btn-info" onclick="addQuiz()"> Иловаи тест</button>
                <button type="button" class="btn btn-success" onclick="saveQuizzes()">Сабт кардан</button>
            </div>`;

            domObject += '</div>';

            $('#test-data').html(domObject);
        }

        function saveQuizzes() {
            var q4in1 = {
                data: [],
                type: "quiz4x1"
            };

            $('.quizList').each(function (quizIndex) {
                var obj = {
                    answers: [],
                    question: $(this).find('textarea').val(),
                    correctAnswer: 1
                };
                $(this).find('.quizAnswers input').each(function (i) {
                    obj.answers.push({
                        "id": i + 1,
                        "text": $(this).val()
                    });
                });
                q4in1.data.push(obj)
            });

            var allTests = JSON.parse(allTestData);
            var isTestSet = false;
            if (typeof allTests.tests == "object") {
                allTests.tests.forEach(function (test, i) {
                    if (test.type == 'quiz4x1') {
                        allTests.tests[i] = q4in1;
                        isTestSet = true;
                        return;
                    }
                });
                if (!isTestSet) {
                    allTests.tests.push(q4in1)
                }
            }

            console.log(allTests);
            $.ajax({
                url: "/admin/mmt_fans/" + theme_id,
                type: 'PUT',
                dataType: "JSON",
                data: {
                    "data": allTests,
                    "isOnlyTestUpdate": true,
                    "_method": 'PUT',
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.status == 'ok') {
                        swal({
                            title: "Мавод тағйир дода шуд!",
                            text: "Тестҳо бо муваффақият сабт шуд",
                            icon: "success",
                            button: "ОК!",
                        });
                    } else {
                        swal({
                            title: "Хатогӣ!",
                            text: "Дар иҷрои амалиёт хатогӣ рӯй дод",
                            icon: "danger",
                            button: "OK",
                        });
                    }
                },
                error: function (error) {
                    swal({
                        title: "Хатогӣ!",
                        text: "Дар иҷрои амалиёт хатогӣ рӯй дод",
                        icon: "danger",
                        button: "OK",
                    });
                }
            })
        }

        function removeQuiz(index) {
            $(`#quiz${index}`).remove()
        }

        function addQuiz() {
            var domObject = '';
            var i = $('.quizList').length;
            domObject = `
            <div class="border border-primary p-3 mt-3 quizList"  id="quiz${i}">
                    <div class="d-flex justify-content-between mb-1 align-items-baseline">
                                        <label for="q${i}">Манти савол</label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <div class="quizAnswers">
                    <textarea rows="6" id="q${i}" class="form-control quizQuestion"></textarea>
            `;
            [0, 1, 2, 3].forEach(function (answer, j) {
                domObject += `<div class="form-group">
                                        <label class="form-col-form-label" for="qa${i}+${j}">Ҷавоби ${j == 0 ? "дуруст" : "нодуруст"}:</label>
                                        <input class="form-control border ${j == 0 ? "border-success" : "border-danger"}" id="qa${i}+${j}" type="text" name="theme_num" value="">
                                </div>`
            });
            domObject += '</div></div>'

            $('#quizContainer').append(domObject);

        }

        $(document).ready(function () {
            $('#theme').on('change', function (e) {
                $('#test-data').html(loader);
                $.ajax('/admin/mmt_fans/' + e.target.value)
                    .done(function (data) {
                        allTestData = data.test;
                        theme_id = data.id;
                        $('#quizTitle').show();
                        setTests(data.test)
                    })
            });

            $('#theme').select2();
        })
    </script>
@endsection
