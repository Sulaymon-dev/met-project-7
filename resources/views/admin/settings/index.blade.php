@extends('admin.layouts.main')

@section('style')
    <style>
        td,th{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <h3 class="text-center text-info my-3">Рӯйхати танзимоти сайт </h3>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th class="align-items-center">Танзимоти Асосӣ</th>
                                <td><a class="btn btn-primary"
                                       href="{{route('settings.index')}}?key=main_settings"><i
                                            class="fa fa-edit"></i></a></td>
                            </tr>
                            <tr>
                                <th class="align-items-center">Слайдери асосӣ</th>
                                <td><a class="btn btn-primary"
                                       href="{{route('settings.index')}}?key=main_slider"><i
                                            class="fa fa-edit"></i></a></td>
                            </tr>

                            <tr>
                                <th class="align-items-center">Слайдери Иловагӣ</th>
                                <td><a class="btn btn-primary"
                                       href="{{route('settings.index')}}?key=second_slider"><i
                                            class="fa fa-edit"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
