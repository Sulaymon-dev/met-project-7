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
                        <h2>Хабарҳои нав</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Хабарҳои нав</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($news)
        <section id="event-page" class="pt-90 pb-120 gray-bg">
            <div class="container">
                <div class="row">
                    @foreach($news as $new)
                        <div class="col-lg-6">
                            <div class="single-event-list mt-30">
                                <div class="event-thum">
                                    <a href="{{route('newsById', $new['id'])}}"><img
                                            src="{{asset('/storage/uploads/img/'. $new['img_src'])}}" alt="Event">
                                    </a>
                                </div>
                                <div class="event-cont"><a href="{{route('newsById', $new['id'])}}">
                                        <span><i class="fa fa-calendar"></i> {{$new['created_at']}}</span>
                                        <h4>{{$new['title']}}</h4>
                                        <p>{{Illuminate\Support\Str::limit($new['description'] , 80, ' ...') }}</p></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$news->links('pagination::met_pagination')}}
            </div>
        </section>
    @else
        <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">
            Дар зергурӯҳи зерин мавод вуҷуд надорад...
        </h4>
    @endif
@endsection

@section('script')
@endsection
