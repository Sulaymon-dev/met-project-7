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
                            <div class="d-flex items-center justify-content-around align-items-baseline">
                               <span>
                                    <i class="fa fa-align-justify"></i> Рӯйхати мавзӯъҳо
                               </span>
                            </div>
                            <form class="form-inline mx-3">

                                <input value="{{request()->input('search')}}"
                                       class="form-control mx-2" type="text" name="search" placeholder="Ҷустуҷӯ" id="">

                                <label for="onlyThemes">
                                    <input value="1" type="checkbox" checked name="onlyThemes"
                                           id="onlyThemes"
                                    >
                                    <span class="mx-2">
                                        Мавзӯъҳои ман
                                   </span>
                                </label>
                                <button class="btn btn-outline-primary mx-2" type="submit">OK</button>
                            </form>

                            <div>
                                <a class="btn btn-warning" href="{{route('themes.create')}}">Иловаи мавзӯъ</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Ном</th>
                                    <th>Фан</th>
                                    <th>Синф</th>
                                    <th>Муаллиф</th>
                                    <th>Вазъият</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($themes as $theme)
                                    <tr id="sub-{{$theme->id}}">
                                        <td>{{$theme->theme_num}}</td>
                                        <td>
                                            <a href="/theme/{{$theme->id}}?content=dars">
                                                {{$theme->name}}
                                            </a>
                                        </td>
                                        <td>{{$theme->plan->subject->name}}</td>
                                        <td>{{$theme->plan->sinf->class}}</td>
                                        <td>{{$theme->user->name}}</td>
                                        <td>{!!  $theme->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>
                                        @if($theme->user_id == auth()->id() || in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{route('themes.edit',$theme->id)}}?page={{ request()->has('page') ? request()->input('page') : 1}}"><i
                                                        class="fa fa-edit"></i></a>
                                                @if(in_array($role,['admin','teacher','superadmin']))
                                                    <a class="btn btn-danger"
                                                       onclick="deleteSubjectHandler(event,{{$theme->id}})"> <i
                                                            class="fa fa-trash-o"></i></a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$themes->links()}}
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
                    url: "/admin/themes/" + id,
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
