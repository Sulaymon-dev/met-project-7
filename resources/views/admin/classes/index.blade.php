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
                                <i class="fa fa-align-justify"></i> Рӯйхати фанҳо
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{route('subjects.pdf')}}">Гирифтани PDF</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Номи Фан</th>
                                    <th>Синф</th>
                                    <th>Намуди фан</th>
                                    <th>Статус</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($subjects as $subject)
                                    <tr id="sub-{{$subject->id}}">
                                        <td>{{$subject->id}}</td>
                                        <td>{{$subject->label}}</td>
                                        <td>{{$subject->class}}</td>
                                        <td>{{$subject->type}}</td>
                                        <td>{!!  $subject->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('subjects.edit',$subject->id)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger"
                                               onclick="deleteSubjectHandler(event,{{$subject->id}})"> <i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Prev</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
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
                    url: "/admin/subjects/" + id,
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
                                title: "Фан нобуд шуд!",
                                text: "Фанни интихобшуда бо муваффақият нобуд шуд",
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
                title: "Мехоҳед ин фанро нобуд кунед?",
                text: "Дар ҳолати нобуд кардани сабт он бар намегардад!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        deleteSubject(id)
                    } else {
                        swal("Амалиёт лағв шуд!");
                    }
                });
        }
    </script>
@endsection
