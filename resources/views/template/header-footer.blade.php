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

        <link href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/heroic-features.css') }}" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
                font-family: 'MyWebFont';
            }
            .footer-custom {
                position: relative;
                margin-top: -100px; /* negative value of footer height */
                height: 100px;
                clear:both;
                padding-top:20px;
            } 
            #wrap {
                min-height: 100%;
            }
            #main {
                overflow:auto;
                padding-bottom:100px; /* this needs to be bigger than footer height*/
            }
            @font-face {
                font-family: 'MyWebFont';
                src: '<?php echo URL::asset('public/NARNIABLL.TTF') ?>';
            }  
            .img-container-cs{
                height:500px;
            }
            .img-slider{
                width:100%;
                height:100%;
            }
            /*            .slideshow > div {
                            position: absolute;
                            max-width: 100%;
                            width: 100%;
                            height: 240px;
                            max-height: 100%;
                        }
            
                        .slideshow > div > img {
                            height: 100%;
                            width: 100%;
                        }*/
        </style>
    </head>

    <body background="{{URL::asset('public/picture/Web Background.png')}}" style="background-size: 100% 100%;background-attachment: fixed;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="position: -webkit-sticky; /* Safari */position: sticky;; margin-top: 30px;">
            <div class="container">
                <a href="#" class="navbar-brand"><img src="{{URL::asset('public/picture/logo.png')}}" alt="Seal SHILTZ" style="height:120px;margin-top: -60px;position: absolute;margin-left: auto;margin-right: auto;left: 0;right: 0;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('')}}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('term')}}">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://drive.google.com/uc?export=download&confirm=agd_&id=1s0PrbusWLzWMcU62Zdoal3RObAEPxeHP">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @if($user = Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="logout">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">We Receive No Donation !</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('register')}}">Sign Up</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrap" style="">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="container" id="main">
                <div class="text-center" style="margin-top: 30px;background: #6c757d">

                    <div class="dropdown show" style="margin-left:auto;margin-right:auto;">
                        <!--dropdown-->
                        <?php
                        $horizontal = 0;
                        $max_horizontal = DB::connection('mysql2')->table('content')->select('horizontal_level')->orderBy('horizontal_level', 'DESC')->first();
                        if ($max_horizontal)
                            $horizontal = $max_horizontal->horizontal_level;
                        ?>
                        @for($i = 1; $i<=$horizontal ;$i++)
                        <?php $vertical = DB::connection('mysql2')->table('content')->orderBy('vertical_level', 'ASC')->where('horizontal_level', $i)->get(); ?>
                        <div class="btn-group">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?php echo $i; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$vertical[0]->horizontal_name}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink<?php echo $i; ?>">
                                @foreach($vertical as $data)
                                @if($data->link === '#')
                                <a class="dropdown-item" href="#">{{$data->name}}</a>
                                @elseif($data->content === '' || $data->content === NULL)
                                <a class="dropdown-item" href="{{$data->link}}">{{$data->name}}</a>
                                @else
                                <a class="dropdown-item" href="{{(url('browse').'/'.$data->id)}}">{{$data->name}}</a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                @yield('main-section')
            </div>
        </div>
        <!-- Footer                                       -->


        <!-- Bootstrap core JavaScript -->
        <script src="{{ URL::asset('public/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('public/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('js-content')
    </body>

</html>