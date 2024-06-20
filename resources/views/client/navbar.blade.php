<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="#" class="logo">
            <img src="{{asset('images/logo2.png')}}" alt="Logo" width="50">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="#">
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

                        <li class="nav-item">
                            <a href="{{route('client.contacts')}}" class="nav-link active">
                                Контакты
                            </a>
                        </li>


                        @auth
                            @if(auth()->user()->role->title === 'client')
                                <li class="nav-item">
                                    <a href="{{route('client.visits')}}" class="nav-link active">
                                        Мои посещения
                                    </a>
                                </li>
                            @endif

                            @if(auth()->user()->role->title === 'doctor')
                                @if(auth()->user()->doctor->competence->title !== 'Медицинский персонал')
                                    <li class="nav-item">
                                        <a href="{{route('client.doctor_writes')}}" class="nav-link active">
                                            Прием пациентов
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{route('client.medsister')}}" class="nav-link active">
                                            Выложить результат
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @endauth

                    </ul>
                </div>

                @auth
                    @if(auth()->user()->role->title === 'client')
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary text-nowrap" href="{{route('client.write')}}">Запись онлайн</a>
                        </li>
                    @endif
                @endauth

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Вход</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
                    <div class="ml-5">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->role->title === 'client' ? Auth::user()->client->name : Auth::user()->doctor->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest

            </nav>
        </div>
    </div>

</div>
