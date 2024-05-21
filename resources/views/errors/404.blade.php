@extends('client.layouts.main')

@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg8">
        <div class="container">
            <div class="inner-title">
                <h3>404 Error page!</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>404 page</li>
                </ul>
            </div>
        </div>
        <div class="inner-banner-shape">
            <div class="shape1">
                <img src="assets/img/inner-banner/inner-banner-shape1.png" alt="Images">
            </div>
            <div class="shape2">
                <img src="assets/img/inner-banner/inner-banner-shape2.png" alt="Images">
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Start 404 Error -->
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <h1>4 <span>0</span> 4</h1>
                    <h3>Oops! Страница не найдена</h3>
                    <p>Возможно, страница, которую вы ищете, была удалена, ее название изменилось или она временно недоступна.</p>
                    <a href="{{route('client.index')}}" class="default-btn default-hot-toddy">
                        Вернуться на главную
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 Error -->

@endsection
