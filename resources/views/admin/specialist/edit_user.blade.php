@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменение данных входа</h1>
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

                            <form class="bg-white" action="{{route('admin.specialist.update_user', $user->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputEmail">Эдектронная почта</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail"
                                               placeholder="Email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Новый пароль</label>
                                        <input type="text" name="password" class="form-control" id="inputPassword"
                                               placeholder="Пароль" value="{{ old('password') }}">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputRepeatPassword">Повторите пароль</label>
                                        <input type="text" name="password_confirmation" class="form-control" id="inputRepeatPassword"
                                               placeholder="Повторите пароль" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Подтвердить изменения</button>
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
