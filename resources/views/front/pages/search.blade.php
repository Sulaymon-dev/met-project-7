@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section id="page-banner" class="pt-30 pb-30 bg_cover" data-overlay="8"
             style="background-image: url({{asset('/front/images/page-banner-1.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{$resultCount}} натиҷа ёфт шуд</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a>Ҷустуҷӯ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$text}}</li>
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
                        <div class="tab-pane fade shadow rounded bg-white  show active " style="padding: 0 3em 3em 3em"
                             role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="category-2-items">
                                <div class="row">
                                    @foreach($result as $item)
                                        <div class="col-md-4">
                                            <div class="single-items text-center  mt-30">
                                                <a href="{{route('theme', ['id'=>$item->id])}}">
                                                    <div class="items-image">
                                                        <img
                                                            src="{{asset('/storage/uploads/img/'.$item->plan->subject->image_src)}}"
                                                            width="372px"
                                                            height="145px" alt="{{$item->name}}">
                                                    </div>
                                                    <div class="items-cont">
                                                        <p style="color: #fff;">
                                                            <b>{{$item->plan->subject->name}}</b></p>
                                                        <p style="color: #fff;">Мaвзӯи {{$item->theme_num}}</p>
                                                        <h5>{{$item->name}}</h5>
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
