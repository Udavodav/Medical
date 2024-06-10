@extends('client.layouts.main')

@section('content')


<div class="sign-in-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <h2>Сброс пароля</h2>
                        </div>
                        <form method="POST" action="{{ route('password.update')  }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                               data-error="Пожалуйста введите свой email" placeholder="Email" name="email" value="{{ $email ?? old('email') }}"
                                               autocomplete="email" autofocus>

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
                                               required autocomplete="new-password" placeholder="Пароль">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation"
                                               required autocomplete="new-password" placeholder="Повторите пароль">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
                                        Сбросить пароль
                                    </button>
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
