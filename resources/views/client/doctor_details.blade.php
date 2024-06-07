@extends('client/layouts/main')

@section('content')

    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Личный кабинет</h3>
                <ul>
                    <li>
                        <a href="{{route('client.index')}}">Главная</a>
                    </li>
                    <li>
                        <a href="{{route('client.specialists')}}">Специалисты</a>
                    </li>
                    <li>Подробнее</li>
                </ul>
            </div>
        </div>
        <div class="inner-banner-shape">
            <div class="shape1">
                <img src="{{asset('assets/img/inner-banner/inner-banner-shape1.png')}}" alt="Images">
            </div>
            <div class="shape2">
                <img src="{{asset('assets/img/inner-banner/inner-banner-shape2.png')}}" alt="Images">
            </div>
        </div>
    </div>


    <section class="service-area pt-50 pb-70">

        <div class="doctors-details-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="doctors-details-img">
                            <img
                                src="{{asset('storage/'.(empty($specialist->image) ? 'images/picture.jpg' : $specialist->image))}}"
                                alt="Images">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="doctors-details-content">
                            <h3>{{$specialist->name}}</h3>
                            <span>{{$specialist->competence->title}}</span>
                            <ul class="doctors-details-list">
                                <li>Email: <a href="#">{{$specialist->user->email}}</a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h3>Образование</h3>
                        <div class="doctors-details-text">
                            {!! $specialist->education !!}
                        </div>
                        <h3>Подробная информация</h3>
                        <div class="doctors-details-text">
                            {!! $specialist->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 pt-100">

                    <div class="col-lg-12">
                        <div class="billing-details">
                            <h3 class="title">Коментарии</h3>

                            <div class="row">

                                <form id="commentForm">
                                    @csrf
                                    <input type="text" name="doctor_id" class="d-none" value="{{$specialist->id}}">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                        <textarea name="text" id="text" cols="30" rows="5" placeholder="Ваш комментарий"
                                                  class="form-message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-right mt-0 mb-3">
                                        <button type="submit" class="default-btn disabled" id="commentSubmit"
                                                style="pointer-events: all; cursor: pointer;">
                                            Опубликовать
                                        </button>
                                    </div>
                                </form>

                                @foreach($comments as $comment)
                                    <div class="post">
                                        <div class="user-block">
                                        <span class="username">
                                          <a href="#">{{$comment->client->name}}</a>
                                        </span>
                                            <span class="description">Дата публикации -  {{\Carbon\Carbon::parse($comment->date)->format('d.m.Y H:i')}}</span>
                                        </div>
                                        <p>
                                            {{$comment->text}}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <script src="{{asset('dist/js/comment.js')}}"></script>

            <div class="doctors-details-shape">
                <img src="{{asset('assets/img/doctors/doctors-shape4.png')}}" alt="Images">
            </div>
        </div>
    </section>

@endsection
