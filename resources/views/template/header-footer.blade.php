<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('public/picture/seal-cos.ico')}}">

        <title>Seal Online: Chronicles of Shiltz</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/template/style.css') }}" rel="stylesheet">
        <style>
            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            .col-form-label{
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }
            .container {
                padding: 16px;
            }
            .btn-marg{
                margin-right: 20px;
            }
            button:hover {
                opacity: 0.8;
            }
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1001; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }/* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 50%; /* Could be more or less, depending on screen size */
            }
            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }
            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }
            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
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
                            <a href="{{url('')}}"><img style="max-width: 200px; max-height:70px;" src="{{URL::asset('public/picture/logo.png')}}" alt="Seal SHILTZ" ></a>
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
                            @endif
                            <div class="login-area" >
                                <a style="background-color: #ff0000" href="{{(Session::get('username') != null)?'https://drive.google.com/uc?id=1pv2GkXlRZnpVRq7rlRu9VwA7CHbV2v5Z&export=download':url('login')}}"><span>Download</span> <i class="fa fa-lock" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="egames-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
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
                                    @if(Session::get('username') != null)
                                    <li><a href="{{url('account')}}">Account</a></li>
                                    <!--<li><a href="{{url('costume')}}">Costumes</a></li>
                                    <li><a href="{{url('fanart')}}">Fanart</a></li>-->
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
                                    <!--<li><a href="support.html">Support</a></li>-->
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Top Social Info -->
                        <div class="top-social-info">
                        <strong>Follow Us :</strong>
                            <a href="https://discord.gg/WDQqpcv" data-toggle="tooltip" data-placement="top" title="" data-original-title="Discord"><i class="fab fa-discord" aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com/sealonlinecos/" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://line.me/R/ti/p/%40sealcos" data-toggle="tooltip" data-placement="top" title="" data-original-title="Line"><i class="fab fa-line" aria-hidden="true"></i></a>
                            <a href="https://instagram.com/sealcos.sea?utm_source=ig_profile_share&igshid=15ghf74xr1snb" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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
        <br>
        <br>
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: hidden; animation-delay: 100ms; animation-name: none;">
                            <div class="widget-title">
                                <a href="index.html"><img src="{{URL::asset('public/template/img/bg-img/logo.png')}}" alt=""></a>
                            </div>
                            <div class="widget-content">
                                <p>Seal Online: Chronicles of Shiltz was established in 2018. We aim to be a server that provides not only fun, but a strong bond and positive values towards our community.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="300ms" style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                            <div class="widget-title">
                                <h4></h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="500ms" style="visibility: hidden; animation-delay: 500ms; animation-name: none;">
                            <div class="widget-title">
                                <h4>Useful Links</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="https://seal-cos.com/personalRank">Player's Rank</a></li>
                                        <li><a href="https://seal-cos.com/coupleRank">Couple's Rank</a></li>
                                        <li><a href="https://seal-cos.com/guildRank">Guild's Rank</a></li>
                                        <li><a href="https://seal-cos.com/term">Terms and Conditions</a></li>
                                        <li><a href="https://seal-cos.com/register">Register</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70 wow fadeInUp" data-wow-delay="700ms" style="visibility: hidden; animation-delay: 700ms; animation-name: none;">
                            <div class="widget-title">
                                <h4>Featured</h4>
                            </div>
                            <div class="widget-content">
                                <nav>
                                    <ul>
                                        <li><a href="https://seal-cos.com/6th-Grade-Pet">Sixth Grade Pet Evolution</a></li>
                                        <li><a href="#">Buy a Costume</a></li>
                                        <li><a href="#">Fan Art</a></li>
                                        <li><a href="#"></a></li>
                                        <li><a href="#"></a></li>
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
                        <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by </a><a href="https://colorlib.com" target="_blank">Colorlib</a><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-7">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li><a href="https://seal-cos.com">Home</a></li>
                                <li><a href="https://seal-cos.com/term">Rules</a></li>
                                <li><a href="https://seal-cos.com/register">Register</a></li>
                                <li><a href="https://seal-cos.com/">Other</a></li>
                                <li><a href="https://seal-cos.com/">Other</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


        <!-- Bootstrap core JavaScript -->
        <script src="{{URL::asset('public/template/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{URL::asset('public/template/js/jquery/jquery-2.2.4.min.js')}}"></script>
        <script src="{{URL::asset('public/template/js/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('public/template/js/plugins/plugins.js')}}"></script>
        <script src="{{URL::asset('public/template/js/active.js')}}"></script>
        @yield('js-content')
        <script>
        </script>
    </body>
</html>