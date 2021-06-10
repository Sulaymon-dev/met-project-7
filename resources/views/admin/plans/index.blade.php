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
                                <a class="btn btn-info" href="{{route('plans.pdf')}}">Нусхаи PDF</a>
                                <a class="btn btn-warning" href="{{route('plans.create')}}">Иловаи Нақша</a>
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
                                    <th>Муаллиф</th>
                                    <th>Миқдори дарсҳо</th>
                                    <th>Статус</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($plans as $plan)
                                    <tr id="sub-{{$plan->id}}">
                                        <td>{{$plan->id}}</td>
                                        <td>
                                            <a href="/subject/{{$plan->subject->slug}}??sinf={{$plan->sinf->id}}"> {{$plan->subject->name}}</a>
                                        </td>
                                        <td>{{$plan->sinf->class}}</td>

                                        <td>{{$plan->book->name}}</td>
                                        <td>{{$plan->user->name}}</td>
                                        <td>
                                        <span class="badge badge-primary rounded-circle p-3">
                                             {{count($plan->themes)}}
                                        </span>
                                        </td>
                                        <td>{!!  $plan->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        @if($plan->user_id == auth()->id() || in_array(auth()->user()->role,['admin','moderator','superadmin']))
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
                                        @endif

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
                    url: "/admin/plans/" + id,
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
                                title: "Плани дарсӣ нобуд шуд!",
                                text: "Плани дарсии интихобшуда бо муваффақият нобуд шуд",
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
                title: "Мехоҳед ин плани дарсиро нобуд кунед?",
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
