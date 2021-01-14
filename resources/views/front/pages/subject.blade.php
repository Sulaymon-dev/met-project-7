@extends('front.layout')


@section('style')

@endsection

@section('content')
    <section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8"
             style="background-image: url('../front/images/page-banner-1.jpg')">
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
            pointer-events: none;
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

    @if(sizeof($subject->plans)<=0)
        <div class="reviews-cont">
            <div class="instructor-description pt-25">
                <p>
                <h4 class="pt-10 pb-10 " style="color:darkred; text-align: center">Дар зергурӯҳи зерин мавод вуҷуд
                    надорад...</h4>
                </p>
            </div>
        </div>

    @else

        <section class="py-5 header">
            <div class="container py-4">

                <div class="row">
                    <div class="col-md-3">
                        <!-- Tabs nav -->
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical" style="color: #234565">

                            @foreach($subject->plans as $key=>$item)

                                <a class="nav-link mb-3 p-3 shadow  {{($item->sinf_id==$sinf)? $active = 'active' : $active = ''}}  "
                                   id="v-pills-home-tab" href="{{route('subject',[
                                                    'slug'=>$subject->slug,
                                                    'sinf'=>$item->sinf_id
                                                ])}}" role="tab"
                                   aria-controls="v-pills-home"
                                   aria-selected="true"
                                >
                                    <i class="fa fa-user-circle-o mr-2"></i>
                                    <span
                                        class="font-weight-bold small text-uppercase">Синфи {{$item->sinf->class}} </span></a>

                            @endforeach


                        </div>
                    </div>

                    <div class="col-md-9 shadow">

                        <div class="courses-single-left mt-30">

                            <div class="title">
                                <h3> {{$theme->book->name}}</h3>
                            </div>
                            <!-- title -->

                            <!-- course terms -->

                            <div class="courses-tab mt-30">
                                <div class="curriculum-cont">
                                    <div class="title">
                                        <h6>СИНФИ {{$sinf}}</h6>
                                    </div>

                                    @include('front\layouts\content-subject', ['theme'=>$theme])

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

    @endif
@endsection


@section('script')

@endsection
