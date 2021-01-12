@extends('front.layout')


@section('style')

@endsection

@section('content')
    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8"
             style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <!-- <h2>Image Gallery</h2> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Асосӣ</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> {{$subject->name}}</li>
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


    <!--====== FAQ PART START ======-->

    <!-- Demo header-->


    <style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*/

        .nav-pills-custom .nav-link {
            color: #07294d;
            background: #fff;
            position: relative;
        }

        .nav-pills-custom .nav-link.active {
            /* color: #45b649;
        background: #fff; */
            color: white;
            background: #07294d;
        }

        /* Add indicator arrow for the active tab */

        @media (min-width: 992px) {
            .nav-pills-custom .nav-link::before {
                content: '';
                display: block;
                border-top: 8px solid transparent;
                border-left: 10px solid #07294d;
                border-bottom: 8px solid transparent;
                position: absolute;
                top: 50%;
                right: -10px;
                transform: translateY(-50%);
                opacity: 0;
            }
        }

        .nav-pills-custom .nav-link.active::before {
            opacity: 1;
        }

    </style>


    <section class="py-5 header">
        <div class="container py-4">

            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical" style="color: #234565">


                        @foreach($subject->plans as $key=>$item)

                            <a class="nav-link mb-3 p-3 shadow  {{($key==0)? $active = 'active' : $active = ''}}  "
                               id="v-pills-home-tab" href="" role="tab" aria-controls="v-pills-home"
                               aria-selected="true">
                                <i class="fa fa-user-circle-o mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Синфи {{$item->sinf->class}} </span></a>

                        @endforeach


                    </div>
                </div>

                <div class="col-md-9 shadow">

                    <div class="courses-single-left mt-30">


                        <div class="title">
                            <h3> {{$subject->name}}</h3>
                        </div>
                        <!-- title -->

                        <!-- course terms -->

                        <div class="courses-tab mt-30">
                            <div class="curriculum-cont">
                                <div class="title">
                                    <h6>СИНФИ 1</h6>
                                </div>
                                <div class="accordion" id="accordionExample">

                                    @foreach($subject->plans as $key=>$item)
                                        <div class="card">
                                            <div class="card-header" id="heading{{$key}}">
                                                <a href="#" data-toggle="collapse"
                                                   class=" {{($key==0) ? 'collapse' : 'collapsed'}} "
                                                   data-target="#collapse{{$key}}" aria-expanded="true"
                                                   aria-controls="collapse{{$key}}">
                                                    <ul>
                                                        <li><i class="fa fa-file-o"></i></li>
                                                        <li><span class="lecture">МАВЗӮИ 1</span>
                                                            {{--                                                        <li><span class="lecture">МАВЗӮИ {{$chapter->theme_num}}</span>--}}
                                                        </li>
                                                        <li><span class="head">{{$item->theme->name}}</span></li>
                                                        <li><span class="time d-none d-md-block">
                                                                                                                        <!-- <span> 00.30.00</span> -->
                                                                                                                        </span>

                                                        </li>
                                                    </ul>
                                                </a>
                                            </div>

                                            <div id="collapse{{$key}}"
                                                 class="{{($key==0) ? 'collapse show' : 'collapse'}} "
                                                 aria-labelledby="heading{{$key}}"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>{{$item->introduction}} <a
                                                            href=""
                                                            class="btn btn-primary stretched-link">Дидан</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach


                                </div>
                            </div>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade active show" id="curriculum" role="tabpanel"
                                     aria-labelledby="curriculum-tab">

                                    <!-- curriculum cont -->
                                </div>


                            </div>
                            <!-- tab content -->
                        </div>
                    </div>
                    <!-- courses single left -->


                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')

@endsection
