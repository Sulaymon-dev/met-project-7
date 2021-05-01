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
                             <a class="main-btn" href="{{route('about')}}">Муфассалтар</a>
                            </span>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slide mt-40">
                        @foreach($secondSliderSlides as $slider)
                            <div class="col-lg-4">
                                <a href="{{$slider->url}}">
                                    <span class="single-category text-center" style="background-color: {{$slider->bg_color}}">
                                        <span class="icon">
                                            <img src="{{$slider->img_src}}" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>{{$slider->title}}</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        @endforeach

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
