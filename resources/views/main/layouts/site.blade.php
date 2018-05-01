<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>BuildMania</title>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('main')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/owl.theme.default.min.css">
    <!--  Magnific Popup  -->
    <link rel="stylesheet" href="{{asset('main')}}/css/magnific-popup.css">
    <!--   Slick          -->
    <link rel="stylesheet" href="{{asset('main')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/slick-theme.css">
</head>
<body class="grey-crumbs">
<!--START MENU-->
@yield('navigation')
<!--END MENU-->

@if(Route::currentRouteName() !== 'home')
    <section class="crumbs">
        <div class="container">
            <div class="row">
                <ul>
                    @if(isset($crumbs))
                        @if(is_array($crumbs))
                            @foreach($crumbs as $crumb)
                                <li><a href="{{$crumb['url']}}">{{$crumb['name']}}</a></li>
                                <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                            @endforeach
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endif



@yield('content')


<footer>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('main')}}/img/logo.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li><a href="#">Программы тренировок</a></li>
                                <li><a href="#">Программы питания</a></li>
                                <li><a href="#">Рецепты</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li><a href="#">Статьи</a></li>
                                <li><a href="#">Новости</a></li>
                                <li><a href="#">Упражнения</a></li>
                                <li><a href="#">Условия использования сайта</a></li>
                                <li><a href="#">Политика конфиденциальности</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-6 mail">
                            <a href="mailto:matskovich.taras@gmail.com">matskovich.taras@gmail.com</a>
                        </div>
                        <div class="col-md-6 socials">
                            <a href="#"><img src="{{asset('main')}}/img/vk.png" alt=""></a>
                            <a href="#"><img src="{{asset('main')}}/img/google.png" alt=""></a>
                            <a href="#"><img src="{{asset('main')}}/img/fb.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="js/jquery-3.2.1.min.js"></script>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{asset('main')}}/js/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('main')}}/js/bootstrap.min.js"></script>

<!--  Magnific Popup   -->
<script src="{{asset('main')}}/js/jquery.magnific-popup.min.js"></script>

<!--  Slick            -->
<script src="{{asset('main')}}/js/slick.min.js"></script>

<script src="{{asset('main')}}/js/common.js"></script>



</body>
</html>