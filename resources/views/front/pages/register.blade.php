@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section class="signup pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title pb-20">Сохтани аккаунт</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Ному насаб">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Парол"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password_confirmation" id="password_confirmation" placeholder="Паролро такрор кунед"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Ман  <b><a href="#" class="term-service">қоидаҳои </a></b> сомонаро қабул менамоям </label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="main-btn  " value="Сохтани аккаунт"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Шумо ҳоло аккаунт доред? <a href="{{route('front-login')}}" class="loginhere-link">Воридшавӣ</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
