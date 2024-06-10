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
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" required
                                               data-error="Пожалуйста введите свой email" placeholder="Email" name="email" value="{{ old('email') }}"
                                               autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 text-center">
                                    <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
                                        Отправить письмо для сброса пароля
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
