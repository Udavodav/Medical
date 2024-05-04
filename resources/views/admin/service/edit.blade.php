@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменение информации об услуге</h1>
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

                            <form class="bg-white" action="{{route('admin.service.update', $service->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <input value="{{$category->id}}" name="category_id" class="d-none">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputTitle">Название</label>
                                        <input type="text" name="title" class="form-control" id="inputTitle"
                                               placeholder="Название" value="{{old('title',$service->title)}}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Описание</label>
                                        <textarea class="form-control" id="inputDescription" rows="3" maxlength="1500"
                                                  name="description">{{old('description', $service->description)}}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDuration">Длительность (в минутах)</label>
                                        <input type="number" name="duration" class="form-control" id="inputDuration"
                                               placeholder="Длительность" value="{{old('duration',$service->duration)}}">
                                        @error('duration')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPrice">Цена</label>
                                        <input type="number" name="price" class="form-control" id="inputPrice"
                                               placeholder="Цена" value="{{old('price',$service->price)}}">
                                        @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    function preview() {
                        frame.src = URL.createObjectURL(event.target.files[0]);
                    }

                    function clearImage() {
                        document.getElementById('formFile').value = null;
                        frame.src = "";
                    }
                </script>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection
