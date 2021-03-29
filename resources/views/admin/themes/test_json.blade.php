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
                                            План :
                                        </label>
                                        <select class="form-control" name="plan_id" id="plan"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="plan">
                                            Мавзӯъ :
                                        </label>
                                        <select class="form-control" name="theme_id" id="theme"></select>
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
                url: "/admin/themes/" + theme_id,
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


        $(document).ready(function () {
            $('#theme').on('change', function (e) {
                $('#test-data').html(loader);
                $.ajax('/admin/themes/' + e.target.value)
                    .done(function (data) {
                        allTestData = data.test;
                        theme_id = data.id;
                        $('#quizTitle').show();
                        textArea.val(allTestData)
                    })
            });
            $('#plan').on('change', function (e) {
                var plan_id = e.target.value;
                themedata.forEach(function (item) {
                    if (plan_id == item.id) {
                        $('#theme').empty();
                        $('#theme').select2({
                            data: [{id: 0, text: "Darsro intikhob kuned"}].concat(item.themes.map(function (theme) {
                                return {
                                    id: theme.id,
                                    text: theme.theme_num + " - " + theme.name
                                }
                            }))
                        });
                    }
                });
            });

            $('#theme').select2();
            $('#plan').select2({
                ajax: {
                    url: '/admin/plans/list',
                    data: function (params) {
                        var query = {
                            withThemes: true,
                            search: params.term,
                            page: params.page || 1
                        };
                        return query;
                    },
                    processResults: function (data, page) {
                        themedata = data.data;
                        return {
                            results: data.data.map(function (item) {
                                return {
                                    id: item.id,
                                    text: `Фанни ${item.subject.name}, синфи ${item.sinf.class}`
                                };
                            }),
                            pagination: {
                                more: data.current_page < data.last_page
                            }
                        };
                    },
                }
            })
        })
    </script>
@endsection
