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
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="col-md-12pt-10 pb-10">
            <div class="courses-single-left shadow">
                <div class="title">
                    <h1 class="pt-10 pb-10 ">
                        <B>{{$theme->plan->book->name}}</B>
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

                @if($content == 'conspect')
                    <div class="courses-tab mt-30">
                        @if(substr($theme->pdf_src,-4)==='.pdf')

                            <object data="{{asset('storage/uploads/pdf/'.$theme->pdf_src)}}#toolbar=0"
                                    type="application/pdf"
                                    width="100%"
                                    height="700px"></object>
                        @else
                            <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
                        @endif
                    </div>
                @elseif($content == 'moreInfo')
                    <div class="courses-tab mt-30">
                        @if(substr($theme->plan->book->pdf_src,-4)==='.pdf')
                            <object data="{{asset('storage/uploads/pdf/'.$theme->plan->book->pdf_src)}}#toolbar=0"
                                    type="application/pdf"
                                    width="100%"
                                    height="700px"></object>
                        @else
                            <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
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
                                <a id="curriculum-tab" data-toggle="tab" href="#curriculum"
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
                                    {!! $theme->introduction !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                                <div class="title">
                                    <h5 class="pt-20 pb-10 text-center">{{$theme->name}} </h5>
                                </div>

                                <video width="100%" controls>
                                    <source src="{{asset("/storage/uploads/video/".$theme->video_src)}}"
                                            type="video/mp4">
                                    Браузери Шумо видеохоро дастгирӣ намекунад.
                                </video>
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                @include('front.layouts.test', $test)
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    @if(substr($theme->pdf_exercise,-4)==='.pdf')
                                        <iframe
                                            src="{{asset('laraview/#../storage/uploads/pdf/'.$theme->pdf_exercise)}}"
                                            width="100%"
                                            height="600px"></iframe>
                                    @elseif(strlen($theme->pdf_exercise)>0)
                                        <p>{!! $theme->pdf_exercise !!}</p>
                                    @else
                                        <x-danger-text text="Дар зергурӯҳи зерин мавод вуҷуд надорад..."></x-danger-text>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(isset($test['scripts']))
        @foreach ($test['scripts'] as $src)
            <script src="/front{{ $src }}"></script>
        @endforeach
    @endif
@endsection
