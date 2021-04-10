@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section class="signup pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form action="{{route('check-login')}}" method="post">
                        <h2 class="form-title pb-20">Воридшавӣ ба система</h2>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Парол"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="main-btn register-submit" value="Воридшавӣ"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Шумо ҳоло аккаунт надоред? <a href="{{route('front-register')}}" class="loginhere-link">Сохтани аккаунт</a>
                    </p>
                    <p class="loginhere">
                          <a href="{{route('profile')}}" class="loginhere-link">Саҳифаи профил</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
