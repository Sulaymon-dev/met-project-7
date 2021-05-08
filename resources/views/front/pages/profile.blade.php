@extends('front.layout')

@section('style')
@endsection

@section('content')

    <section id="teachers-single" class="pb-50 gray-bg">
        <div class="container">


            <div class="row clearfix">
                <div class="col-lg-12 col-md-6 col-sm-4">
                    @if($errors->any())
                        <div class="alert alert-danger alert-block mt-5">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            @foreach($errors->all() as $error)
                                <strong>{{$error}}</strong>
                                <br>
                            @endforeach
                        </div>
                    @endif
                    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success alert-block mt-5">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="{{asset('/storage/uploads/img/' . $avatar)}}" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6>{{$user->name}}</h6>
                            @if($user->role === 'student')
                                <span>Синфи {{$sinf}}</span>
                            @else
                                <a href="{{route('admin.main')}}" class="main-btn mt-3">Саҳифаи админ</a>
                            @endif
                        </div>
                        @if($networks)
                            <div class="social">
                                <ul>
                                    @foreach($networks as $key=>$network)
                                        @if($network)
                                            <li><a href="{{$network}}"><i class="fa fa-{{$key}}"></i></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab"
                                   aria-controls="courses"
                                   aria-selected="false">
                                    @if($user->role === 'student')
                                        Маводҳо
                                    @else
                                        Маводҳои ман
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                   aria-controls="reviews"
                                   aria-selected="false">Танзимот</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                 aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="single-dashboard pt-40">
                                        @if($profile && $profile->about)
                                            <h5>Маълумоти умумӣ</h5>
                                            <p>{{ $profile->about }}</p>
                                        @else
                                            <x-danger-text text="Шумо профили худро пурра накардаед. Лутфан ба сахифаи ТАНЗИМОТ гузаред..."></x-danger-text>
                                        @endif
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
                                        <form method="POST" action="{{route('update-profile')}}"
                                              enctype="multipart/form-data">
                                            @csrf
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
                                                               value="{{($profile) ? $profile->phone : null}}">
                                                    </div>

                                                    @if($user->role === 'student')
                                                        <div class="form-single">
                                                            <input max="11"
                                                                   maxlength="2"
                                                                   name="sinf"
                                                                   placeholder="Синфро ворид кунед"
                                                                   value="{{($profile) ? $profile->sinf : null}}">
                                                        </div>
                                                    @endif
                                                    <div class="form-single">
                                                        <select name="gender">
                                                            <option value="M"
                                                                {{(($profile) && $profile->gender==='M')?'selected':''}}>
                                                                Мард
                                                            </option>
                                                            <option value="F"
                                                                {{(($profile) && $profile->gender==='F')?'selected':''}}>
                                                                Зан
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-single">
                                                        <input type="text"
                                                               disabled
                                                               name="email"
                                                               placeholder="Email"
                                                               value="{{$user->email}}">
                                                    </div>
                                                    <div class="form-single">
                                                        <input type="password"
                                                               name="password"
                                                               placeholder="Пароли навро ворид кунед">
                                                    </div>
                                                    <div class="form-single">
                                                        <input type="password"
                                                               name="password_confirmation"
                                                               placeholder="Пароли навро такрор кунед">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-single">
                                                        <input type="file" name="avatar">
                                                    </div>
                                                    <div class="pt-10 d-flex flex-column align-items-center">
                                                        <img src="{{asset('/storage/uploads/img/'.$avatar)}}"
                                                             style="width: 100px">
                                                    </div>
                                                    <div class="form-single d-flex align-items-center">
                                                        <i class="fa fa-instagram  mr-1"
                                                           style="font-size: 25px"></i>
                                                        <input type="text"
                                                               name="instagram"
                                                               value="{{$instagram}}"
                                                               placeholder="Ҳаволаи аккаунти instagram">
                                                    </div>
                                                    <div class="form-single d-flex align-items-center">
                                                        <i class="fa fa-facebook-square mr-1"
                                                           style="font-size: 25px"></i>
                                                        <input type="text"
                                                               name="facebook"
                                                               value="{{$facebook}}"
                                                               placeholder="Ҳаволаи аккаунти facebook">
                                                    </div>
                                                    <div class="form-single d-flex align-items-center">
                                                        <i class="fa fa-telegram  mr-1"
                                                           style="font-size: 25px"></i>
                                                        <input type="text"
                                                               name="telegram"
                                                               value="{{$telegram}}"
                                                               placeholder="Ҳаволаи аккаунти telegram">
                                                    </div>
                                                    <div class="form-single d-flex align-items-center">
                                                        <i class="fa fa-linkedin  mr-1" style="font-size: 25px"></i>
                                                        <input type="text"
                                                               name="linkedIn"
                                                               value="{{$linkedIn}}"
                                                               placeholder="Ҳаволаи аккаунти linkedIn">
                                                    </div>

                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-single">
                                                            <textarea name="about"
                                                                      placeholder="Дар бораи худ">{{($profile) ? $profile->about : null}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-single">
                                                        <button type="submit" class="main-btn">Сабт кардан</button>
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
