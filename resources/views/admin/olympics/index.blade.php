@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-baseline">
                            <div>
                                <i class="fa fa-align-justify"></i> Рӯйхати мавзӯъҳои олимпиадавӣ
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{route('subjects.pdf')}}">Гирифтани PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Фан</th>
                                    <th>Синф</th>
                                    @if($role !='teacher')
                                        <th>Муаллиф</th>
                                    @endif
                                    <th>Вазъият</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($olympics as $olympic)
                                    <tr id="sub-{{$olympic->id}}">
                                        <td>{{$olympic->id}}</td>
                                        <td>{{$olympic->subject->name}}</td>
                                        <td>{{$olympic->sinf->class}}</td>
                                        @if($role !='teacher')
                                            <td>{{$olympic->user->name}}</td>
                                        @endif
                                        <td>{!!  $olympic->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('olympics.edit',$olympic->id)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(in_array($role,['admin','teacher','superadmin']))
                                                <a class="btn btn-danger"
                                                   onclick="deleteSubjectHandler(event,{{$olympic->id}})"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$olympics->links()}}
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
                    url: "/admin/olympics/" + id,
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
                                title: "Мавзӯъ нобуд шуд!",
                                text: "Мавзӯъи интихобшуда бо муваффақият нобуд шуд",
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
                title: "Мехоҳед ин мавзӯъро нобуд кунед?",
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
