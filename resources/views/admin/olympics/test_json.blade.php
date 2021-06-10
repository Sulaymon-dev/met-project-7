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
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Тести "4х1"-и фанҳо
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="plan">
                                            Мавзӯи тестҳо :
                                        </label>
                                        <select class="form-control" name="theme_id" id="theme">
                                            <option value="0">Мавзӯъро интихоб кунед</option>
                                            @foreach($resource as $res)
                                                <option value="{{$res->id}}">{{$res->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h4 id="quizTitle" class="text-center alert alert-info" style="display: none">Тестҳоро пурра
                                кунед.</h4>
                            <div class="p-3">
                                <textarea class="form-control" rows="10"  id="test-data"></textarea>

                            </div>
                            <div class="d-flex align-items-baseline container justify-content-end my-3">
                                <button type="button" class="btn btn-success" onclick="saveQuizzes()">Save</button>
                            </div>
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
        var textArea= $('#test-data');
        var loader = `
            <p class="alert alert-info text-center h1"> loader </p>
        `;
        var themedata;
        var allTestData;
        var theme_id = 0;


        function saveQuizzes() {
            var allTests =textArea.val();
            $.ajax({
                url: "/admin/olympics/" + theme_id,
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
                            text: "Маводи интихобшуда бо муваффақият нобуд шуд",
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


        $(document).ready(function () {
            $('#theme').on('change', function (e) {
                $('#test-data').html(loader);
                $.ajax('/admin/olympics/' + e.target.value)
                    .done(function (data) {
                        allTestData = data.test;
                        theme_id = data.id;
                        $('#quizTitle').show();
                        textArea.val(allTestData)
                    })
            });
            $('#theme').select2();
        })
    </script>
@endsection
