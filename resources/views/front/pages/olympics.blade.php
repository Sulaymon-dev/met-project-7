@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8"
             style="background-image: url('../front/images/page-banner-1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Олимпиада</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 header">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical" style="color: #234565">
                        @foreach($class as $key=>$item)
                            @if(count($item->olympics)!==0)
                                <a class="nav-link mb-3 p-3 shadow
                                @php
                                    if(($sinf == 0 && $key == 0) || ($sinf!=0 && $sinf == $item->class)){
                                     echo 'active' ;
                                     $sinf=$item->class;}
                                    else{
                                     $active = '';
                                     }
                                @endphp"
                                   id="v-pills-home-tab" href="{{route('olympics',['sinf'=>$item->class])}}" role="tab"
                                   aria-controls="v-pills-home">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span
                                        class="font-weight-bold small text-uppercase">Синфи {{$item->class}} </span></a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9 shadow">
                    @include('front\layouts\content-olympics',['olympics'=>$olympics, 'sinf'=>$sinf])
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
