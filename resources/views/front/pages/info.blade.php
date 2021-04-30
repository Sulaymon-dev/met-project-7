@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section class="  header">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white  show active  p-5">
                            @if($data)
                                <h1 class="content-title" style="padding-top: 20px;">{{$data['title']}}</h1>
                                <p class="p my-3">{!! $data['body'] !!}</p>
                            @else
                                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">
                                    Дар зергурӯҳи зерин мавод вуҷуд надорад...
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
