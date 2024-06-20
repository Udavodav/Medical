@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                        <a href="{{route('admin.category.create')}}" class="btn btn-success my-3">Новая категория</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                </div>

                <div class="row pb-5 mb-4">
                    @foreach($categories as $category)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 mb-lg-0">
                            <a href="{{route('admin.category.show', $category->id)}}">
                                <!-- Card-->
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body p-0 {{empty($category->deleted_at) ? '' : 'bg-orange'}}">
                                        <img src="{{asset('storage/'.(empty($category->image) ? 'images/picture_category.jpg' : $category->image))}}" alt=""
                                                                    class="w-100 card-img-top" style="height: 250px; width: auto; object-fit: contain">
                                        <div class="p-4">
                                            <h5 class="mb-0">{{$category->title}}</h5>
                                        </div>
                                        <div>
                                            @if(empty($category->deleted_at))
                                                <form action="{{route('admin.category.delete', $category->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2 mx-3">Скрыть</button>
                                                </form>
                                            @else
                                                <form action="{{route('admin.category.restore', $category->id)}}}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success mb-2 mx-3">Востановить</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>

@endsection
