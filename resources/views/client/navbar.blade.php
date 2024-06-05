
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="#" class="logo"> {{-- index.html --}}
            <img src="{{asset('images/logo2.png')}}" alt="Logo" width="50">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="#"> {{-- index.html --}}
                    <img src="{{asset('images/logo2.png')}}" alt="Logo" width="70">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('client.index')}}" class="nav-link active">
                                Главная
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.specialists')}}" class="nav-link active">
                                Специалисты
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('client.categories')}}" class="nav-link active">
                                Услуги
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link active">--}}
{{--                                Немного о нас--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{route('client.contacts')}}" class="nav-link active">
                                Контакты
                            </a>
                        </li>

                        {{-- TODO: Обернуть в условие авторизации для клиента --}}
                        <li class="nav-item">
                            <a href="{{route('client.visits')}}" class="nav-link active">
                                Мои посещения
                            </a>
                        </li>
                        {{-- TODO: Обернуть в условие авторизации для доктора--}}
                        <li class="nav-item">
                            <a href="{{route('client.doctor_writes')}}" class="nav-link active">
                                Личный кабинет
                            </a>
                        </li>

                    </ul>
                </div>

                <a href="#" class="btn  btn-secondary">Вход</a>
                <a href="{{route('client.write')}}" class="btn  btn-secondary mx-2">Запись на прием</a>

            </nav>
        </div>
    </div>

</div>
