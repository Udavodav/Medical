@extends('client/layouts/main')

@section('content')

    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <h3>Наши специалисты</h3>
                <ul>
                    <li>
                        <a href="#">Главная</a>
                    </li>
                    <li>Специалисты</li>
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

    <div class="doctor-tab-area pt-100 pb-70">
        <div class="container">
            <div class="tab doctor-tab text-center">

                <div class="tab_content current active pt-45">
                    <div class="tabs_item current">
                        <div class="doctor-tab-item">
                            <div class="row">

                                @foreach($specialists as $specialist)
                                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                                    <div class="doctors-item">
                                        <div class="doctors-img">
                                            <a href="{{route('client.specialist_details', $specialist->id)}}">
                                                <img src="{{asset('storage/'.(empty($specialist->image) ? 'images/picture.jpg' : $specialist->image))}}" alt="Images">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3><a href="{{route('client.specialist_details', $specialist->id)}}">{{$specialist->name}}</a></h3>
                                            <span>{{$specialist->competence->title}}</span>
                                            <ul class="social-link">
                                                <li>
                                                    <a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="bx bxl-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="doctor-tab-shape">
            <div class="shape1">
                <img src="assets/img/doctors/doctors-shape3.png" alt="Images">
            </div>

            <div class="shape2">
                <img src="assets/img/doctors/doctors-shape4.png" alt="Images">
            </div>
        </div>
    </div>

    <div class="appointment-area appointment-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="appointment-from-area">
                        <div class="appointment-from ">
                            <h2>Квалифицированная помощь</h2>
                            <p>Получи квалифицированную медицинскую помощь от настоящих специалистов.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appointment-img-2">
            <img src="assets/img/appointment/appointment-img2.png" alt="Images">
        </div>
        <div class="appointment-shape">
            <img src="assets/img/appointment/appointment-shape.png" alt="Images">
        </div>
    </div>

@endsection
