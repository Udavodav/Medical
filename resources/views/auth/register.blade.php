@extends('client.layouts.main')

@section('content')
    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Вход</h3>
                <ul>
                    <li>
                        <a href="{{route('client.index')}}">Главная</a>
                    </li>
                    <li>Регистрация</li>
                </ul>
            </div>
        </div>
        <div class="inner-banner-shape">
            <div class="shape1">
                <img src="assets/img/inner-banner/inner-banner-shape1.png" alt="Images">
            </div>
            <div class="shape2">
                <img src="assets/img/inner-banner/inner-banner-shape2.png" alt="Images">
            </div>
        </div>
    </div>

    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span>Регистрация</span>
                                <h2>Создайте свой аккаунт!</h2>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" required
                                                   data-error="Пожалуйста введите свои ФИО" placeholder="ФИО" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="date" id="birthday" class="form-control @error('birthday') is-invalid @enderror" required max="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                                                   data-error="Пожалуйста введите свою Дату рождения" placeholder="Дата рождения" name="birthday" value="{{ old('birthday') }}"  autocomplete="birthday" autofocus>

                                            @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                                   data-error="Пожалуйста введите свой email" placeholder="Email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                   required autocomplete="current-password" placeholder="Пароль">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation"
                                                   required autocomplete="current-password_confirmation" placeholder="Повторите пароль">

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
                                            Регистрация
                                        </button>
                                    </div>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            У вас уже есть аккаунт?
                                            <a href="{{route('login')}}">Войти</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
