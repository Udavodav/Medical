@extends('client/layouts/main')

@section('content')

    <div>Список специалистов</div>

    <br>
    @foreach($specialists as $specialist)
        <div>{{$specialist->name()}}</div>
    @endforeach
    <br>

@endsection
