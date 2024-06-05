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
                    <li>Личный кабинет</li>
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
                <h2>Выгрузка результатов</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
            </div>

            <div class="row pt-45">

                <div class="form-group">
                    <label for="searchInput">Поиск</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="ФИО" oninput="inputData()">
                </div>

                <div class="form-group mb-5 mx-3">
                    <label for="dateInp" class="mt-3">Дата рождения</label>
                    {{-- TODO: Auth doctor_id --}}
                    <input type="date" class="mb-3 w-25 mx-3" name="date" id="dateInp" oninput="inputData()">
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Дата рождения</th>
                        <th scope="col">email</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>

                    <tbody id="tableBody">

                    </tbody>
                </table>

            </div>
        </div>
        <div class="service-dots-2" style=" z-index: -100">
            <img src="{{asset('assets/img/services/service-dots-2.png')}}" alt="Images">
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createVisit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Данные о приеме</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createVisitForm">
                            @csrf
                            <input type="text" name="client_id" id="client_id" class="d-none" value="">

                            <label for="dateInp" class="mt-3 mx-3">Дата</label>
                            <div class="form-group">
                                <input type="date" class="w-75 mx-3" name="date_write" id="dateInp" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                            </div>

                            <div class="wrapper my-3 mx-3" id="wrapperService">
                                <label class="mx-2 fw-bold">Услуга</label>
                                <input class="val-inp d-none" name="service_id" value="{{$services[0]->id}}" id="serviceInp">
                                <div class="select-btn" id="selectService">
                                    <span>{{$services[0]->title}}</span>
                                    <i class="uil uil-angle-down"></i>
                                </div>
                                <div class="select-content">
                                    <div class="search" id="searchService">
                                        <i class="uil uil-search"></i>
                                        <input class="sr-inp" spellcheck="false" type="text" placeholder="Search">
                                    </div>
                                    <ul class="options" id="optionsService">
                                        @foreach($services as $service)
                                            <li onclick="updateName(this)" class="{{$loop->index == 0 ? 'selected' : ''}}" value="{{$service->id}}">{{$service->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <label for="inputFile" class="mx-2">Файл (.pdf)</label>
                            <div class="input-group mb-3">
                                <input type="file" name="file" class="form-control mb-3" id="inputFile"
                                       aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>

                            <label for="inputComment">Коментарий (обязательное поле)</label>
                            <div class="form-group">
                                <textarea id="inputComment" name="conclusion" class="form-control" rows="10"></textarea>
                            </div>
                            <div class="form-group my-3 mx-2">
                                <button type="submit" id="submitForm" class="btn btn-primary">Сохранить</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        <script src="{{asset('dist/js/getClients.js')}}"></script>


    </section>

@endsection
