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
                <h2>Расписание</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
            </div>

            <div class="row pt-45">

                <div class="container">
                    <a href="#" class="btn btn-success">Записи</a>
                    <a href="{{route('client.doctor_visits')}}" class="btn btn-primary">Посещения</a>
                </div>

                <label for="dateInp" class="mt-3">Дата</label>
                <input type="date" class="mb-3 w-25" name="date" id="dateInp" oninput="inputDate(this, {{Auth::user()->doctor->id}})"
                       value="{{Carbon\Carbon::now()->format('Y-m-d')}}"
                       min="{{Carbon\Carbon::now()->format('Y-m-d')}}">


                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Время</th>
                        <th scope="col">Пациент</th>
                        <th scope="col">Услуга</th>
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
        <div class="modal fade" id="addVisit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Данные о приеме</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addVisitForm">
                            @csrf
                            <input type="text" name="write_id" id="write_id" class="d-none" value="">
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

        <script src="{{asset('dist/js/getWrites.js')}}"></script>


    </section>

@endsection
