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
        <div class="reviews-cont">
            <div class="instructor-description pt-25">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар зергурӯҳи зерин мавод вуҷуд
                    надорад...</h4>
                </p>
            </div>
        </div>
    @else

        <section class="py-5 header">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical" style="color: #234565">
                            @foreach($subject->plans as $key=>$item)
                                <a class="nav-link mb-3 p-3 shadow  {{($item->sinf_id==$sinf)? $active = 'active' : $active = ''}}  "
                                   id="v-pills-home-tab" href="{{route('subject',[
                                                    'slug'=>$subject->slug,
                                                    'sinf'=>$item->sinf_id
                                                ])}}" role="tab"
                                   aria-controls="v-pills-home"
                                   aria-selected="true">
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span
                                        class="font-weight-bold small text-uppercase">Синфи {{$item->sinf->class}} </span></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-9 shadow">
                        <div class="courses-single-left mt-30">
                            <div class="title">
                                <h3> {{$theme->book->name}}</h3>
                            </div>
                            <div class="courses-tab mt-30">
                                <div class="curriculum-cont">
                                    <div class="title">
                                        <h6>СИНФИ {{$sinf}}</h6>
                                    </div>
                                    @include('front\layouts\content-subject', ['theme'=>$theme])
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="curriculum" role="tabpanel"
                                         aria-labelledby="curriculum-tab">
                                    </div>
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
