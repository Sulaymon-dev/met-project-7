@extends('front.layout')

@section('style')
@endsection

@section('content')

    @include('front.layouts.slider')

    <section id="category-part">
        <div class="container">
            <div class="category category-tow pt-40 pb-40">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-text category-text-tow pl-30 pr-30">
                            <span class="single-category text-center color-4">
                                <span>
                                    “Мактаби электронии Тоҷикистон” чист?
                                </span>
                            <span class="cont">
                                    "Ин дарсҳои интерактивӣ аз рӯи ҳамаи фанҳои мактаби миёна аз синфи 1 то 11, ки аз тарафи омӯзгорони боистеъдоди вилояти Суғд  омода карда шудааст ва барои кӯдакон ва наврасон барои дастрас намудани маълумоти ройгон ва соҳиб шудан ба дониш ва таҳсилоти дастрас, пешниҳод карда мешавад. "
                            </span>
                             <a class="main-btn" style="


    padding: 0px 12px;
    margin-top: 15px;
    line-height: 40px;
    color: #ffffff;
    }
    " href="{{route('about')}}">Муфассалтар</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slide mt-40">
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/tv-programm.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Видео дарсҳо </span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/ctg-3.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Китобҳои бадеӣ</span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/prize.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Олимпиадаҳо</span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/web.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Интернет захираҳо</span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/birdy.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Дарси сулҳ</span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="{{asset('/front/images/all-icon/ctg-3.png')}}" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Машқҳо</span>
                                    </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="admission-row pb-20">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($news as $new)
                    <div class="col-lg-4 col-md-8 d-flex">
                        <div class="admission-card mt-30" style="height: auto;">
                            <a href="{{route('newsById', $new['id'])}}">
                                <div class="card-image">
                                    <img src="{{asset('/storage/uploads/img/'. $new['img_src'])}}"
                                         alt="{{$new['title']}}">
                                </div>
                                <div class="card-content">
                                    <h4 class="card-titles">{{$new['title']}}</h4>
                                    <p>{!! Illuminate\Support\Str::limit($new['description'] , 200, ' ...') !!}</p>

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <a data-animation="fadeInUp"
                   data-delay="2s"
                   class="main-btn mt-4"
                   href="{{route('news')}}">Муфассалтар</a>

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
