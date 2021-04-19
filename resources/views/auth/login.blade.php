@extends('front.layout')

@section('style')
@endsection

@section('content')
    <section class="signup pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="col-md-8 offset-md-2">
                <div class="signup-content">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <h2 class="form-title pb-20">Воридшавӣ ба система</h2>
                        <div class="form-group">
                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   placeholder="Email"
                                   autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password"
                                   type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   placeholder="Парол"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit"  class="main-btn register-submit">Воридшавӣ</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Шумо ҳоло аккаунт надоред? <a href="{{route('register')}}" class="loginhere-link">Сохтани аккаунт</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
