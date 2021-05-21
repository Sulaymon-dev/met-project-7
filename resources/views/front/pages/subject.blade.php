@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8"
             style="background-image: url({{asset('/front/images/page-banner-1.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{route('class', ['id'=>$sinf])}}"> СИНФИ {{$sinf}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$subject->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(sizeof($subject->plans)<=0)
        <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
    @else

        <section class="py-5 header">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical" style="color: #234565">
                            @foreach($class as $key=>$item)
                                <a class="nav-link mb-3 p-3 shadow {{($item->class==$sinf)? $active = 'active' : $active = ''}}  "
                                   id="v-pills-home-tab" href="{{route('subject',[
                                                    'slug'=>$subject->slug,
                                                    'sinf'=>$item->class
                                                ])}}" role="tab"
                                   aria-controls="v-pills-home"
                                   aria-selected="true">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span
                                        class="font-weight-bold small text-uppercase">Синфи {{$item->class}} </span></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9 shadow">
                        <div class="mt-30 mb-30">
                            <div class="title">
                                <h3> {{$theme->book->name}}</h3>
                            </div>
                            <div class="courses-tab mt-30">
                                <div class="curriculum-cont">
                                    <div class="title">
                                        <h6>СИНФИ {{$sinf}}</h6>
                                    </div>
                                    @include('front.layouts.content-subject', ['theme'=>$theme])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('script')
@endsection
