@extends('admin.layouts.main')

@section('style')
    <style>
        .table th, .table td, .table tr {
            vertical-align: inherit !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-baseline">
                            <div>
                                <i class="fa fa-align-justify"></i> Рӯйхати Тесҳо
                            </div>
                            <div>
                                <a class="btn btn-info" href="{{route('mmts.create')}}">Ҳамҷоякунии нав</a>
                                <a class="btn btn-warning" href="{{route('subjects.pdf')}}">Гирифтани PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Номи тест</th>
                                    <th>Фан</th>
                                    <th>Кластер</th>
                                    <th>Компонент</th>
                                    <th>Статус</th>
                                    @if(in_array(auth()->user()->role,['admin','superadmin','teacher'] ))
                                        <th>Амал</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($mmts as $mmt)
                                    <tr id="sub-{{$mmt->id}}">
                                        <td>{{$mmt->id}}</td>
                                        <td>{{$mmt->mmt_fan->title}}</td>
                                        <td>{{$mmt->subject->name}}</td>
                                        <td>{{$mmt->cluster->name}}</td>
                                        <td>{{$mmt->component}}</td>
                                        <td>{!!  $mmt->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('mmts.edit',$mmt->id)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(in_array(auth()->user()->role,['admin','teacher','superadmin']))
                                                <a class="btn btn-danger"
                                                   onclick="deleteSubjectHandler(event,{{$mmt->id}})"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$mmts->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteSubject(id) {
            $.ajax(
                {
                    url: "/admin/mmts/" + id,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        if (response.status == 'ok') {
                            swal({
                                title: "Маълумот нобуд шуд!",
                                text: "Сабти интихобшуда бо муваффақият нобуд шуд",
                                icon: "success",
                                button: "ОК!",
                            });
                            $('#sub-' + id).remove()
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
                });
        }

        function deleteSubjectHandler(e, id) {
            e.preventDefault();
            swal({
                title: "Мехоҳед ин сабтро нобуд кунед?",
                text: "Дар ҳолати нобуд кардани сабт он бар намегардад!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        deleteSubject(id)
                    } else {
                        swal("Амалиёт қатъ шуд!");
                    }
                });
        }
    </script>
@endsection
