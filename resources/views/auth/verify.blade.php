@extends('client.layouts.main')

@section('content')

<div class="sign-in-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="user-all-form">
                    <div class="contact-form">
                        <div class="section-title text-center">
                            <h2>Подтвердите ваш email</h2>
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        Прежде чем продолжить, пожалуйста, проверьте свой адрес электронной почты на наличие ссылки для подтверждения. Если вы не получили электронное письмо,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">нажмите здесь, чтобы запросить другое.</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
