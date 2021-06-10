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
                                <i class="fa fa-align-justify"></i> Рӯйхати синфҳо
                            </div>
                            @if(in_array(auth()->user()->role,['admin','superadmin']))
                                <div>
                                    <a class="btn btn-info" href="{{route('sinfs.pdf')}}">Нусхаи PDF</a>
                                    <a class="btn btn-warning" href="{{route('sinfs.create')}}">Синфи нав</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Синф</th>
                                    <th>Статус</th>
                                    @if(in_array(auth()->user()->role,['admin','superadmin'] ))
                                        <th>Амал</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($sinfs as $sinf)
                                    <tr id="sub-{{$sinf->id}}">
                                        <td>{{$sinf->id}}</td>
                                        <td>{{$sinf->class}}</td>
                                        <td>{!!  $sinf->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        @if(in_array(auth()->user()->role,['admin','superadmin'] ))
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{route('sinfs.edit',$sinf->id)}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger"
                                                   onclick="deleteSubjectHandler(event,{{$sinf->id}})"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                    url: "/admin/sinfs/" + id,
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
                                title: "Синф нобуд шуд!",
                                text: "Синфи интихобшуда бо муваффақият нобуд шуд",
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
                title: "Мехоҳед ин синфро нобуд кунед?",
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
