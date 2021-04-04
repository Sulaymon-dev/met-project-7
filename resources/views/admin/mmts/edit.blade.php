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
                        <form action="{{route('mmts.update',['mmt'=>$mMT->id])}}" method="post">
                            @csrf @method('PUT')
                            <div class="card-header">
                                Тағйироти <strong> пайвандкунии тестҳо </strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label for="subject">
                                            Фан :
                                        </label>
                                        <select class="form-control" name="subject_id"
                                                id="subject"
                                        >
                                            @foreach($subjects as $subject)
                                                <option
                                                    {{$subject->id == $mMT->subject_id ?'selected':''}} value="{{$subject->id}}">{{$subject->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="cluster">
                                            Кластер :
                                        </label>
                                        <select class="form-control" name="cluster_id" id="cluster">
                                            @foreach($clusters as $cluster)
                                                <option
                                                    {{$cluster->id == $mMT->mMT_id ?'selected':''}}
                                                    value="{{$cluster->id}}">{{$cluster->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="component">
                                            Компонент :
                                        </label>
                                        <select class="form-control" name="component" id="component">
                                            <option {{$mMT->component == 'A' ? 'selected':''}} value="A">A</option>
                                            <option {{$mMT->component == 'B' ? 'selected':''}}  value="B">B</option>
                                            <option {{$mMT->component == 'C' ? 'selected':''}}  value="C">C</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="resources">
                                            Тестҳо :
                                        </label>
                                        <select class="form-control" name="resource_id" id="resources">
                                            @foreach($resources as $resource)
                                                <option
                                                    {{$mMT->mmt_fan_id == $resource->id ? 'selected':''}}
                                                    value="{{$resource->id}}">{{$resource->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                @if(in_array(auth()->user()->role,['admin','moderator','superadmin']))
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Ваъият : </label>
                                        <div class="col-md-9 col-form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="active" type="radio" value="1"
                                                       name="status" {{$mMT->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="active">Фаъол</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inactive" type="radio" value="0"
                                                       name="status" {{$mMT->status == 0 ? 'checked' :''}}>
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
