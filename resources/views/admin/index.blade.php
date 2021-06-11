@extends('admin.layouts.main')

@section('style')

@endsection

@section('content')
    <div class="container-fluid mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div> Миқдори истифодабарандагон</div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3 h1 text-center" style="height:70px;">
                            {{$userCount}}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-info">
                        <div class="card-body pb-0">
                            <div>Миқдори дарсҳо</div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3 h1 text-center" style="height:70px;">
                            {{$themesCount}}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body pb-0">
                            <div>Машқҳои Олимпиадавӣ</div>
                        </div>
                        <div class="chart-wrapper mt-3 h1 text-center" style="height:70px;">
                            {{$olymicsCount}}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body pb-0">
                            <div>Машқҳои ММТ</div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3 h1 text-center" style="height:70px;">
                            {{$mmtCount}}
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            {{--            <!-- /.row-->--}}
            {{--            <div class="card">--}}
            {{--                <div class="card-body">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-sm-5">--}}
            {{--                            <h4 class="card-title mb-0">Траффик</h4>--}}
            {{--                            <div class="small text-muted">Марти 2021</div>--}}
            {{--                        </div>--}}
            {{--                        <!-- /.col-->--}}
            {{--                        <div class="col-sm-7 d-none d-md-block">--}}

            {{--                            <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">--}}
            {{--                                <label class="btn btn-outline-secondary">--}}
            {{--                                    <input id="option1" type="radio" name="options" autocomplete="off"> Рӯъ--}}
            {{--                                </label>--}}
            {{--                                <label class="btn btn-outline-secondary active">--}}
            {{--                                    <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Моҳ--}}
            {{--                                </label>--}}
            {{--                                <label class="btn btn-outline-secondary">--}}
            {{--                                    <input id="option3" type="radio" name="options" autocomplete="off"> Сол--}}
            {{--                                </label>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- /.col-->--}}
            {{--                    </div>--}}
            {{--                    <!-- /.row-->--}}
            {{--                    <div class="chart-wrapper" style="height:300px;margin-top:40px;">--}}
            {{--                        <canvas class="chart" id="main-chart" height="300"></canvas>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--            </div>--}}
            <div class="card">
                <div class="card-header font-weight-bold">
                    <div class="d-flex justify-content-between">
                        <span> Миқдори дарсҳои воридсохтаи муаллимон</span>
                        <span>
                            <a class="btn btn-warning" href="{{route('admin-teacher.pdf')}}">Нусхаи PDF</a>
                       </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive-sm">
                        <thead>
                        <tr>
                            <th>Ном</th>
                            <th>Эмайл</th>
                            <th>Китоб</th>
                            <th>План</th>
                            <th>Дарс</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($teachers as $teacher)
                            <tr>
                                <td><a href="/admin/themes?user_id={{$teacher->id}}">{{$teacher->name}}</a></td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->books_count}}</td>
                                <td>{{$teacher->plans_count}}</td>
                                <td>{{$teacher->themes_count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
