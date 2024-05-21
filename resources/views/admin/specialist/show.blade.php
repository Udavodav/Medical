@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid pt-4">

                <div class="card mb-3 ml-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img
                                src="{{asset('storage/'.(empty($specialist->image) ? 'images/picture.jpg' : $specialist->image))}}"
                                alt="Изображение не найдено"
                                class="img-fluid rounded-start"
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1>{{$specialist->name}}</h1>

                                <p class="card-text">
                                    <small class="text-muted"
                                           style="font-size: 14pt">Специализация: {{$specialist->competence->title}}</small>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted" style="font-size: 14pt">Электронная
                                        почта: {{$specialist->user->email}}</small>
                                </p>
                                <h4>Образование</h4>
                                <div class="card-text">
                                    {!!  $specialist->education !!}
                                </div>

                                <h4 class="mt-3">Подробная информация</h4>
                                <p class="card-text">
                                    {!! $specialist->description !!}
                                </p>
                                <a href="{{route('admin.specialist.edit_data', $specialist->id)}}"
                                   class="btn btn-primary">Изменить
                                    информацию</a>
                                <a href="{{route('admin.specialist.edit_user', $specialist->user_id)}}"
                                   class="btn btn-primary">Сменить данные входа</a>

                                @if(empty($specialist->deleted_at))
                                    <form action="{{route('admin.specialist.delete', $specialist->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger my-4">Скрыть</button>
                                    </form>
                                @else
                                    <form action="{{route('admin.specialist.restore', $specialist->id)}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-success my-4">Востановить</button>
                                        <div class="text-danger">Скрыт и не доступен для просмотра клиентов</div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0">Услуги</h4>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-sm-6">
                        <a href="{{route('admin.service.add', ['specialist' => $specialist->id])}}" class="btn btn-success px-5">Добавить
                            услугу</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список оказываемых услуг</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="w-50">Название</th>
                                        <th class="w-50">Описание</th>
                                        <th>Продолжительность</th>
                                        <th>Цена</th>
                                        <th colspan="2" class="text-center">Кнопки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr class="{{empty($service->deleted_at) ? '' : 'bg-orange'}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-wrap">{{$service->title}}</td>
                                            <td>{{$service->description}}</td>
                                            <td>{{$service->duration}} мин.</td>
                                            <td>{{$service->price}} ₽</td>
                                            <td>
                                                <form method="POST" action="{{route('admin.specialist.delete_service', ['spec' => $specialist->id, 'serv' => $service->id])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-danger border-0 bg-transparent"
                                                            onclick="return confirm('Вы уверены?')">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
