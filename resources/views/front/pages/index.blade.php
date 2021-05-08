@extends('front.layout')

@section('style')
@endsection

@section('content')

    @include('front.layouts.slider')
    @include('front.layouts.mini-slider')

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
                   href="{{route('news')}}">Ҳамаи хабарҳо</a>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
