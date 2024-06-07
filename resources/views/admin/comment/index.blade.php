@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0">Отзывы</h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список отвывов выших клиентов</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="w-50">Специалист</th>
                                        <th class="w-50">Клиент</th>
                                        <th class="w-50">Дата</th>
                                        <th>Текст</th>
                                        <th colspan="2" class="text-center">Кнопки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr class="{{empty($comment->deleted_at) ? '' : 'bg-orange'}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td class="text-wrap">{{$comment->doctor->name}}</td>
                                            <td>{{$comment->client->name}}</td>
                                            <td>{{$comment->date}}</td>
                                            <td>{{$comment->text}} ₽</td>
                                            <td>
                                                @if(empty($comment->deleted_at))
                                                    <form method="POST" action="{{route('admin.comment.delete', $comment->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="text-danger border-0 bg-transparent"
                                                                onclick="return confirm('Вы уверены?')">
                                                            <i class="fas fa-eye-slash"></i></button>
                                                    </form>
                                                @else
                                                    <a href="{{route('admin.comment.restore', $comment->id)}}" class="text-success border-0 bg-transparent">
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
