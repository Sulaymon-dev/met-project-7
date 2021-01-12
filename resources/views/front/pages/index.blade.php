@extends('front.layout')


@section('style')

@endsection

@section('content')

    <!--====== SLIDER PART START ======-->
    @include('front.layouts.slider')
    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->

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
    " href="/about.php">Муфассалтар</a>

                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slide mt-40">
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/tv-programm.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Видео дарсҳо </span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Китобҳои бадеӣ</span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/prize.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Олимпиадаҳо</span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/web.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Интернет захираҳо</span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/birdy.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Дарси сулҳ</span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="/front/images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                    <span class="cont">
                                            <span>Машқҳо</span>
                                    </span>
                                    </span>
                                    <!-- single category -->
                                </a>
                            </div>
                        </div>
                        <!-- category slide -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- category -->
        </div>
        <!-- container -->
    </section>

    <!--====== CATEGORY PART ENDS ======-->


    <!--====== ADMISSION PART START ======-->

    <section class="admission-row pb-120">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-8">
                    <div class="admission-card mt-30" style="height: 550px;">
                        <div class="card-image">
                            <a href="#"><img src="/front/images/admission/admission1.jpg" alt="Admission"></a>
                        </div>
                        <div class="card-content">
                            <a href="#">
                                <h4 class="card-titles">Мактаббачаҳои фаьол</h4>
                                <p>Мактаббачаҳои синфҳои поёни метавонанд тавассути барномаҳои синфҳои болоӣ аз
                                    имкониятҳои омӯзиши пешрафта истифода баранд.</p>
                            </a>
                        </div>
                    </div>
                    <!-- admission card -->
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="admission-card mt-30" style="height: 550px;">
                        <div class="card-image">
                            <a href="#"><img src="/front/images/admission/admission-1.jpg" alt="Admission"></a>
                        </div>
                        <div class="card-content">
                            <a href="#">
                                <h4 class="card-titles">Усулҳои инноватсионии таълим</h4>
                                <p>Усули инфиродии мо бо мактаббачагон дар ҷое, ки онҳо ҳастанд, вомехӯрад - мувофиқат
                                    кардани услубҳои гуногуни омӯзиш ва хурсандии таълимро бармеангезад.</p>
                            </a>
                        </div>
                    </div>
                    <!-- admission card -->
                </div>

                <div class="col-lg-4 col-md-8">
                    <div class="admission-card mt-30" style="height: 550px;">
                        <div class="card-image">
                            <a href="#"><img src="/front/images/admission/admission.jpg" alt="Admission"></a>
                        </div>
                        <div class="card-content">
                            <a href="#">
                                <h4 class="card-titles">Тайёрӣ ба имтиҳонҳои ММТ</h4>
                                <p>Талабаҳои мактабҳои миёна метавонанд бо таҳсили касбӣ ва омодагӣ ба коллеҷ ва
                                    донишгоҳи такмили ихтисос ба оянда ибтидо гузоранд.</p>
                            </a>
                        </div>
                    </div>
                    <!-- admission card -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== ADMISSION PART ENDS ======-->

@endsection


@section('script')

@endsection
