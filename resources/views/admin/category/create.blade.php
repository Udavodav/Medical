@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Новая категория</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12 col-lg-10 col-xl-8 col-12">

                        <div class="card card-primary">

                            <form class="bg-white" action="{{route('admin.category.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputTitle">Название</label>
                                        <input type="text" name="title" class="form-control" id="inputTitle"
                                               placeholder="Название" value="{{old('title','')}}">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Описание</label>
                                        <textarea class="form-control summernote" id="inputDescription" rows="3" maxlength="1500"
                                                  name="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputIcon">Иконка</label>
                                        <input type="text" name="icon" class="form-control" id="inputIcon"
                                               placeholder="Иконка" value="{{old('icon','')}}" onchange="iconOnChange()">
                                        @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-secondary">Для вставки иконки перейдите на сайт <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank">FontAwesome</a>
                                            найдите подходящую иконку и вставте в поле содержимое тега class. Например < i class="fas fa-yin-yang">< / i>, вставляем 'fas fa-yin-yang'</div>
                                        <div>
                                            <i id="iconShow" class=""></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-5">
                                            <label for="inputImage" class="form-label">Фото</label>
                                            <input class="form-control" type="file" id="inputImage" onchange="preview()" name="image">
                                            <button id="clearButton" onclick="clearImage()" type="button" class="btn btn-primary mt-3">Очистить изображение
                                            </button>
                                        </div>
                                        <img id="frame" src="" class="img-fluid" style="max-height: 250px; max-width: 300px; object-fit: contain"/>
                                    </div>

                                </div>
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

                    function iconOnChange(){
                        let inputIcon = document.getElementById('inputIcon')
                        document.getElementById('iconShow').className = inputIcon.value
                    }

                </script>


            </div>
        </section>

    </div>

@endsection
