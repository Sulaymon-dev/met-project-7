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
                                <i class="fa fa-align-justify"></i> Рӯйхати китобҳо
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{route('books.pdf')}}">Гирифтани PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>Акс</th>
                                    <th>Ном</th>
                                    <th>Статус</th>
                                    <th>Амал</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($books as $book)
                                    <tr id="sub-{{$book->id}}">
                                        <td class="w-25"><img
                                                style="max-width: 100%"
                                                src="/storage/uploads/img/{{$book->img_src}}" alt=""></td>
                                        <td><a class="text-black"
                                               href="/storage/uploads/pdf/{{$book->pdf_src}}">{{$book->name}}</a></td>
                                        <td>{!!  $book->status == 1 ? '<span class="badge badge-success">Active</span>' :
                                                                '<span class="badge badge-secondary">Inactive</span>'!!}</td>

                                        @if($book->user_id == auth()->id() || in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{route('books.edit',$book->id)}}"><i
                                                        class="fa fa-edit"></i></a>
                                                @if(in_array(auth()->user()->role,['admin','teacher','superadmin']))
                                                    <a class="btn btn-danger"
                                                       onclick="deleteSubjectHandler(event,{{$book->id}})"> <i
                                                            class="fa fa-trash-o"></i></a>
                                                @endif
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$books->links()}}
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
                    url: "/admin/books/" + id,
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
    </script>
@endsection
