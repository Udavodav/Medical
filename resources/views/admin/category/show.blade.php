@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid pt-4">

                <div class="card mb-3 ml-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img
                                src="{{asset('storage/'.(empty($category->image) ? 'images/picture_category.jpg' : $category->image))}}"
                                alt="Изображение не найдено"
                                class="img-fluid rounded-start"
                                style=" max-height:600px;"
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1>{{$category->title}}</h1>


                                <h4>Описание</h4>
                                <div class="card-text">
                                    {!!  $category->description !!}
                                </div>
                                @if(!empty($category->deleted_at))
                                    <div class="text-danger my-3">Скрыт и не доступен для просмотра клиентов</div>
                                @endif
                                <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-primary">Изменить</a>
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
                        <a href="{{route('admin.service.create', $category->id)}}" class="btn btn-success px-5">Добавить услугу</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список услуг</h3>
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
                                                <a href="{{route('admin.service.edit', ['category' => $category->id, 'service' => $service->id])}}"
                                                   class="text-primary"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                @if(empty($service->deleted_at))
                                                    <form method="POST" action="{{route('admin.service.delete', $service->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="text-danger border-0 bg-transparent"
                                                                onclick="return confirm('Вы уверены?')">
                                                            <i class="fas fa-eye-slash"></i></button>
                                                    </form>
                                                @else
                                                    <a href="{{route('admin.service.restore', $service->id)}}" class="text-success border-0 bg-transparent">
                                                        <i class="fas fa-eye"></i></a>
                                                @endif
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
