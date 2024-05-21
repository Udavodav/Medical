@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Компетенции</h1>
                        <a href="{{route('admin.competence.create')}}" class="btn btn-success my-3">Новая компетенция</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список компетенций</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="w-50">Название</th>
                                <th colspan="2" class="text-center">Кнопки</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($competences as $competence)
                                <tr class="{{empty($competence->deleted_at) ? '' : 'bg-orange'}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-wrap">{{$competence->title}}</td>
                                    <td>
                                        <a href="{{route('admin.competence.edit', $competence->id)}}"
                                           class="text-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        @if(empty($competence->deleted_at))
                                            <form method="POST" action="{{route('admin.competence.delete', $competence->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-danger border-0 bg-transparent"
                                                        onclick="return confirm('Вы уверены?')">
                                                    <i class="fas fa-eye-slash"></i></button>
                                            </form>
                                        @else
                                            <a href="{{route('admin.competence.restore', $competence->id)}}" class="text-success border-0 bg-transparent">
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

@endsection
