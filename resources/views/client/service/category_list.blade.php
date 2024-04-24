@extends('client/layouts/main')

@section('content')

    <div>Список категорий</div>
    <br>

    @foreach($categories as $category)
        <a href="{{route('client.services', $category->id)}}">{{$category->title}}</a><br>
    @endforeach

    <br>

@endsection
