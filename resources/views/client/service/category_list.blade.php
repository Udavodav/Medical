@extends('client/layouts/main')

@section('content')

    <div class="inner-banner inner-bg8">
        <div class="container">
            <div class="inner-title">
                <h3>Наши услуги</h3>
                <ul>
                    <li>
                        <a href="{{route('client.index')}}">Главная</a>
                    </li>
                    <li>Услуги</li>
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

    <section class="service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Наши услуги</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                <p>
                    Ваше здоровье - наш приоритет! Medical предоставляет широкий спектр медицинских услуг, основанных на
                    передовых
                    технологиях и опыте лучших специалистов. Мы заботимся о вашем благополучии на всех этапах, от
                    профилактики до
                    восстановления. Доверьтесь нам - мы поможем вам сохранить и улучшить свое здоровье!
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
        <div class="service-dots-2">
            <img src="assets/img/services/service-dots-2.png" alt="Images">
        </div>
    </section>

@endsection
