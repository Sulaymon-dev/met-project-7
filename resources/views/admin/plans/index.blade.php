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
                                <i class="fa fa-align-justify"></i> Рӯйхати плани дарсӣ
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
                                    <th>Фан</th>
                                    <th>Синф</th>
                                    <th>Китоб</th>
                                    @if(auth()->user()->role !='teacher')
                                        <th>Муаллиф</th>
                                    @endif
                                    <th>Миқдори дарсҳо</th>
                                    <th>Статус</th>
                                    @if(in_array(auth()->user()->role,['admin','superadmin','teacher'] ))
                                        <th>Амал</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($plans as $plan)
                                    <tr id="sub-{{$plan->id}}">
                                        <td>{{$plan->id}}</td>
                                        <td>{{$plan->subject->name}}</td>
                                        <td>{{$plan->sinf->class}}</td>

                                        <td>{{$plan->book->name}}</td>
                                        @if(auth()->user()->role !='teacher')
                                            <td>{{$plan->user->name}}</td>
                                        @endif
                                        <td>
                                        <span class="badge badge-primary rounded-circle p-3">
                                             {{count($plan->themes)}}
                                        </span>
                                        </td>
                                        <td>{!!  $plan->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{route('plans.edit',$plan->id)}}"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(in_array(auth()->user()->role,['admin','teacher','superadmin']))
                                                <a class="btn btn-danger"
                                                   onclick="deleteSubjectHandler(event,{{$plan->id}})"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$plans->links()}}
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
                                text: "Синфии интихобшуда бо муваффақият нобуд шуд",
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
