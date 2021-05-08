@extends('front.layout')

@section('style')
@endsection

@section('content')

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
             style="background-image: url({{asset('/front/images/page-banner-1.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Фанҳои омӯзиш</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Фанҳо</li>
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
                <div class="col-md-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade shadow rounded bg-white  show active  p-3"
                             role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="category-2-items">
                                <div class="row">
                                    @foreach($subjects as $subject)
                                        <div class="col-md-3">
                                            <div class="single-items text-center mt-30">
                                                <a href="{{route('subject',[
                                                    'slug'=>$subject->slug,
                                                    'sinf'=>$subject->sinf_id
                                                ])}}">

                                                    <div class="items-image">
                                                        <img
                                                            src="{{asset('/storage/uploads/img/'.$subject->image_src)}}"
                                                            width="372px"
                                                            height="145px" alt="{{$subject->name}}">
                                                    </div>
                                                    <div class="items-cont">
                                                        <h5>{{$subject->name}}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
