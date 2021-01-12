@extends('front.layout')

@section('style')
@endsection


@section('content')
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
             style="background-image: url('/front/images/page-banner-1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Фанҳои омӯзиш</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Фанҳо</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- page banner cont -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== FAQ PART START ======-->

    <section class="py-5 header">
        <div class="container py-4">


            <div class="row">


                <div class="col-md-12">
                    <!-- Tabs content -->
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade shadow rounded bg-white  show active  p-5"
                             role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="category-2-items">
                                <div class="row">
                                    @foreach($subjects as $subject)
                                        <div class="col-md-3">
                                            <div class="single-items text-center mt-30">
                                                <a href="{{route('subject',[
                                                    'slug'=>$subject->slug,
                                                    'sinf'=>$subject->plans()->pluck('sinf_id')->first()
                                                ])}}">

                                                    <div class="items-image">
                                                        <img src="/storage/uploads/img/{{$subject->image_src}}"
                                                             width="372px"
                                                             height="145px" alt="{{$subject->name}}">
                                                    </div>
                                                    <div class="items-cont">
                                                        <h5>{{$subject->name}}</h5>


                                                    </div>
                                                </a>
                                            </div>
                                            <!-- single items -->
                                        </div>
                                    @endforeach


                                </div>
                                <!-- row -->
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== FAQ PART ENDS ======-->


@endsection

@section('script')
@endsection
