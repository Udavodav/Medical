@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Специалисты</h1>
                        <a href="{{route('admin.specialist.create')}}" class="btn btn-success my-3">Новый специалист</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                </div>

                <div class="row pb-5 mb-4">
                    @foreach($specialists as $specialist)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 mb-lg-0">
                            <a href="{{route('admin.specialist.show', $specialist->id)}}">
                                <!-- Card-->
                                <div class="card shadow-sm border-0 rounded">
                                    <div class="card-body p-0 {{empty($specialist->deleted_at) ? '' : 'bg-orange'}}">
                                        <img src="{{asset('storage/'.(empty($specialist->image) ? 'images/picture.jpg' : $specialist->image))}}" alt=""
                                                                    class="w-100 card-img-top" style="height: 250px; max-width: 100%; object-fit: contain">
                                        <div class="p-4">
                                            <h5 class="mb-0">{{$specialist->name}}</h5>
                                            <p class="small text-muted">{{$specialist->competence->title}}</p>
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
