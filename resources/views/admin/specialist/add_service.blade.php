@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Услуги для специалиста</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12 col-lg-10 col-xl-8 col-12">

                        <div class="card card-primary">

                            <form class="bg-white" action="{{route('admin.specialist.store_service')}}" method="POST">
                                @csrf
                                <input name="specialist_id" value="{{$specialist->id}}" class="d-none">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="serviceSelect">Услуги</label>
                                        <select class="select2" multiple="multiple" name="service_ids[]"
                                                data-placeholder="Выберите услуги" style="width: 100%;" id="serviceSelect">
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection
