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
                                <i class="fa fa-align-justify"></i> Рӯйхати истифодабарандагон
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
                                    <th>Ном</th>
                                    <th>Email</th>
                                    <th>Рол</th>
                                    <th>Вазъият</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr id="sub-{{$user->id}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>

                                        <td>
                                            <select class="form-control"
                                                    onchange="changeRoleHandler(event,{{$user->id}})">
                                                <option {{$user->role =='student' ? 'selected':''}} value="student">
                                                    Донишҷӯ
                                                </option>
                                                <option {{$user->role =='teacher' ? 'selected':''}} value="teacher">
                                                    Муаллим
                                                </option>
                                                <option {{$user->role =='moderator' ? 'selected':''}} value="moderator">
                                                    Модератор
                                                </option>
                                                <option {{$user->role =='admin' ? 'selected':''}} value="admin">Админ
                                                </option>
                                                <option
                                                    {{$user->role =='superadmin' ? 'selected':''}} value="superadmin">
                                                    Суперадмин
                                                </option>
                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control"
                                                    onchange="changeStatusHandler(event,{{$user->id}})">
                                                <option {{$user->status =='1' ? 'selected':''}} value="1">
                                                    Фаъол
                                                </option>
                                                <option {{$user->status =='0' ? 'selected':''}} value="0">
                                                    Ғайрифаъол
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                               onclick="deleteSubjectHandler(event,{{$user->id}})"> <i
                                                    class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
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
        function changeRoleHandler(e, user_id) {
            var role = e.target.value;
            swal({
                title: "Мехоҳед ин роли истифодабарандаро тағйир диҳед?",
                text: `Роли истифодабаранда ба ${role} тағйир меёбад`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willChange) => {
                    if (willChange) {
                        changeRole(user_id, role)
                    } else {
                        swal("Амалиёт қатъ шуд!");
                    }
                });
        }

        function changeStatusHandler(e, user_id) {
            var status = e.target.value;
            swal({
                title: "Мехоҳед статуси ин истифодабарандаро тағйир диҳед?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willChange) => {
                    if (willChange) {
                        changeStatus(user_id, status)
                    } else {
                        swal("Амалиёт қатъ шуд!");
                    }
                });
        }

        function deleteSubjectHandler(e, id) {
            e.preventDefault();
            swal({
                title: "Мехоҳед ин китобро нобуд кунед?",
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

        function changeRole(user_id, role) {
            $.ajax(
                {
                    url: "/admin/users/" + user_id,
                    type: 'PUT',
                    dataType: "JSON",
                    data: {
                        "id": user_id,
                        "role": role,
                        "action": 'changeRole',
                        "_method": 'PUT',
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        if (response.status == 'ok') {
                            swal({
                                title: "Рол тағйир ёфт",
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
                });
        }

        function changeStatus(user_id, status) {
            $.ajax(
                {
                    url: "/admin/users/" + user_id,
                    type: 'PUT',
                    dataType: "JSON",
                    data: {
                        "id": user_id,
                        "status": status,
                        "action": 'changeStatus',
                        "_method": 'PUT',
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        if (response.status == 'ok') {
                            swal({
                                title: "Статус тағйир ёфт",
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
                });
        }

        function deleteSubject(id) {
            $.ajax(
                {
                    url: "/admin/users/" + id,
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
                                title: "Китоб нобуд шуд!",
                                text: "Китоби интихобшуда бо муваффақият нобуд шуд",
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

    </script>
@endsection
