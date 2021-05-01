<div class="position-relative">
    <section id="slider-part" class="slider-active">
        @foreach((array)$mainSliderSlides as $slider)
            <div class="single-slider slider-4 bg_cover pt-150 position-relative"
                 style="background-image: url({{$slider->img_src}})">
                <div class="position-absolute"></div>
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-xl-6 col-lg-6">
                            <div class="slider-cont slider-cont-4 text-left">
                                <h1 data-animation="fadeInUp" class="text-white"
                                    data-delay="1s">{{$slider->title}} </h1>
                                <p data-animation="fadeInUp" class="text-white"
                                   data-delay="1.5s">{{$slider->description}}</p>
                                <a data-animation="fadeInUp" data-delay="2s" class="main-btn"
                                   href="{{$slider->url}}">{{$slider->btn_text}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</div>
