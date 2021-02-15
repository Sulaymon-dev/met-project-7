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
                                <li class="breadcrumb-item active" aria-current="page"> Синфҳо</li>
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


    <section class="py-5 header">
        <div class="container py-4">

            <div class="row">
                <div class="col-md-3">
                    <!-- Tabs nav -->
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical" style="color: #234565">


                        @foreach($clusters as $key=>$item)
                            <a class="nav-link mb-3 p-3 shadow
                                @php
                                if(($item->index==$cluster)){
                                 echo 'active' ;
                                 $data=$item;}
                                else{
                                 $active = '';
                                 }
                            @endphp"
                            id="v-pills-home-tab" href="{{route('mmt',['cluster'=>$item->index])}}" role="tab"
                            aria-controls="v-pills-home">
                            <i class="fa fa-book mr-2"></i>
                            <span class="font-weight-bold small text-uppercase">Класстери {{$item->index}} </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-9 shadow">

                    @include('front\layouts\content-mmts-fan', $data)

                </div>
            </div>
        </div>
    </section>

@endsection


@section('script')

@endsection
