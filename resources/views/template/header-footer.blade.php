<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('picture/seal-cos.ico')}}">

        <title>Seal Online: Chronicles of Shiltz</title>

        <!-- Bootstrap core CSS -->

        <link href="{{ URL::asset('template/style.css') }}" rel="stylesheet">
        <style>
            .img-container-cs{
                height:700px;
            }
            .img-slider{
                width:100%;
                height:100%;
            }
        </style>
    </head>

    <body>
    <header class="header-area wow fadeInDown" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInDown;">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="{{url('')}}"><img style="max-width: 200px; max-height:70px;" src="{{URL::asset('picture/logo.png')}}" alt="Seal SHILTZ" ></a>
                        </div>

                        <!-- Search & Login Area -->
                        <div class="search-login-area d-flex align-items-center">
                            <!-- Top Search Area -->
                            <!-- <div class="top-search-area">
                                <form action="#" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Search">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div> -->
                            <!-- Login Area -->
                            @if(Session::get('username') == null)
                            <div class="login-area">
                                <a href="{{url('login')}}"><span>Login</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                            <div class="login-area" >
                                <a style="background-color: #008080" href="{{url('register')}}"><span>Register</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                            @else
                            <div class="login-area">
                                <a href="{{url('logoutmanual')}}"><span>Logout</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                            <div class="login-area" >
                                <a style="background-color: #ff0000" href="https://drive.google.com/uc?id=1pv2GkXlRZnpVRq7rlRu9VwA7CHbV2v5Z&export=download"><span>Download</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div id="sticker-sticky-wrapper" class="sticky-wrapper" style="height: 70px;"><div class="egames-main-menu" id="sticker" style="width: 1519px;">
            <div class="classy-nav-container breakpoint-off light left">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="egamesNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{url('')}}">Home</a></li>
                                    <li><a href="{{url('term')}}">Rules</a></li>
                                    @if(Session::get('username') == null)
                                    <!--dropdown-->
                                    <?php
                                    $horizontal = 0;
                                    $max_horizontal = DB::connection('mysql2')->table('content')->where('approved','1')->select('horizontal_level')->orderBy('horizontal_level', 'DESC')->first();
                                    if ($max_horizontal)
                                        $horizontal = $max_horizontal->horizontal_level;
                                    ?>
                                        @for($i = 1; $i<=$horizontal ;$i++)
                                        <?php $vertical = DB::connection('mysql2')->table('content')->where('approved','1')->orderBy('vertical_level', 'ASC')->where('horizontal_level', $i)->get(); ?>
                                        <li class="cn-dropdown-item has-down"><a href="#">{{$vertical[0]->horizontal_name}}</a>
                                            <ul class="dropdown">
                                                @foreach($vertical as $data)
                                                    @if($data->link === '#')
                                                        <li><a href="#">{{$data->name}}</a></li>
                                                    @elseif($data->content === '' || $data->content === NULL)
                                                        <li><a href="{{$data->link}}">{{$data->name}}</a></li>
                                                    @else
                                                        <li><a href="{{(url('browse').'/'.$data->id)}}">{{$data->name}}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @if(count($vertical) > 1)
                                            <span class="dd-trigger"></span></li>
                                            @endif
                                        @endfor
                                    @else
                                    <li><a href="{{url('account')}}">Account</a></li>
                                    <li><a href="{{url('costume')}}">Costumes</a></li>
                                    <li><a href="{{url('fanart')}}">Fanart</a></li>
                                    @endif
                                    <!-- <li class="cn-dropdown-item has-down"><a href="game-review.html">Games</a>
                                        <ul class="dropdown">
                                            <li><a href="game-review.html">Game Review</a></li>
                                            <li><a href="single-game-review.html">Single Game Review</a></li>
                                        </ul>
                                    <span class="dd-trigger"></span></li>
                                    <li class="cn-dropdown-item has-down"><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="{{url('')}}">Home</a></li>
                                            <li><a href="{{url('term')}}">Rules</a></li>
                                            <li><a href="post.html">Articles</a></li>
                                            <li><a href="single-post.html">Single Articles</a></li>
                                            <li><a href="game-review.html">Game Review</a></li>
                                            <li><a href="single-game-review.html">Single Game Review</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    <span class="dd-trigger"></span></li>
                                    <li class="cn-dropdown-item has-down"><a href="post.html">Articles</a>
                                        <ul class="dropdown">
                                            <li><a href="post.html">Articles</a></li>
                                            <li><a href="single-post.html">Single Articles</a></li>
                                        </ul>
                                    <span class="dd-trigger"></span></li>
                                    <li class="cn-dropdown-item has-down"><a href="single-game-review.html">Reviews</a>
                                        <ul class="dropdown">
                                            <li><a href="game-review.html">Game Review</a></li>
                                            <li><a href="single-game-review.html">Single Game Review</a></li>
                                        </ul>
                                    <span class="dd-trigger"></span></li> -->
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Top Social Info -->
                        <div class="top-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div></div>
    </header>
    @yield('main-section')
        <!-- <div id="wrap" style="">
            <div class="container" id="main">
                
            </div>
        </div> -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: hidden; animation-delay: 100ms; animation-name: none;">
                            <div class="widget-title">
                                <a href="index.html"><img src="{{URL::asset('template/img/core-img/logo2.png')}}" alt=""></a>
                            </div>
                            <div class="widget-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam ut interdum ultricies.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="300ms" style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                            <div class="widget-title">
                                <h4>Game Reviews</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="#">Doom</a></li>
                                        <li><a href="#">Grand Theft Auto</a></li>
                                        <li><a href="#">Bloodborne</a></li>
                                        <li><a href="#">God of war</a></li>
                                        <li><a href="#">Persona 5</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="500ms" style="visibility: hidden; animation-delay: 500ms; animation-name: none;">
                            <div class="widget-title">
                                <h4>Usefull Links</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="#">Testimanials</a></li>
                                        <li><a href="#">Reviews</a></li>
                                        <li><a href="#">New Games</a></li>
                                        <li><a href="#">Forum</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="700ms" style="visibility: hidden; animation-delay: 700ms; animation-name: none;">
                            <div class="widget-title">
                                <h4>What’s new</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="#">Doom</a></li>
                                        <li><a href="#">Grand Theft Auto</a></li>
                                        <li><a href="#">Bloodborne</a></li>
                                        <li><a href="#">God of war</a></li>
                                        <li><a href="#">Persona 5</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-sm-5">
                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->Copyright ©<script>document.write(new Date().getFullYear());</script>2019 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by </a><a href="https://colorlib.com" target="_blank">Colorlib</a><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-7">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="game-review.html">Games</a></li>
                                <li><a href="post.html">Articles</a></li>
                                <li><a href="single-game-review.html">Reviews</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


        <!-- Bootstrap core JavaScript -->
        <script src="{{URL::asset('template/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{URL::asset('template/js/jquery/jquery-2.2.4.min.js')}}"></script>
        <script src="{{URL::asset('template/js/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('template/js/plugins/plugins.js')}}"></script>
        <script src="{{URL::asset('template/js/active.js')}}"></script>
        @yield('js-content')
        <script>
        </script>
    </body>
</html>