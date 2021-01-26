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
                        <!-- <h2>Image Gallery</h2> -->
                        <nav aria-label="breadcrumb">
                            {{--                            {{dd($theme)}}--}}
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{route('subject',[
                                                    'slug'=>$theme->plan->subject->slug,
                                                    'sinf'=>$theme->plan->sinf->class
                                                ])}}"
                                    >Фанни "{{$theme->plan->subject->name}}"</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{route('class',['id'=>$theme->plan->sinf->id])}}"
                                    >Синфи {{$theme->plan->sinf->class}}</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page"> {{$theme->plan->book->name}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- page banner cont -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== FAQ PART START ======-->

    <!-- Demo header-->


    <style>
        /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    */

        .nav-pills-custom .nav-link {
            color: #07294d;
            background: #fff;
            position: relative;
        }

        .nav-pills-custom .nav-link.active {
            color: white;
            background: #07294d;
        }

        @media (min-width: 992px) {
            .nav-pills-custom .nav-link::before {
                content: '';
                display: block;
                border-top: 8px solid transparent;
                border-left: 10px solid #07294d;
                border-bottom: 8px solid transparent;
                position: absolute;
                top: 50%;
                right: -10px;
                transform: translateY(-50%);
                opacity: 0;
            }
        }

        .nav-pills-custom .nav-link.active::before {
            opacity: 1;
        }
    </style>


    <div class="container">
        <div class="col-md-12pt-10 pb-10">

            <div class="courses-single-left shadow">
                <div class="title">
                    <h1 class="pt-10 pb-10 ">
                        <B>{{$theme->plan->book->name}} . СИНФИ {{$theme->plan->sinf->class}}</B>
                    </h1>
                    <h3 class="pt-10 pb-10 ">Дарси 1. {{$theme->name}}</h3>
                </div>
                <div class=" course-terms ">
                    <ul>
                        <li class="breadcrumb-item active">
                            <div>
                                <div class="name " style="padding :0px">
                                    <span><a href="{{route('theme',['id'=> $theme->id,'content'=>'dars'])}}"
                                             class="theme-category">Дарс </a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <span><a href="{{route('theme',['id'=> $theme->id,'content'=>'conspect'])}}"
                                         class="theme-category slash">Конспект</a> </span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <span><a href="{{route('theme',['id'=> $theme->id,'content'=>'moreInfo'])}}"
                                         class="theme-category slash">Маводи иловагӣ</a> </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- course terms -->

                <!-- courses single image -->


                @if($content == 'conspect')
                    <div class="courses-tab mt-30">
                        @if(substr($theme->pdf_src,-4)==='.pdf')
                            <iframe
                                src="{{asset('laraview/#../storage/uploads/pdf/'.$theme->pdf_src)}}"
                                width="100%"
                                height="600px"></iframe>
                        @else
                            <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                қарор дорад...</h4>
                        @endif
                    </div>
                @elseif($content == 'moreInfo')

                    <div class="courses-tab mt-30">
                        @if(substr($theme->plan->book->pdf_src,-4)==='.pdf')
                            <iframe
                                src="{{asset('laraview/#../storage/uploads/pdf/'.$theme->plan->book->pdf_src)}}"
                                width="100%"
                                height="600px"></iframe>
                        @else
                            <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                қарор дорад...</h4>
                        @endif
                    </div>
                @else
                    <div class="courses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                                   aria-controls="overview" aria-selected="true">Пешгуфтор</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculum-tab" data-toggle="tab" href="#curriculum" "
                                role="tab"
                                aria-controls="curriculum" aria-selected="false">Қисми асосӣ (видео-дарс)</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                   aria-controls="instructor" aria-selected="false">Масъала бо ҳал</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false">Супориш </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                 aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    {{$theme->introduction}}
                                </div>
                                <!-- overview description -->
                            </div>


                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                <div class="title">
                                    <h5 class="pt-20 pb-10 text-center">{{$theme->name}} </h5>
                                </div>

                                <video width="100%" controls>
                                    <source src="{{asset("/storage/uploads/video/".$theme->video_src)}}"
                                            type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-description ">

                                        @if($test!==null)
                                            <div style="display: flex">
                                                <div class="col-lg-10">
                                                    <div class="teachers-right ">

                                                        <div class="tab-content" id="myTabContent">
                                                            <!--crossword start-->
                                                            @foreach($test['tests'] as $key=>$item)


                                                                <div
                                                                    class="tab-pane fade {{($key==0)?'show active':''}}"
                                                                    id="dashboard{{$key}}"
                                                                    role="tabpanel" aria-labelledby="dashboard-tab">
                                                                    <div class="dashboard-cont">
                                                                        @if($item['type']=='quiz4x1')
                                                                            <div id="quiz4x1">
                                                                                <div id="test-container">
                                                                                    <div class="quiz-container">
                                                                                        <div id="quiz">
                                                                                            <!-- quiz4x1 appended here -->
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="clearfix"></div>

                                                                                    <div class="quiz-buttons">
                                                                                        <button id="previous">Саволи
                                                                                            пешина
                                                                                        </button>
                                                                                        <button id="next">Саволи оянда
                                                                                        </button>
                                                                                        <button id="submit">Натиҷа
                                                                                        </button>
                                                                                    </div>
                                                                                    <div id="results"></div>
                                                                                </div>
                                                                            </div>
                                                                        @elseif($item['type']=='matching')

                                                                            <div id="matching">
                                                                                <section class="section1">
                                                                                    <ul class="upper" id="terms"></ul>
                                                                                    <ul class="upper" id="defs"></ul>
                                                                                    <li id="results"
                                                                                        class="matchingResult"></li>
                                                                                    <button class="button" name="reset">
                                                                                        Аз
                                                                                        нав
                                                                                    </button>
                                                                                </section>
                                                                            </div>

                                                                        @endif

                                                                    </div>
                                                                    <!-- dashboard cont -->
                                                                </div>

                                                            @endforeach
                                                        </div> <!-- tab content -->
                                                    </div> <!-- teachers right -->
                                                </div>
                                                <div class="col-lg-2 tests-tab">
                                                    <ul class="nav nav-justified" style="display: block" id="myTab"
                                                        role="tablist">
                                                        @foreach($test['tests'] as $key=>$item)
                                                            <li class="nav-item">
                                                                <a class="{{($key==0)?'active':''}}"
                                                                   id="dashboard-tab{{$key}}"
                                                                   data-toggle="tab"
                                                                   href="#dashboard{{$key}}" role="tab"
                                                                   aria-controls="dashboard{{$key}}"
                                                                   aria-selected="true">
                                                                    @if($item['type']=='quiz4x1')
                                                                        Тести кушод
                                                                    @elseif($item['type']=='matching')
                                                                        Мувофиковарӣ
                                                                    @endif
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul> <!-- nav -->
                                                </div>
                                            </div>


                                        @else
                                            <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин вуҷуд
                                                надорад...</h4>
                                        @endif

                                    </div>
                                </div>
                                <!-- instructor cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">

                                    @if(substr($theme->pdf_exercise,-4)==='.pdf')
                                        <iframe
                                            src="{{asset('laraview/#../storage/uploads/pdf/'.$theme->pdf_exercise)}}"
                                            width="100%"
                                            height="600px"></iframe>
                                    @elseif(strlen($theme->pdf_exercise)>0)
                                        <p>{{$theme->pdf_exercise}}</p>
                                    @else
                                        <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                            қарор дорад...</h4>
                                    @endif

                                </div>
                                <!-- reviews cont -->
                            </div>


                        </div>
                        <!-- tab content -->
                    </div>
            @endif
            <!-- tab content -->
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
                console.log(window.quiz);
            } else if (el.type === 'matching') {
                <?php $type = 'matching' ?>
                    window.crosswordData = el.data;
                console.log(window.crosswordData);
            }
        });
    </script>
    @if(isset($test['scripts']))
        @foreach ($test['scripts'] as $src)
            <script src="/front{{ $src }}"></script>
            {{--                {{dd(2)}}--}}
        @endforeach
    @endif
@endsection
