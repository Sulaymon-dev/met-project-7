<section id="category-part">
    <div class="container">
        <div class="category category-tow pt-40 pb-40">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text category-text-tow pl-30 pr-30">
                            <span class="single-category text-center color-4">
                               {{$secondSliderSlides['description']}}
                            </span>
                        <a class="main-btn" href="{{$secondSliderSlides['btn_url']}}">
                            {{$secondSliderSlides['btn_text']}}</a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slide mt-40">
                        @foreach($secondSliderSlides['slides'] as $slider)
                            <div class="col-lg-4">
                                <a href="{{$slider->url}}">
                                    <span class="single-category text-center"
                                          style="background-color: {{$slider->bg_color}}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
