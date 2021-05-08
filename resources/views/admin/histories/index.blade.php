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
                                <i class="fa fa-align-justify"></i> Рӯйхати фаъолияти истифодабарандагон
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{route('subjects.pdf')}}">Гирифтани PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-responsive" style="width:100%">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Модул</th>
                                    <th>Амал</th>
                                    <th>Истифодабаранда</th>
                                    <th>Замон</th>
                                    <th>Қиммати кӯҳна</th>
                                    <th>Қиммати нав</th>
                                    <th>Url</th>
                                    <th>IP адрес</th>
                                    <th>дастгоҳ</th>
                                </tr>
                                </thead>
                                <tbody id="audits">
                                @foreach($audits as $audit)
                                    <tr>
                                        <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                                        <td>{{ $audit->event }}</td>
                                        <td>{{ $audit->user->name }}</td>
                                        <td>{{ $audit->created_at}}</td>
                                        <td>
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                @foreach($audit->old_values as $attribute  => $value)
                                                    <tr>
                                                        <td><b>{{ $attribute  }}</b></td>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table table-bordered table-hover" style="width:100%">
                                                @foreach($audit->new_values as  $attribute  => $data)
                                                    <tr>
                                                        <td><b>{{  $attribute  }}</b></td>
                                                        <td>{{ $value }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td>{{ $audit->url }}</td>
                                        <td>{{ $audit->ip_address }}</td>
                                        <td>{{ $audit->user_agent }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$audits->links()}}
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
