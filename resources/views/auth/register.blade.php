@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section class="signup pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form method="POST" action="{{ route('register') }}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title pb-20">Сохтани аккаунт</h2>
                        <div class="form-group">
                            <input type="text"
                                   class="form-input @error('name') is-invalid @enderror"
                                   name="name"
                                   id="name"
                                   placeholder="Ному насаб"
                                   value="{{ old('name') }}"
                                   required autocomplete="name"
                                   autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email"
                                   class="form-input @error('email') is-invalid @enderror"
                                   name="email"
                                   id="email"
                                   placeholder="Email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password"
                                   class="form-input @error('password') is-invalid @enderror"
                                   name="password"
                                   id="password"
                                   placeholder="Парол"
                                   required
                                   autocomplete="new-password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password"
                                   class="form-input"
                                   name="password_confirmation"
                                   id="password_confirmation"
                                   required autocomplete="new-password"
                                   placeholder="Паролро такрор кунед"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term">
                                <span><span></span></span>
                                Ман  <b><a href="#" class="term-service">қоидаҳои </a></b> сомонаро қабул менамоям
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="main-btn">Сохтани аккаунт</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Шумо ҳоло аккаунт доред? <a href="{{route('login')}}" class="loginhere-link">Воридшавӣ</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
