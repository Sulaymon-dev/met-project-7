@extends('front.layout')

@section('style')
@endsection

@section('content')

    <section id="teachers-single" class="pb-50 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="{{asset('front/images/teachers/t-1.jpg')}}" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6>{{$user->name}}</h6>
                            <span>Синфи {{$sinf}}</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>{{$user->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                   aria-controls="dashboard" aria-selected="true">Маълумоти умумӣ</a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses"
                                   aria-selected="false">Маводҳо</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                   aria-selected="false">Танзимот</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                 aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="single-dashboard pt-40">
                                        <h5>About</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                            tellus .</p>
                                        <h5>Acchivments</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                            tellus .</p>
                                        <h5>My Objective</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec
                                            tellus .</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="courses-cont pt-20" style="margin: -30px -50px">
                                    @include('front.layouts.content-subject-class')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Танзимоти хонанда</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-single">
                                                        <input type="text"
                                                               name="name"
                                                               placeholder="Ному насаб"
                                                               value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-single">
                                                        <input type="text"
                                                               name="phone"
                                                               placeholder="Рақами телефон"
                                                               value="{{$user->phone}}">
                                                    </div>
                                                    <div class="form-single">
                                                        <input max="11"
                                                               maxlength="2"
                                                               name="sinf"
                                                               placeholder="Синфро ворид кунед">
                                                    </div>
                                                    <div class="form-single">
                                                        <input type="text"
                                                               disabled
                                                               name="email"
                                                               placeholder="Email"
                                                               value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-flex flex-column align-items-center">
                                                    <div class="form-single">
                                                        <input type="file">
                                                    </div>
                                                    <div class="pt-10">
                                                        <img src="{{asset('front/images/teachers/t-1.jpg')}}"
                                                             style="width: 100px"
                                                             alt="Teachers">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-single">
                                                        <input type="password"
                                                               name="password"
                                                               placeholder="Пароли навро ворид кунед">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-single">
                                                        <input type="password"
                                                               name="password_confirmation"
                                                               placeholder="Пароли навро такрор кунед">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-single">
                                                        <textarea name="about"
                                                                  placeholder="Дар бораи худ">{{$user->about}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-single">
                                                        <button type="button" class="main-btn">Сабт кадан</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
@endsection
