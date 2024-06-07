
<aside class="main-sidebar sidebar-light-blue elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="{{asset('images/logo2.png')}}" alt="Medical Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Medical</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="brand-text font-weight-light text-dark">{{Auth::user()->email}}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('admin.competence.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-dice-d20"></i>
                        <p>
                            Компетенции
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.specialist.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Специалисты и услуги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Категории и услуги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.comment.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Отзывы клиентов
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Посты и новости
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
