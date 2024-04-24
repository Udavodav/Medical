@extends('client/layouts/main')

@section('content')

    <div>Список услуг в категории</div>
    <br>
    @foreach($services as $service)
        <div>{{$service->title}}</div>
    @endforeach
    <br>

@endsection
