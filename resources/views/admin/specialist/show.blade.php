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
                                <a href="{{route('admin.specialist.edit_data', $specialist->id)}}" class="btn btn-primary">Изменить
                                    информацию</a>
                                <a href="{{route('admin.specialist.edit_user', $specialist->user_id)}}" class="btn btn-primary">Сменить данные входа</a>

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


    </div>

@endsection
