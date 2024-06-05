@extends('client.layouts.main')

@section('content')

    <div class="inner-banner inner-bg8">
        <div class="container">
            <div class="inner-title">
                <h3>Запись на прием</h3>
                <ul>
                    <li>
                        <a href="{{route('client.index')}}">Главная</a>
                    </li>
                    <li>Запись онлайн</li>
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
                <h2>Запись онлайн</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
            </div>

            <div class="row pt-45">

                <form action="{{route('client.store_write')}}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="billing-details">
                        <h3 class="title">Форма записи</h3>

                        <div class="row">

                            <input class="d-none" name="client_id" value="1">

                            <div class="wrapper" id="wrapperSpec">
                                <label class="mx-2 my-2 fw-bold">Специалист:</label>
                                <input class="val-inp d-none" name="doctor_id" value="{{$specialists[0]->id}}"
                                       id="doctorInp" oninput="inputSpecialist(this)">
                                <div class="select-btn" id="selectSpec">
                                    <span>{{$specialists[0]->name}}</span>
                                    <i class="uil uil-angle-down"></i>
                                </div>
                                <div class="select-content">
                                    <div class="search">
                                        <i class="uil uil-search"></i>
                                        <input class="sr-inp" spellcheck="false" id="searchSpec" type="text"
                                               placeholder="Search">
                                    </div>
                                    <ul class="options" id="optionsSpec">
                                        @foreach($specialists as $specialist)
                                            <li value="{{$specialist->id}}"
                                                onclick="updateName(this)" {{$loop->index == 0 ? 'selected' : ''}}>{{$specialist->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="wrapper my-3" id="wrapperService">
                                <label class="mx-2 my-2 fw-bold">Услуга:</label>
                                <input class="val-inp d-none" name="service_id" value="" id="serviceInp"
                                       oninput="inputServiceOrDate()">
                                <div class="select-btn" id="selectService">
                                    <span></span>
                                    <i class="uil uil-angle-down"></i>
                                </div>
                                <div class="select-content">
                                    <div class="search" id="searchService">
                                        <i class="uil uil-search"></i>
                                        <input class="sr-inp" spellcheck="false" type="text" placeholder="Search">
                                    </div>
                                    <ul class="options" id="optionsService">

                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mx-2 my-2 fw-bold">Дата:</label>
                                <input type="date" name="date_write" id="dateInp" oninput="inputServiceOrDate()"
                                       value="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                                       min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                            </div>


                            <div class="wrapper my-3" id="wrapperTime">
                                <label class="mx-2 my-2 fw-bold">Время:</label>
                                <input class="val-inp d-none" name="time_write" value="" id="timeInp">
                                <div class="select-btn" id="selectTime">
                                    <span>Время</span>
                                    <i class="uil uil-angle-down"></i>
                                </div>
                                <div class="select-content">
                                    <ul class="options" id="optionsTime">

                                    </ul>
                                </div>
                            </div>


                            <button class="default-btn" type="submit">Записаться</button>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>

                <script src="{{asset('dist/js/select_box.js')}}"></script>

            </div>
        </div>
        <div class="service-dots-2">
            <img src="{{asset('assets/img/services/service-dots-2.png')}}" alt="Images">
        </div>


    </section>

@endsection
