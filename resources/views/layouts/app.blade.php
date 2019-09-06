<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropbutton.css') }}" rel="stylesheet">
    <link href="{{ asset('css/playsong.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One|Biryani|Raleway:300|Source+Code+Pro|Muli"
          rel="stylesheet">
</head>
<body>
    <div id="app" style="background-color: #f3f3f3">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src='https://i1.sndcdn.com/artworks-000242801280-hpp38r-t500x500.jpg')}} height="50px" width="50px">
                </a>

                <div class="dropdown" >
                    <a class="dropdown navbar-brand" style="color: white">Bài Hát</a>
                    <div class="dropdown-content dropdown-menu dropdown-menu-lg-left">
                        <a href="{{route('Guest.getAllNewSongs')}}" style="text-decoration: none" class="dropdown-item">Bài Hát Mới Nhất</a>
                        <a href="{{route('Guest.getAllMostListenSongs')}}" style="text-decoration: none" class="dropdown-item">Bài Hát Được Nghe Nhiều Nhất</a>
                    </div>
                </div>
                <div class="dropdown" >
                    <a class="dropdown navbar-brand" style="color: white">Playlist</a>
                    <div class="dropdown-content dropdown-menu dropdown-menu-lg-left">
                        <a href="{{route('playlist.getAllNewPlaylists')}}" style="text-decoration: none" class="dropdown-item">Playlist Mới Nhất</a>
{{--                        <a href="#" style="text-decoration: none" class="dropdown-item">Playlist Được Nghe Nhiều Nhất</a>--}}
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form class="form-inline" style="margin-right: 20px"  action="{{route('search')}} ">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="Tìm Kiếm " aria-label="Search" name="keyword">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Đăng Nhập</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng Ký</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" height="30px" width="30px" style="border-radius: 15px">
                                    <span class="caret">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.index') }}"><i style="margin-right: 5px" class="fa fa-btn fa-user"></i>Hồ Sơ</a>
                                    <a class="dropdown-item" href="{{ route('songs.index') }}"><i style="margin-right: 5px" class="fa fa-btn fa-music"></i>Nhạc Cá Nhân</a>
                                    <a class="dropdown-item" href="{{ route('playlists.showPlaylists') }}"><i style="margin-right: 5px" class="fa fa-toggle-right"></i>Playlist Cá Nhân</a>
                                    <a href="{{route('change.password')}}" class="dropdown-item"><i class="fa fa-lock" style="margin-right: 5px"></i>Đổi Mật Khẩu</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick=" event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" style="margin-right: 5px"></i>Đăng Xuất
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main style="width: 1000px;height:auto; margin: auto;margin-top: 75px;margin-bottom: 100px">
            @yield('content')
        </main>
        <script>
            CKEDITOR.replace( 'ckeditor' );
        </script>
        <!-- Footer -->
        <footer name="footer" class="page-footer font-small stylish-color-dark pt-4" style="background-color: #212529">

            <!-- Footer Links -->
            <div class="container text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-4 mx-auto " id="footercenter" style="color: white">

                        <!-- Content -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                        <p>Design by 3qMusic Team</p>
                       <p> Contact : 19001009</p>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">

                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Link 1</a>
                            </li>
                            <li>
                                <a href="#!">Link 2</a>
                            </li>
                            <li>
                                <a href="#!">Link 3</a>
                            </li>
                            <li>
                                <a href="#!">Link 4</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">

                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Link 1</a>
                            </li>
                            <li>
                                <a href="#!">Link 2</a>
                            </li>
                            <li>
                                <a href="#!">Link 3</a>
                            </li>
                            <li>
                                <a href="#!">Link 4</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-2 mx-auto">

                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!">Link 1</a>
                            </li>
                            <li>
                                <a href="#!">Link 2</a>
                            </li>
                            <li>
                                <a href="#!">Link 3</a>
                            </li>
                            <li>
                                <a href="#!">Link 4</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Social buttons -->
            <div class="container" id="footersocial">
                <div class="row " >
                    <div>
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="https://www.facebook.com/LapGun" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style="color: white">© 2019 Copyright:
                <a href="#"> 3qMusic</a>
            </div>
            <!-- Copyright -->

        </footer>
    </div>
</body>

</html>
