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
                                <div class="alert alert-danger ">
                                    Барои иловаи тести кушода ба тестҳои ММТ аввал маҷмӯи тестро интихоб кунед
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
                    if (test.type == 'openQuiz') {
                        matching = test.data;
                        return;
                    }
                });
            if (matching.length <= 0) {
                matching.push(
                    {
                        "id": 1,
                        "text": "",
                        "answer": ""
                    },
                )
            }
            domObject += `<div id="quizContainer">`;
            matching.forEach(function (quiz, i) {
                domObject += `<div class="row match_term border border-info p-3 mt-3" id="quiz${i}">`;
                domObject += `<div class="d-flex justify-content-between w-100 my-1"><label for="q${i}"> Матни пурсиш </label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <textarea rows="6" id="q${i}" placeholder="Матни пурсишро инҷо ворид созед" class="form-control quizQuestion">${quiz.text}</textarea>`;
                domObject += `<div class="mt-2 w-100 termList">`;
                domObject += `
                    <div class="form-group">
                        <label for="term${i + 1}">Ҷавоб :</label>
                        <input type="text" class="form-control quizAnswer" id="term${i + 1}" name="term${i + 1}"
                        placeholder="Ҷавобро ворид созед" value="${quiz.answer}">
                    </div>`
                domObject += `</div>`;
                domObject += `</div>`;
            });
            domObject += '</div>';

            domObject += `<div class="d-flex align-items-baseline justify-content-between my-3">
                <button type="button" class="btn btn-info" onclick="addQuiz()">Иловаи тест</button>
                <button type="button" class="btn btn-success" onclick="saveQuizzes()">Сабт</button>
            </div>`;

            domObject += '</div>';

            $('#test-data').html(domObject);
        }

        function saveQuizzes() {
            var q4in1 = {
                "data": [],
                "type": "openQuiz"
            };

            $('.match_term').each(function (quizIndex) {
                var obj = {
                    "id":quizIndex,
                    "text": $(this).find('.quizQuestion').val(),
                    "answer":  $(this).find('.quizAnswer').val()
                };
                q4in1.data.push(obj)
            });

            var allTests = JSON.parse(allTestData);
            var isTestSet = false;
            if (typeof allTests.tests == "object") {
                allTests.tests.forEach(function (test, i) {
                    if (test.type == 'openQuiz') {
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
                            text: "Тестҳо бо муваффақият тағйир дода шуд",
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
            domObject += `<div class="d-flex justify-content-between w-100 my-1"><label for="q${i}"> Матни пурсиш :</label>
                    <button type="button" class="btn btn-danger" onclick="removeQuiz(${i})">X</button>
                    </div>
                    <textarea rows="6" id="q${i}" placeholder="Матни пурсишро инҷо ворид созед" class="form-control quizQuestion"></textarea>`;
            domObject += `<div class="mt-2 w-100 termList">`;
                domObject += `
                    <div class="form-group">
                        <label for="term${i + 1}">Ҷавоб :</label>
                        <input type="text" class="form-control quizAnswer" id="term${i + 1}" name="term${i + 1}" placeholder="Ҷавобро ворид созед">
                    </div>`;
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
