@extends('client/layouts/main')

@section('content')

    <!-- Banner Area -->
    <div class="banner-area banner-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <span>Дом вашей надежды</span>
                        <h1>Мы ответственны за ваше здоровье</h1>
                        <p>Запишитесь на прием онлайн и будьте в безопасности дома. Потому что ваша безопасность - наш
                            главный приоритет.</p>
                        <div class="banner-btn">
                            @auth
                                @if(auth()->user()->role->title === 'client')
                                    <a href="{{route('client.write')}}" class="appointment-btn">Записаться на прием</a>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-img">
            <img src="assets/img/home-one/home-one-img.png" alt="Images">
        </div>
        <div class="banner-shape">
            <div class="shape1">
                <img src="assets/img/home-one/shape1.png" alt="Images">
            </div>
            <div class="shape2">
                <img src="assets/img/home-one/shape2.png" alt="Images">
            </div>
        </div>
    </div>

    <!-- Banner Bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-bottom-card">
                        <i class='flaticon-call'></i>
                        <div class="content">
                            <span>Обратитесь в Службу экстренной помощи 24/7</span>
                            <h3><a href="#">+7 (123) 456 789 12</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Bottom End -->

    <!-- About Area -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets/img/about-img/about-img.jpg" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <span>О нас</span>
                            <h2>Мы - ваши надежные друзья</h2>
                            <p>Medical - это надежный поставщик медицинских услуг, который всегда на вашей стороне, и
                                ваше здоровье является нашим главным приоритетом.</p>
                            <p>
                                Лечение в Medical будет осуществляться с помощью настраиваемых программ, основанных на
                                плане, которые предусматривают
                                партнерство между членами семьи и лицами, осуществляющими уход, в целях длительного
                                лечения или ведения болезни.
                            </p>
                        </div>
                        <div class="about-card">
                            <i class='flaticon-24-hours bg-one'></i>
                            <div class="content">
                                <span>Поддержка 24/7</span>
                                <p>Наша медицинская команда, состоящая из различных отделений, занимающихся длительными
                                    заболеваниями, делает все возможное</p>
                            </div>
                        </div>

                        <div class="about-card">
                            <i class='flaticon-ambulance-2 bg-two'></i>
                            <div class="content">
                                <span>Экстренная поддержка</span>
                                <p>Здесь вы найдете важную информацию о правилах оказания первой медицинской помощи и
                                    действиях в экстренных ситуациях. </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    {{--    <div class="blog-area pt-100 pb-70">--}}
    {{--        <div class="container">--}}
    {{--            <div class="section-title text-center">--}}
    {{--                <h2>Статьи и новости</h2>--}}
    {{--                <div class="section-icon">--}}
    {{--                    <div class="icon">--}}
    {{--                        <i class="flaticon-dna"></i>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <p>--}}
    {{--                    We provide excellent services for your ultimate good health. Here some of the services are included--}}
    {{--                    for your better understand that we are always at your side.--}}
    {{--                </p>--}}
    {{--            </div>--}}
    {{--            <div class="row pt-45">--}}
    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="blog-item">--}}
    {{--                        <div class="blog-item-img">--}}
    {{--                            <a href="#">--}}
    {{--                                <img src="assets/img/blog/blog-img.jpg" alt="Images">--}}
    {{--                            </a>--}}
    {{--                            <div class="date">--}}
    {{--                                <ul>--}}
    {{--                                    <li>16</li>--}}
    {{--                                    <li>Sep</li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="content">--}}
    {{--                                <span class="topic">--}}
    {{--                                    <a href="#">Healthcare</a>--}}
    {{--                                </span>--}}
    {{--                            <h3>--}}
    {{--                                <a href="#"> Lockdowns Leads to Fewer Peo - Ple Seeking Medical Care</a>--}}
    {{--                            </h3>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-4 col-md-6">--}}
    {{--                    <div class="blog-item">--}}
    {{--                        <div class="blog-item-img">--}}
    {{--                            <a href="#">--}}
    {{--                                <img src="assets/img/blog/blog-img2.jpg" alt="Images">--}}
    {{--                            </a>--}}
    {{--                            <div class="date">--}}
    {{--                                <ul>--}}
    {{--                                    <li>18</li>--}}
    {{--                                    <li>Sep</li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="content">--}}
    {{--                                <span class="topic">--}}
    {{--                                    <a href="#">Healthcare</a>--}}
    {{--                                </span>--}}
    {{--                            <h3>--}}
    {{--                                <a href="#"> Emergency Medicine Resea - rch Course for the Doctors</a>--}}
    {{--                            </h3>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">--}}
    {{--                    <div class="blog-item">--}}
    {{--                        <div class="blog-item-img">--}}
    {{--                            <a href="#">--}}
    {{--                                <img src="assets/img/blog/blog-img3.jpg" alt="Images">--}}
    {{--                            </a>--}}
    {{--                            <div class="date">--}}
    {{--                                <ul>--}}
    {{--                                    <li>28</li>--}}
    {{--                                    <li>Sep</li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="content">--}}
    {{--                                <span class="topic">--}}
    {{--                                    <a href="#">Healthcare</a>--}}
    {{--                                </span>--}}
    {{--                            <h3>--}}
    {{--                                <a href="#"> Advance Care Planning Information Session - 2020</a>--}}
    {{--                            </h3>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="col-lg-12">--}}
    {{--                    <div class="blog-more-btn">--}}
    {{--                        <a href="#" class="default-btn-two">Узнать больше</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="blog-shape-icon">--}}
    {{--            <i class="flaticon-dna"></i>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- Service Area -->
    <section class="service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Услуги, которые мы предоставляем</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                <p>
                    Мы предоставляем превосходные услуги для поддержания вашего здоровья в наилучшем состоянии. Ниже
                    приведены некоторые из предлагаемых услуг
                    чтобы вы лучше понимали, что мы всегда на вашей стороне.
                </p>
            </div>
            <div class="row pt-45">

                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{route('client.services', $category->id)}}">
                            <div class="service-card">
                                <img
                                    src="{{asset('storage/'.(empty($category->image) ? 'images/picture_category.jpg' : $category->image))}}"
                                    alt="Images">
                                <div class="service-content">
                                    <div class="service-icon">
                                        <i class="{{$category->icon}}"></i>
                                    </div>
                                    <h3>{{$category->title}}</h3>
                                    <div class="content">
                                        {!! $category->description !!}
                                    </div>
                                </div>
                                <div class="service-shape-1">
                                    <img src="{{asset('assets/img/services/service-shape1.png')}}" alt="Images">
                                </div>
                                <div class="service-shape-2">
                                    <img src="{{asset('assets/img/services/service-shape2.png')}}" alt="Images">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="service-dots">
            <img src="assets/img/services/service-dots.png" alt="">
        </div>
    </section>

    <div class="faq-area faq-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="faq-accordion">
                        <div class="section-title">
                            <span>Вопрос ответ</span>
                            <h2>Ответы на часто задаваемые вопросы</h2>
                        </div>
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    В чем преимущества вашей клиники перед другими?
                                </a>

                                <div class="accordion-content" style="display: none;">
                                    <p>
                                        Вам будет оказана квалифицированная медицинская помощь в соответствии с
                                        Медико-экономическими стандартами (МЭСами), разработанными Минздравом России.
                                        Это значит, что алгоритм работы с вами будет содержать только те назначения,
                                        которые необходимы для оптимальной диагностики и лечения вашего
                                        заболевания. </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    К какому врачу лучше записаться (какой специалист)?
                                </a>

                                <div class="accordion-content" style="display: none;">
                                    <p>
                                        Высокое качество нашего обслуживания не зависит от того, когда и к какому врачу
                                        вы пришли. Вы можете выбрать специалиста, исходя из его профиля и специализации,
                                        и быть уверены, что получите максимально квалифицированную помощь. </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    Какие формы оплаты у вас существуют? Можно ли вносить оплату частями?
                                </a>

                                <div class="accordion-content" style="display: none;">
                                    <p>
                                        Форма оплаты для частных лиц – любая (наличная, безналичная, по банковской
                                        карте). Для юридических лиц доступен только безналичный расчет. Оплата полной
                                        суммы единовременно. </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    Как записаться на прием?
                                </a>

                                <div class="accordion-content" style="display: none;">
                                    <p>
                                        Записаться на приём возможно любым удобным способом: заполнить форму на сайте,
                                        позвонить по номеру телефона +7 (495) 266-77-63 или посетить наш центр, где
                                        администраторы подберут для Вас удобное время. </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)">
                                    <i class="bx bx-chevron-down"></i>
                                    Мне нужно приносить с собой записи с прошлого приема?
                                </a>

                                <div class="accordion-content" style="display: block;">
                                    <p>
                                        Нет, записи о результатах всех осмотров и анализов, которые вы проходите в нашем
                                        центре, мы храним в электронной карте клиента. При необходимости мы сделаем из
                                        нее выписку - это бесплатно. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-counter-area">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-counter">
                                    <h3>2000+</h3>
                                    <span>Счастливых пациентов</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="single-counter">
                                    <h3>150+</h3>
                                    <span>Мед специалистов</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="single-counter">
                                    <h3>500+</h3>
                                    <span>Медицинских мест</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="single-counter">
                                    <h3>25+</h3>
                                    <span>Многолетний опыт работы</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Doctors Area -->
    <div class="doctors-area ptb-100">
        <div class="container">
            <div class="section-title text-center">
                <h2>Некоторые наши специалисты</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                <p>
                    У нас в штате одни из лучших специалистов из разных областей медицины, и вот несколько из них
                </p>
            </div>
            <div class="doctors-slider owl-carousel owl-theme pt-45">

                @foreach($specialists as $specialist)

                    <div class="doctors-item">
                        <div class="doctors-img">
                            <a href="{{route('client.specialist_details', $specialist->id)}}">
                                <img
                                    src="{{asset('storage/'.(empty($specialist->image) ? 'images/picture.jpg' : $specialist->image))}}"
                                    alt="Images">
                            </a>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="{{route('client.specialist_details', $specialist->id)}}">{{$specialist->name}}</a>
                            </h3>
                            <span>{{$specialist->competence->title}}</span>
                            <ul class="social-link">
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="doctors-shape">
            <div class="doctors-shape-1">
                <img src="assets/img/doctors/doctors-shape1.png" alt="Images">
            </div>
            <div class="doctors-shape-2">
                <img src="assets/img/doctors/doctors-shape2.png" alt="Images">
            </div>
        </div>
    </div>

    <!-- Emergency Area -->
    <div class="emergency-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="emergency-content">
                        <h2>Получите <b>Неотложную</b> помощь 24/7</h2>
                        <p>Мы всегда на вашей стороне. Мы готовы помочь вам в экстренной ситуации в течение 24
                            часов.</p>
                        <div class="emergency-icon-content">
                            <i class="flaticon-24-hours-1"></i>
                            <h3><a href="#">+8 (123) 456 789 12</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="emergency-shape">
            <img src="assets/img/emergency/emergency-shape.png" alt="Images">
        </div>
    </div>

    <!-- Blog Area -->


    <!-- Testimonials Area -->
    <div class="testimonials-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>Рекомендации</span>
                <h2>Мысли наших пациентах</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-6">
                    <div class="testimonials-img">
                        <img src="assets/img/testimonials/testimonials-img.jpg" alt="Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="testimonials-slider-area">
                        <div class="testimonials-slider owl-carousel owl-theme">
                            <div class="testimonials-item">
                                <i class="flaticon-left-quote"></i>
                                <p>Больнице Medical за их профессиональный, компетентный и целеустремленный подход,
                                    который они всегда проявляют, помогая мне и другим пациентам чувствовать себя
                                    спокойно в эти тревожные времена.</p>
                                <div class="content">
                                    <img src="{{asset("assets/img/people/people1.png")}}" alt="Images">
                                    <h3>Анна Мардамшина</h3>
                                    <span>Пациент сердечник</span>
                                </div>
                            </div>

                            <div class="testimonials-item">
                                <i class="flaticon-left-quote"></i>
                                <p>Прошел полное обследование в клинике Medical, результаты получил оперативно и врачи
                                    предложили наилучшее лечение.</p>
                                <div class="content">
                                    <img src="{{asset("assets/img/people/people2.png")}}" alt="Images">
                                    <h3>Татьяна Шевченко</h3>
                                    <span>Пациент с диабетом</span>
                                </div>
                            </div>

                            <div class="testimonials-item">
                                <i class="flaticon-left-quote"></i>
                                <p>Приятная атмосфера клиники Medical и отличный сервис - здесь действительно заботятся
                                    о пациентах.</p>
                                <div class="content">
                                    <img src="{{asset("assets/img/people/people4.png")}}" alt="Images">
                                    <h3>Максим Волков</h3>
                                    <span>Пациент с травмой</span>
                                </div>
                            </div>

                            <div class="testimonials-item">
                                <i class="flaticon-left-quote"></i>
                                <p>Благодаря клинике Medical я быстро и безболезненно избавился от проблемы с зубами,
                                    рекомендую всем!</p>
                                <div class="content">
                                    <img src="{{asset("assets/img/people/people3.png")}}" alt="Images">
                                    <h3>Ксения Собчак</h3>
                                    <span>Пациент с кариесом</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
