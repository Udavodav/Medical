@extends('client/layouts/main')

@section('content')

    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Наши контакты</h3>
                <ul>
                    <li>
                        <a href="#">Главная</a>
                    </li>
                    <li>Контакты</li>
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

    <div class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-widget-right">
                        <h3>Контактные данные</h3>
                        <p>Вся необходимая информация о нашем местоположении и о том, как с нами связаться указана здесь.</p>
                        <ul class="contact-list">
                            <li>
                                <i class="flaticon-pin"></i>
                                <div class="content">
                                    Россия, г. Ульяновск, ул. Набережная реки Свияги, 106
                                </div>
                            </li>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <div class="content">
                                    <a href="tel:+001-548-159-2491">+001-548-159-2491</a>
                                    <a href="tel: +001-548-159-2492"> +001-548-159-2492</a>
                                </div>
                            </li>
                            <li>
                                <i class="bx bxs-envelope"></i>
                                <div class="content">
                                    <a href="medical@mail.ru">medical@mail.ru</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form">
                        <h2>Обратная связь</h2>
                        <form id="contactForm" novalidate="true">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Имя">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Электронная почта">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Телефон">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="Тема">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Сообщение"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
                                        Отправить сообщение
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-shape">
            <img src="assets/img/shape/shape2.png" alt="Images">
        </div>
    </div>

    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d582.0093860194992!2d48.36743096970948!3d54.30328679828639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415d37f76ce3e3a7%3A0x6a8da4918c7fe54b!2z0L3QsNCxLiDQoNC10LrQuCDQodCy0LjRj9Cz0LgsIDEwNiwg0KPQu9GM0Y_QvdC-0LLRgdC6LCDQo9C70YzRj9C90L7QstGB0LrQsNGPINC-0LHQuy4sIDQzMjA0OA!5e0!3m2!1sru!2sru!4v1716285059091!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>

@endsection
