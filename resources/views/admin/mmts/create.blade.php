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
                        <form action="{{route('mmts.store')}}" method="post">
                            @csrf
                            <div class="card-header">
                                Пайвандкунии тестҳои маркази миллии тестӣ
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
                                        <label for="cluster">
                                            Кластер :
                                        </label>
                                        <select class="form-control" name="cluster_id" id="cluster">
                                            @foreach($clusters as $cluster)
                                                <option value="{{$cluster->id}}">{{$cluster->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="component">
                                            Компонент :
                                        </label>
                                        <select class="form-control" name="component" id="component">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="resources">
                                            Тестҳо :
                                        </label>
                                        <select class="form-control" name="resource_id" id="resources">
                                            @foreach($resources as $resource)
                                                <option value="{{$resource->id}}">{{$resource->title}}</option>
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
            $('#resources').select2()
        })
    </script>
@endsection
