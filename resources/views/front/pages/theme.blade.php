@extends('layout')


@section('style')

@endsection

@section('content')

    {{--    @if($test!=null)--}}
    {{--        <link rel="stylesheet" href="/front{{$test->style}}">--}}

    {{--        <script>--}}
    {{--            --}}{{--window.crosswordData = {{@json($test->data)}};--}}
    {{--        </script>--}}
    {{--    @endif--}}


    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8"
             style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <!-- <h2>Image Gallery</h2> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="">Синфи {{$subject->sinf->class}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$subject->book->name}}</li>
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
                        <B>{{$subject->book->name}} . СИНФИ {{$subject->sinf->class}}</B>
                    </h1>
                    <h3 class="pt-10 pb-10 ">Дарси {{$chapter->theme_num}}. {{$chapter->title}}</h3>
                </div>
                <div class=" course-terms ">
                    <ul>
                        <li class="breadcrumb-item active">
                            <div class="teacher-name ">
                                <div class="name " style="padding :0px">
                                    <span>Дарс</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="course-category ">
                            <span><a href="conspect.php?id_class=1&id_book=1&id_theme=1"
                                     target="_blank">Конспект</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="review">
                                <span><a href="books/01.pdf" target="_blank">Маводи иловагӣ</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- course terms -->

                <!-- courses single image -->


                <div class="courses-tab mt-30">
                    <ul class="nav nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                               aria-controls="overview" aria-selected="true">Пешгуфтор</a>
                        </li>
                        <li class="nav-item">
                            <a id="curriculum-tab" data-toggle="tab" href="#curriculum" role="tab"
                               aria-controls="curriculum" aria-selected="false">Қисми асосӣ (видео-дарс)</a>
                        </li>
                        <li class="nav-item">
                            <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                               aria-controls="instructor" aria-selected="false">Масъала бо ҳал</a>
                        </li>
                        <li class="nav-item">
                            <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                               aria-selected="false">Супориши 1</a>
                        </li>
                        <li class="nav-item">
                            <a id="reviews-tab" data-toggle="tab" href="#reviews2" role="tab" aria-controls="reviews"
                               aria-selected="false">Супориши 2</a>
                        </li>
                    </ul>

                    {{--                <!-- SELECT `id`, `theme_id`, `peshguftor`, `video`, `example`, `test`, `created_at`, `status` FROM `lesson` WHERE theme_id=1 AND status=1 -->--}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                             aria-labelledby="overview-tab">
                            <div class="overview-description">
                                {{$chapter->introductions}}
                            </div>
                            <!-- overview description -->
                        </div>


                        <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                            <div class="title">
                                <h5 class="pt-20 pb-10 text-center">{{$chapter->title}} </h5>
                            </div>
                            <video class="pt-15 pb-15" src="/front/video/{{$chapter->media_src}}" width="100%"
                                   controls></video>
                        </div>

                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                            <div class="instructor-cont">
                                <div class="instructor-description ">


                                    <!--crossword start-->

                                    @if(($test->type) == 'crossword')
                                        <div class="crossword clearfix m-5">
                                            <div id="puzzle-wrapper"><!-- crossword puzzle appended here --></div>
                                        </div>
                                    @endif
                                <!--crossword end-->


                                    <!--quiz4x1 start-->
                                    @if(($test->type) == 'quiz4x1')


                                        <div>
                                            <div class="quiz-container">
                                                <div id="quiz"><!-- quiz4x1 appended here --></div>
                                            </div>
                                            <button id="previous">Саволи пешина</button>
                                            <button id="next">Саволи оянда</button>
                                            <button id="submit">Натиҷа</button>
                                            <div id="results"></div>
                                        </div>
                                    @endif
                                <!--quiz4x1 end-->


                                    <!--matching start-->

                                    @if(($test->type) =='matching')


                                        <section class="section1">
                                            <ul class="upper" id="terms">
                                            </ul>
                                            <ul class="upper" id="defs">
                                            </ul>

                                            <li id="results" style="
                                                display: inline-block;
                                                text-align: center;
                                                list-style-type: none;
                                                position: absolute;
                                                margin: 0;
                                                left: 208px;
                                                bottom: 0px;
                                                width: 220px;
                                                transition: background-color 0.3s ease-out;
                                                border-radius: 3px;
                                                color: white;
                                                border: none;
                                                background-color: #2aaf41;
                                                box-shadow: 0 1px 5px 0 rgba(1, 1,1, 1);"
                                            ></li>
                                            <button class="button" name="reset">Аз нав</button>

                                        </section>
                                @endif
                                <!--matching end-->


                                </div>
                            </div>
                            <!-- instructor cont -->
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-cont">
                                <div class="instructor-description pt-25">
                                    <p>
                                    <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                        қарор дорад...</h4>
                                    </p>
                                </div>
                            </div>
                            <!-- reviews cont -->
                        </div>

                        <div class="tab-pane fade" id="reviews2" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews-cont">
                                <div class="instructor-description pt-25">
                                    <p>
                                    <h4 class="pt-10 pb-10 " style="color:darkred">Зергурӯҳи зерин дар сатҳи коркард
                                        қарор дорад...</h4>
                                    </p>
                                </div>
                            </div>
                            <!-- reviews cont -->
                        </div>
                    </div>
                    <!-- tab content -->
                </div>
                <!-- tab content -->
            </div>
        </div>
        <!-- courses single left -->


        <!-- courses single left -->


    </div>
    </div>

    @if (!empty($test->scripts))
        @foreach ($test->scripts as $src)
            <script src="{{ $src }}"></script>
        @endforeach
    @endif

    @if (!empty($test->script)!=='')
        <script src="/front{{ $test->script }}"></script>
    @endif
@endsection


@section('script')

@endsection
