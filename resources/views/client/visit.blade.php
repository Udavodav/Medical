@extends('client/layouts/main')

@section('content')

    <div class="inner-banner inner-bg2">
        <div class="container">
            <div class="inner-title">
                <h3>Ваши посещения</h3>
                <ul>
                    <li>
                        <a href="{{route('client.index')}}">Главная</a>
                    </li>
                    <li>Посещения</li>
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


    <section class="service-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Ваши посещения</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
                <p>В этом разделе вы можете посмотреть информацию обо всех ваших посещениях нашей клиники</p>
            </div>
            <div class="row pt-45">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Время</th>
                        <th scope="col">Специалист</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Коментарий специалиста</th>
                        <th scope="col">Результат</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($writes as $write)
                        <tr>
                            <td class="total-price">
                                <span>{{$loop->iteration}}</span>
                            </td>
                            <td class="total-price" width="120">
                                <span>{{ \Carbon\Carbon::parse($write->date_write)->format('d.m.Y')}}</span>
                            </td>
                            <td class="total-price" width="70">
                                <span>{{intdiv($write->time_write, 60)}}:{{$write->time_write % 60 < 10 ? '0'.($write->time_write % 60) : $write->time_write % 60}}</span>
                            </td>
                            <td class="product-subtotal" width="200">
                                <span class="subtotal-amount">{{$write->doctor->name}}</span>
                            </td>
                            <td class="product-subtotal" width="200">
                                <span class="subtotal-amount">{{$write->service->title}}</span>
                            </td>
                            <td class="product-subtotal">
                                <span class="subtotal-amount">{{$write->visit ? $write->visit->conclusion : ''}}</span>
                            </td>
                            <td class="product-subtotal" width="100">
                                @if($write->visit && $write->visit->file)
                                    <a href="{{ url('/').'/storage/'.$write->visit->file}}" target='_blank'>Результат</a>
                                @endif
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
