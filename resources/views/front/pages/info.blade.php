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
                            @if($page)
                                <h1 class="content-title" style="padding-top: 20px;">{{$page['title']}}</h1>
                                <p class="p my-3">{!! $page['body'] !!}</p>
                            @else
                                <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
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
