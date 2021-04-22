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
             style="background-image: url('../front/images/page-banner-1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item"><a href="{{route('mmt')}}">ММТ</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{route('mmt',['cluster'=>$mmt->cluster_id])}}"
                                    >Класстери {{$mmt->cluster_id}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Фанни
                                    "{{$mmt->subject->name}}"
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
                    <h1 class="pt-10 pb-10 ">Тести <B style="color: #ffc600;">{{$mmt->subject->name}}</B>.</h1>
                </div>

                <div class="courses-tab">
                    <ul class="nav nav-justified" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews"
                               aria-selected="false">Маводи тестӣ</a>
                        </li>
                        <li class="nav-item">
                            <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                               aria-controls="instructor" aria-selected="false">Машқи тестҳо</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="reviews" role="tabpanel"
                             aria-labelledby="reviews-tab">
                            <div class="reviews-cont">
                                @if(substr($mmt->mmt_fan->pdf_src,-4)==='.pdf')
                                    <iframe
                                        src="{{asset('laraview/#../storage/uploads/pdf/'.$mmt->mmt_fan->pdf_src)}}"
                                        width="100%"
                                        height="600px"></iframe>
                                @elseif(strlen($mmt->mmt_fan->pdf_src)>0)
                                    <p>{{$mmt->mmt_fan->pdf_src}}</p>
                                @else
                                    <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                        қарор дорад...</h4>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                            @include('front.layouts.test', $test)
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
            <?php $testData = json_encode($test['tests']);?>

        var testData = JSON.parse(`<?= $testData ?>`);
        testData.forEach((el) => {
            if (el.type === 'quiz4x1') {
                <?php $type = 'quiz4x1' ?>
                    window.quiz = el.data;
            } else if (el.type === 'matching') {
                <?php $type = 'matching' ?>
                    window.crosswordData = el.data;
            }
        });
    </script>
    @if(isset($test['scripts']))
        @foreach ($test['scripts'] as $src)
            <script src="/front{{ $src }}"></script>
        @endforeach
    @endif
@endsection
