@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
             style="background-image: url({{asset('front/images/page-banner-1.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Дар бораи мо</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Синфҳо</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Дар бораи мо</h5>
                        <h3>Хуш омадед ба Мактаби электронии Тоҷикистон!</h3>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Мактаби электронии Тоҷикистон – ин дарсҳои интерактивӣ аз рӯи ҳамаи фанҳои мактаби миёна аз
                            синфи 1 то 11, ки аз тарафи омӯзгорони боистеъдоди вилояти Суғд омода карда шудааст ва барои
                            кӯдакон ва наврасон барои дастрас намудани маълумоти ройгон ва соҳиб шудан ба дониш ва
                            таҳсилоти дастрас, пешниҳод карда мешавад. Лоиҳаи мазкур, дар айни замон, ки дар ҷаҳон
                            вируси COVID-19 паҳн шудааст, яке аз воситаҳои таъмин ва ташкили таҳсилоти фосилавӣ ба шумор
                            меравад.
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="{{asset('front/images/about/about-2.jpg')}}" alt="About">
                    </div>
                </div>
            </div>
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-single-items mt-30">
                            <span>01</span>
                            <h4>Чаро моро интихоб кунед?</h4>
                            <p>Падару модарон дар Мактаби электронии Тоҷикистон бо ҳамроҳии фарзандони худ дар
                                як “рӯи мизи мактаб” нишаста (кабинети инфиродии талаба), раванди таҳсилро аз ибтидо то
                                интиҳои дарс пайгирӣ кунанд.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-single-items mt-30">
                            <span>02</span>
                            <h4>Вазифаи мо</h4>
                            <p>Дар дилхоҳ фосилаи вақт, дар режими бархат (он-лайн) таҳсили мавзӯи дарсӣ </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-single-items mt-30">
                            <span>03</span>
                            <h4>Назари мо</h4>
                            <p>Мактаби электронии Тоҷикистон воситаест, ки барои таъмин ва ташкили “таҳсил дар давоми
                                ҳаёт”-ро ҳам барои ҷавонон ва ҳам барои калонсолон кӯмаки худро мерасонад.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8"
         style="background-image: url({{asset('front/images/bg-2.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter text-center mt-40">
                        <span><span class="counter">30,000</span>+</span>
                        <p>Вазифаҳои беназир</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter text-center mt-40">
                        <span><span class="counter">41,000</span>+</span>
                        <p>Дарсҳои воридшуда</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter text-center mt-40">
                        <span><span class="counter">11,000</span>+</span>
                        <p>Хонандагон</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-counter text-center mt-40">
                        <span><span class="counter">39,000</span>+</span>
                        <p>Тестҳои интерактивӣ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Мактаби электронии Тоҷикистон</h5>
                        <h2>Маълумоти пурра</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <p class="p my-3"> Мактаби электронии Тоҷикистон – ин дарсҳои интерактивӣ аз рӯи ҳамаи фанҳои мактаби
                    миёна аз синфи 1 то 11, ки аз тарафи омӯзгорони боистеъдоди вилояти Суғд омода карда шудааст ва
                    барои кӯдакон ва наврасон барои дастрас намудани маълумоти ройгон ва соҳиб шудан ба дониш ва
                    таҳсилоти дастрас, пешниҳод карда мешавад. Лоиҳаи мазкур, дар айни замон, ки дар ҷаҳон вируси
                    COVID-19 паҳн шудааст, яке аз воситаҳои таъмин ва ташкили таҳсилоти фосилавӣ ба шумор меравад.
                </p>
                <p class="p my-3"> Дарсҳои Мактаби электронии Тоҷикистон аз маҷмӯи маводҳои аз тарафи Вазорати маориф ва
                    илми Тоҷикистон тасдиқшуда, дар тамоми давраи омӯзиш (аз синфи 1 то 11), пайдарпай бо пешниҳоди
                    мавзӯъҳо, дарси видеоӣ, конспект ва шарҳи мавзӯъ, масъалаҳо бо ҳал ва супориши хонагӣ иборат аст.
                </p>
                <p class="p my-3">Истифодабарандагони лоиҳа метавонанд ҳамеша дар дилхоҳ фосилаи вақт, дар режими бархат
                    (он-лайн) дар Мактаби электронии Тоҷикистон таҳсил карда, мавзӯи дарсиро омӯзанд ва такрор кунанд.
                    Ин барои муаллимон имкони хубро фароҳам меорад ва истифода аз "дарсҳои кушоди" ҳамкасбони худ ташриф
                    оварда, таҷрибаи боз ҳам баландтарро соҳиб шаванд ва барои дарсҳои фаъоли худ маводи гуногуни
                    иловагӣ гиранд. Падару модарон дар Мактаби электронии Тоҷикистон бо ҳамроҳии фарзандони худ дар як
                    “рӯи мизи мактаб” нишаста (кабинети инфиродии талаба), раванди таҳсилро аз ибтидо то интиҳои дарс
                    пайгирӣ кунанд.
                </p>
                <p class="p my-3"> Мактаби электронии Тоҷикистон воситаест, ки барои таъмин ва ташкили “таҳсил дар
                    давоми ҳаёт”-ро ҳам барои ҷавонон ва ҳам барои калонсолон кӯмаки худро мерасонад.
                </p>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
