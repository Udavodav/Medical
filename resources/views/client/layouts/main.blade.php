<!doctype html>
<html lang="ru">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('dist/css/select_box.css')}}">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/animate.min.css")}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset("assets/fonts/flaticon.css")}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/boxicons.min.css")}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/boxicons.min.css")}}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/nice-select.min.css")}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/meanmenu.css")}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/responsive.css")}}">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <title>Medical - медицинская клиника</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset("assets/img/favicon.png")}}">
</head>

<body>
<!-- Pre Loader -->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="spinner"></div>
        </div>
    </div>
</div>

<!-- Top Header -->
@include('client.header')

<!-- Navbar Area -->
@include('client.navbar')

@yield('content')

<!-- Footer Area -->
@include('client.footer')


<!-- Copy-Right Area -->
<div class="copy-right-area">
    <div class="container">
        <div class="copy-right-text text-center">
            <p>
                Copyright ©2024 Medical.
            </p>
        </div>
    </div>
</div>



<!-- Jquery Min JS -->
<script src="{{asset("assets/js/jquery-3.5.1.slim.min.js")}}"></script>
<!-- Bootstrap Min JS -->
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
<!-- Nice Select Min JS -->
<script src="{{asset("assets/js/jquery.nice-select.min.js")}}"></script>
<!-- Wow Min JS -->
<script src="{{asset("assets/js/wow.min.js")}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset("assets/js/meanmenu.js")}}"></script>
<!-- Datepicker JS -->
<script src="{{asset("assets/js/datepicker.min.js")}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset("assets/js/jquery.ajaxchimp.min.js")}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset("assets/js/form-validator.min.js")}}"></script>
<!-- Contact Form JS -->
<script src="{{asset("assets/js/contact-form-script.js")}}"></script>
<!-- Custom JS -->
<script src="{{asset("assets/js/custom.js")}}"></script>



</body>
</html>
