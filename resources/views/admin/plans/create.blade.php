@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="/libs/select2/css/select2.min.css">
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form action="{{route('plans.store')}}" method="post">
                            @csrf
                            <div class="card-header">
                                Иловаи <strong> плани </strong> нав
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label for="subject">
                                            Фан :
                                        </label>
                                        <select class="form-control" name="subject_id" id="subject">
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sinf">
                                            Синф :
                                        </label>
                                        <select class="form-control" name="sinf_id" id="sinf">
                                            @foreach($sinfs as $sinf)
                                                <option value="{{$sinf->id}}">{{$sinf->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="book">
                                            Китоб :
                                        </label>
                                        <select class="form-control" name="book_id" id="book">

                                        </select>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="publish" type="radio" value="1"
                                                   name="is_show" checked>
                                            <label class="form-check-label" for="publish">Ҳа</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                   name="is_show">
                                            <label class="form-check-label" for="unpablish">Не</label>
                                        </div>
                                    </div>
                                </div>

                                @if(in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият : </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status" checked>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status">
                                                <label class="form-check-label" for="inactive">Ғайрифаъол</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-success" type="submit">
                                    <i class="fa fa-dot-circle-o"></i> OK
                                </button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                    <i class="fa fa-ban"></i> Тоза кардан
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/libs/select2/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#subject').select2()
            $('#book').select2({
                ajax: {
                    url: '/admin/books/list',
                    data: function (params) {
                        var query = {
                            search: params.term,
                            page: params.page || 1
                        };
                        return query;
                    },
                    processResults: function (data, page) {
                        console.log(data.data);
                        return {
                            results: data.data.map(function (item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            }),
                            pagination: {
                                more: data.current_page < data.last_page
                            }
                        };
                    },
                }
            })
        })
    </script>
@endsection
