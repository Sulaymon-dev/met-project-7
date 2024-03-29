@extends('admin.layouts.main')

@section('style')
    <style>
        .table td {
            vertical-align: middle;
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
                                <i class="fa fa-align-justify"></i> Рӯйхати навгониҳо
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Акс</th>
                                    <th>Сархат</th>
                                    <th>Муаллиф</th>
                                    <th>Статус</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($articles as $article)
                                    <tr id="sub-{{$article->id}}">
                                        <td class="w-25 h-25"><img
                                                style="max-width: 100%"
                                                src="/storage/uploads/img/{{$article->img_src}}" alt=""></td>
                                        <td><a class="text-black"
                                               href="/news/{{$article->id}}">{{$article->title}}</a></td>
                                        <td>
                                            {{$article->user->name}}
                                        </td>
                                        <td>{!!  $article->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>

                                        @if($article->user->id == auth()->id())
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{route('news.edit',$article->id)}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger"
                                                   onclick="deleteSubjectHandler(event,{{$article->id}})"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$articles->links()}}
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
                    url: "/admin/news/" + id,
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
                                title: "Хабар нобуд шуд!",
                                text: "Хабари интихобшуда бо муваффақият нобуд шуд",
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
                title: "Мехоҳед ин хабарро нобуд кунед?",
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
