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
                        <form action="{{route('plans.update',$plan->id)}}" method="post">
                            @csrf @method('PUT')
                            <div class="card-header">
                                Тағйироти <strong> план </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label for="subject">
                                            Фан :
                                        </label>
                                        <select class="form-control" name="subject_id"
                                                id="subject" {{$role == 'moderator' ? 'disabled':''}}
                                        >
                                            @foreach($subjects as $subject)
                                                <option
                                                    {{$subject->id == $plan->subject_id ?'selected':''}} value="{{$subject->id}}">{{$subject->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sinf">
                                            Синф :
                                        </label>
                                        <select class="form-control" name="sinf_id" id="sinf"
                                            {{$role == 'moderator' ? 'disabled':''}}
                                        >
                                            @foreach($sinfs as $sinf)
                                                <option
                                                    {{$sinf->id == $plan->sinf_id ?'selected':''}}
                                                    value="{{$sinf->id}}">{{$sinf->class}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="book">
                                            Китоб
                                        </label>
                                        <select class="form-control" name="book_id" id="book"
                                            {{$role == 'moderator' ? 'disabled':''}}
                                        >
                                            <option selected value="{{$plan->book_id}}">{{$plan->book->name}}</option>
                                        </select>
                                    </div>

                                </div>

                                @if(in_array($role,['admin','teacher','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Нашр шавад ? </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="publish" type="radio" value="1"
                                                       name="is_show"  {{$plan->is_show == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="publish">Ҳа</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="unpablish" type="radio" value="0"
                                                       name="is_show"  {{$plan->is_show == 0 ? 'checked' :''}}>
                                                <label class="form-check-label" for="unpablish">Не</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият : </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status"  {{$plan->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status"  {{$plan->status == 0 ? 'checked' :''}}>
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
                        console.log(query);

                        // Query parameters will be ?search=[term]&page=[page]
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
                                // If there are 10 matches, there's at least another page
                                more: data.current_page < data.last_page
                            }
                        };
                    },
                }
            })
        })
    </script>
@endsection
