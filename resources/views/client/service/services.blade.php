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
                    <li><a href="{{route('client.categories')}}">Услуги</a></li>
                    <li>{{$category->title}}</li>
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
                <h2>Прайс лист</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                {!! $category->description !!}
            </div>
            <div class="row pt-45">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Продолжительность</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($services as $service)
                        <tr>
                            <td class="total-price">
                                <span>{{$service->title}}</span>
                            </td>
                            <td class="total-price">
                                <span>{{$service->description}}</span>
                            </td>
                            <td class="total-price">
                                <span>{{$service->duration}} мин.</span>
                            </td>
                            <td class="product-subtotal">
                                <span class="subtotal-amount">{{$service->price}}₽</span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <div class="service-dots-2">
            <img src="{{asset('assets/img/services/service-dots-2.png')}}" alt="Images">
        </div>
    </section>

@endsection
