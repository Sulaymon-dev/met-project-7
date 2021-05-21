@extends('front.layout')

@section('style')
    @if($test!=null)
        @if(isset($test['styles']))
            @foreach($test['styles'] as $item)
                <link rel="stylesheet" href="/front{{$item}}">
            @endforeach
        @endif
    @endif
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
                                <li class="breadcrumb-item"><a href="{{route('olympics')}}">Олимпиада</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{route('olympics',['sinf'=>$olympic->sinf->class])}}"
                                    >Синфи {{$olympic->sinf->class}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Фанни
                                    "{{$olympic->subject->name}}"
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="col-md-12pt-10 pb-10">
            <div class="courses-single-left shadow">
                <div class="title">
                    <h1 class="pt-10 pb-10 ">Олимпиадаи <B style="color: #ffc600;">{{$olympic->subject->name}}</B>.
                        СИНФИ {{$olympic->sinf->class}}</h1>
                </div>
                <div class="courses-tab">
                    <ul class="nav nav-justified" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews"
                               aria-selected="false">Супориш </a>
                        </li>
                        <li class="nav-item">
                            <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                               aria-controls="instructor" aria-selected="false">Тестҳо</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="reviews" role="tabpanel"
                             aria-labelledby="reviews-tab">
                            <div class="reviews-cont">

                                @if(substr($olympic->pdf_src,-4)==='.pdf')
                                    <object data="{{asset('storage/uploads/pdf/'.$olympic->pdf_src)}}#toolbar=0"
                                            type="application/pdf"
                                            width="100%"
                                            height="700px"></object>
                                @elseif(strlen($olympic->pdf_src)>0)
                                    <p>{{$olympic->pdf_src}}</p>
                                @else
                                    <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                            @if($test!=null && $test['tests'])
                                @include('front.layouts.test', $test)
                            @else
                                <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        const testData = {!! json_encode($test) !!};
        testData.tests.forEach((el) => {
            if (el.type === 'quiz4x1') {
                <?php $type = 'quiz4x1' ?>
                    window.quiz = el.data;
            } else if (el.type === 'matching') {
                <?php $type = 'matching' ?>
                    window.crosswordData = el.data;
            } else if (el.type === 'openQuiz') {
                <?php $type = 'openQuiz' ?>
                    window.openQuiz = el.data;
            }
        });
        testData.scripts.forEach(script => {
            var tag = `<script src="/front` + script + `"><\/script>`;
            $('body').append(tag)
        });
    </script>
@endsection
