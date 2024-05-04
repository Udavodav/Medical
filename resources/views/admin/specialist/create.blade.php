@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Новый специалист</h1>
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

                            <form class="bg-white" action="{{route('admin.specialist.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">ФИО</label>
                                        <input type="text" name="name" class="form-control" id="inputName"
                                               placeholder="ФИО" value="{{old('name','')}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDate">Введите дату рождения:</label>
                                        <input type="date" class="form-control" name="birthday" id="inputDate"
                                               value="{{old('birthday', '')}}">
                                        @error('birthday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCompetence">Специализация</label>
                                        <select name="competence_id" id="inputCompetence" class="form-control">
                                            @foreach($competences as $competence)
                                                <option value="{{$competence->id}}"
                                                    {{old('competence_id',0) == $competence->id ? 'selected' : ''}}
                                                >{{$competence->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('competence_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-5">
                                            <label for="inputImage" class="form-label">Фото специалиста</label>
                                            <input class="form-control" type="file" id="inputImage" onchange="preview()" name="image">
                                            <button id="clearButton" onclick="clearImage()" type="button" class="btn btn-primary mt-3">Очистить изображение
                                            </button>
                                        </div>
                                        <img id="frame" src="" class="img-fluid"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEducation">Образование</label>
                                        <textarea class="form-control summernote" id="inputEducation" rows="3" maxlength="1500"
                                                  name="education">{{old('education')}}</textarea>
                                        @error('education')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Подробное описание</label>
                                        <textarea class="form-control summernote" id="inputDescription" rows="3" maxlength="1500"
                                                  name="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail">Эдектронная почта</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail"
                                               placeholder="Email" value="{{old('email','')}}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Пароль</label>
                                        <input type="text" name="password" class="form-control" id="inputPassword"
                                               placeholder="Пароль" value="{{old('password','')}}">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
