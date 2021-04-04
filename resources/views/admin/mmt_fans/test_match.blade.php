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
                                <div class="alert alert-danger ">baroi ilovai testi muvofiqovari avval plani darsi va
                                    nomi mabzuro intikhob namoed
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="plan">
                                            Мавзӯи тест :
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
                            <div class="container" id="test-data"></div>
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
            var matching = [];
            var domObject = '<div class="container" >';
            allTests = JSON.parse(tests);
            if (typeof allTests.tests == "object")
                allTests.tests.forEach(function (test) {
                    if (test.type == 'matching') {
                        matching = test.data;
                        return;
                    }
                });
            if (matching.length <= 0) {
                matching.push(
                    {
                        "terms": [
                            {
                                "id": 0,
                                "text": ""
                            },
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
                            },
                            {
                                "id": 5,
                                "text": ""
                            }
                        ],
                        "definitions": [
                            {
                                "id": 0,
                                "text": ""
                            },
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
                            },
                            {
                                "id": 5,
                                "text": ""
                            }
                        ],
                        "pairs": {
                            "0": 0,
                            "1": 1,
                            "2": 2,
                            "3": 3,
                            "4": 4,
                            "5": 5
                        },
                        "question": ""
                    }
                )
            }
            domObject += `<div id="quizContainer">`;
            matching.forEach(function (quiz, i) {
                domObject += `<div class="row match_term border border-info p-3 mt-3" id="quiz${i}">`;
                domObject += `<div class="d-flex justify-content-between w-100 my-1"><label for="q${i}"> Матни пурсиш </label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <textarea rows="6" id="q${i}" placeholder="Матни пурсишро инҷо ворид созед" class="form-control quizQuestion">${quiz.question}</textarea>`;
                domObject += `<div class="col-md-6 termList">`;
                quiz.terms.forEach(function (term, j) {
                    domObject += `
                    <div class="form-group">
                        <label for="term${j + 1}">Саволи ${j + 1}</label>
                        <input type="text" class="form-control" id="term${j + 1}" name="term${j + 1}" placeholder="Саволро ворид созед" value="${term.text}">
                    </div>`
                });
                domObject += `</div>`;
                domObject += `<div class="col-md-6 definitionList">`;
                quiz.definitions.forEach(function (definition, j) {
                    domObject += `<div class="form-group">
                        <label for="definition${j + 1}">Ҷавоби ${j + 1}</label>
                        <input type="text" class="form-control" id="definition${j + 1}" name="definition${j + 1}" placeholder="Ҷавобро ворид созед" value="${definition.text}">
                    </div>`;
                });
                domObject += `</div></div>`;
            });
            domObject += '</div>';

            domObject += `<div class="d-flex align-items-baseline justify-content-between my-3">
                <button type="button" class="btn btn-info" onclick="addQuiz()"> ADD</button>
                <button type="button" class="btn btn-success" onclick="saveQuizzes()">Save</button>
            </div>`;

            domObject += '</div>';

            $('#test-data').html(domObject);
        }

        function saveQuizzes() {
            var q4in1 = {
                "data": [],
                "type": "matching"
            };

            $('.match_term').each(function (quizIndex) {
                var obj = {
                    terms: [],
                    definitions:[],
                    question: $(this).find('textarea').val(),
                    pairs: {
                        "0": 0,
                        "1": 1,
                        "2": 2,
                        "3": 3,
                        "4": 4,
                        "5": 5
                    }
                };
                $(this).find('.termList input').each(function (i) {
                    obj.terms.push({
                        "id": i + 1,
                        "text": $(this).val()
                    });
                });
                $(this).find('.definitionList input').each(function (i) {
                    obj.definitions.push({
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
                    if (test.type == 'matching') {
                        allTests.tests[i] = q4in1;
                        isTestSet = true;
                        return;
                    }
                });
                if (!isTestSet) {
                    allTests.tests.push(q4in1)
                }
            }
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
                            text: "Синфии интихобшуда бо муваффақият нобуд шуд",
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
            var i = $('.match_term').length;
            domObject += `<div class="row match_term border border-info p-3 mt-3" id="quiz${i}">`;
            domObject += `<div class="d-flex justify-content-between w-100 my-1"><label for="q${i}"> Матни пурсиш </label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <textarea rows="6" id="q${i}" placeholder="Матни пурсишро инҷо ворид созед" class="form-control quizQuestion"></textarea>`;
            domObject += `<div class="col-md-6 termList">`;
            [0,1,2,3,4,5].forEach(function (term, j) {
                domObject += `
                    <div class="form-group">
                        <label for="term${j + 1}">Саволи ${j + 1}</label>
                        <input type="text" class="form-control" id="term${j + 1}" name="term${j + 1}" placeholder="Саволро ворид созед">
                    </div>`
            });
            domObject += `</div>`;
            domObject += `<div class="col-md-6 definitionList">`;
            [0,1,2,3,4,5].forEach(function (definition, j) {
                domObject += `<div class="form-group">
                        <label for="definition${j + 1}">Ҷавоби ${j + 1}</label>
                        <input type="text" class="form-control" id="definition${j + 1}" name="definition${j + 1}" placeholder="Ҷавобро ворид созед">
                    </div>`;
            });
            domObject += `</div></div>`;

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
